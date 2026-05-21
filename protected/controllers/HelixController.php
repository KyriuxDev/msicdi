<?php

class HelixController extends Controller
{
    public function actionEnviar()
    {
        ob_start();

        if (Yii::app()->user->isGuest)
            $this->redirect(Yii::app()->user->returnUrl);

        if ($_SERVER['REQUEST_METHOD'] !== 'POST')
            $this->redirect(Yii::app()->request->baseUrl . '/soporte');

        require_once Yii::getPathOfAlias('application') . '/helix/soap_service.php';
        require_once Yii::getPathOfAlias('application') . '/helix/mailer_service.php';

        $campo = function($key, $default = '') {
            return isset($_POST[$key]) ? trim($_POST[$key]) : $default;
        };

        $tipo     = $campo('tipo', 'wo');
        $nRastreo = $campo('nRastreo');

        $datos = array(
            'proveedor'      => $campo('proveedor',  'SOPORTE ADMIN OAX'),
            'ticket_msl'     => $campo('ticket_msl'),
            'resumen'        => $campo('resumen'),
            'notas'          => $campo('notas'),
            'nombre_prod'    => $campo('nombre_prod', ''),
            'prioridad'      => $campo('prioridad',   '4'),
            'cat_ope_1'      => $campo('cat_ope_1'),
            'cat_ope_2'      => $campo('cat_ope_2'),
            'cat_ope_3'      => $campo('cat_ope_3'),
            'cat_prod_1'     => $campo('cat_prod_1'),
            'cat_prod_2'     => $campo('cat_prod_2'),
            'cat_prod_3'     => $campo('cat_prod_3'),
            'login_cliente'  => $campo('login_cliente'),
            'login_contacto' => $campo('login_contacto'),
            'impacto'        => $campo('impacto',  '2000'),
            'urgencia'       => $campo('urgencia', '2000'),
            'email_cliente'  => $campo('email_cliente'),
        );

        $resultado    = array('ok' => false, 'respuesta' => '', 'http_code' => 0);
        $codigoHelix  = '';
        $errorInterno = '';
        $mensajeHelix = '';

        try {

            // ── 1. Enviar SOAP ────────────────────────────────────────────
            if ($tipo === 'incidente') {
                $xml       = construir_soap_incidente($datos);
                $resultado = enviar_soap_incidente($xml);
            } else {
                $xml       = construir_soap($datos);
                $resultado = enviar_soap($xml);
            }

            // Fault en el XML cuenta como error aunque HTTP sea 200
            if (strpos($resultado['respuesta'], 'Fault') !== false ||
                strpos($resultado['respuesta'], 'fault') !== false) {
                $resultado['ok'] = false;
            }

            if ($resultado['ok'] || $resultado['http_code'] >= 200) {
                if (preg_match('/<[^>]*Estado_transaccion[^>]*>\s*Error\s*<\//i', $resultado['respuesta'])) {
                    $resultado['ok'] = false;
                    if (preg_match('/<[^>]*Resultado_transaccion[^>]*>([^<]+)<\//i',
                                $resultado['respuesta'], $mRes)) {
                        $mensajeHelix = trim($mRes[1]);
                    }
                }
            }

            // ── 2. Post-proceso si fue exitoso ────────────────────────────
            if ($resultado['ok']) {

                // Extraer código WO / Incidente
                if (preg_match('/\b(WO|INC|IM)[0-9]+\b/i', $resultado['respuesta'], $m)) {
                    $codigoHelix = strtoupper($m[0]);
                }

                // ── 2a. Nota en cdi_notas ─────────────────────────────────
                if ($nRastreo !== '' && $codigoHelix !== '') {
                    $mtr    = Yii::app()->user->name;
                    $resNom = Yii::app()->db->createCommand(
                        "SELECT CONCAT(Nombres,' ',ApPaterno,' ',ApMaterno) nom
                        FROM cdi_cat_personal WHERE Matricula = :mtr"
                    )->bindValue(':mtr', $mtr)->queryAll();

                    $nPorQuien = !empty($resNom) ? $resNom[0]['nom'] : $mtr;
                    $tipoLabel = ($tipo === 'incidente') ? 'Incidente' : 'Orden de Trabajo';

                    Yii::app()->db->createCommand()->insert('cdi_notas', array(
                        'Nrastreo'    => $nRastreo,
                        'agregadoPor' => $nPorQuien,
                        'fecha'       => new CDbExpression('NOW()'),
                        'mensaje'     => "Ticket registrado en Helix como {$tipoLabel}: {$codigoHelix}",
                    ));
                }
            }

        } catch (Exception $e) {
            $errorInterno = $e->getMessage();
            error_log('HelixController::actionEnviar exception: ' . $errorInterno);
        }

        // ── 3. Correo — antes de responder para poder incluir el resultado ────
        $correoOk    = null;   // null = no aplica (Helix falló)
        $correoError = '';

        if ($resultado['ok'] && $codigoHelix !== '') {
            ob_start();
            try {
                $resCorreo   = enviar_correo_cliente($datos, $codigoHelix, $tipo);
                $correoOk    = $resCorreo['ok'];
                $correoError = $resCorreo['error'];
            } catch (Exception $e) {
                $correoOk    = false;
                $correoError = $e->getMessage();
                error_log('Correo fallido: ' . $correoError);
            }
            ob_end_clean();
        }

        // ── 4. Respuesta JSON ─────────────────────────────────────────────────
        ob_end_clean();

        $jsonResp = CJSON::encode(array(
            'ok'           => $resultado['ok'],
            'http_code'    => $resultado['http_code'],
            'respuesta'    => $resultado['respuesta'],
            'codigoHelix'  => $codigoHelix,
            'mensajeHelix' => $mensajeHelix,
            'error'        => $errorInterno,
            'correo_ok'    => $correoOk,      // true | false | null
            'correo_error' => $correoError,
        ));

        header('Content-Type: application/json');
        echo $jsonResp;

        if (function_exists('fastcgi_finish_request')) {
            fastcgi_finish_request();
        } else {
            flush();
        }

        Yii::app()->end();
    }

    // ── actionPersonal ────────────────────────────────────────────────────────

    public function actionPersonal()
    {
        if (Yii::app()->user->isGuest) {
            header('Content-Type: application/json');
            echo CJSON::encode(array());
            Yii::app()->end();
        }

        $roles = Yii::app()->user->isAdministrador()
            ? "Rol='Admin' OR Rol='CoAdmin'"
            : "Rol='Admin'";

        $soporte = Yii::app()->db->createCommand(
            "SELECT p.Matricula,
                    CONCAT(p.Nombres,' ',p.ApPaterno,' ',p.ApMaterno) nom,
                    u.Email
             FROM cdi_usuarios u
             INNER JOIN cdi_cat_personal p ON p.Matricula = u.Matricula
             WHERE ({$roles})
             ORDER BY p.ApPaterno, p.Nombres"
        )->queryAll();

        foreach ($soporte as &$us) {
            $email       = isset($us['Email']) ? $us['Email'] : '';
            $us['login'] = ($email !== '' && strpos($email, '@') !== false)
                ? strstr($email, '@', true)
                : '';
        }
        unset($us);

        header('Content-Type: application/json');
        echo CJSON::encode($soporte);
        Yii::app()->end();
    }

    // ── actionBuscarLdap ──────────────────────────────────────────────────────
    // Ahora recibe el correo completo (parámetro POST 'email') y
    // busca en LDAP por el atributo 'mail', sin restricción de dominio.

    public function actionBuscarLdap()
    {
        header('Content-Type: application/json');

        $email = isset($_POST['email']) ? trim($_POST['email']) : '';

        if ($email === '') {
            echo CJSON::encode(array('ok' => false, 'encontrado' => false, 'msg' => 'Correo vacío'));
            Yii::app()->end();
        }

        // Validación básica de formato de correo
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo CJSON::encode(array('ok' => false, 'encontrado' => false, 'msg' => 'Formato de correo no válido'));
            Yii::app()->end();
        }

        require_once Yii::getPathOfAlias('application') . '/helix/config.php';

        echo CJSON::encode($this->buscarEnLdap($email));
        Yii::app()->end();
    }

    // Busca por atributo 'mail' en lugar de 'samaccountname'
    private function buscarEnLdap($email)
    {
        $conn = @ldap_connect(LDAP_HOST, LDAP_PORT);
        if (!$conn)
            return array('ok' => false, 'encontrado' => false, 'msg' => 'No se pudo conectar al servidor LDAP');

        ldap_set_option($conn, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($conn, LDAP_OPT_REFERRALS, 0);

        if (!@ldap_bind($conn, LDAP_USER, LDAP_PASS))
            return array('ok' => false, 'encontrado' => false, 'msg' => 'Error al autenticar con el directorio');

        // Filtro por atributo 'mail' con el correo completo
        $filtro    = '(mail=' . ldap_escape($email, '', LDAP_ESCAPE_FILTER) . ')';
        $atributos = array('displayname', 'mail', 'samaccountname', 'cn');
        $resultado = @ldap_search($conn, LDAP_BASE_DN, $filtro, $atributos);

        if ($resultado === false) {
            ldap_unbind($conn);
            return array('ok' => false, 'encontrado' => false, 'msg' => 'Error en la búsqueda');
        }

        $entradas = ldap_get_entries($conn, $resultado);
        ldap_unbind($conn);

        if ($entradas['count'] > 0) {
            return array(
                'ok'             => true,
                'encontrado'     => true,
                'displayname'    => isset($entradas[0]['displayname'][0])    ? $entradas[0]['displayname'][0]    : '',
                'mail'           => isset($entradas[0]['mail'][0])           ? $entradas[0]['mail'][0]           : '',
                'samaccountname' => isset($entradas[0]['samaccountname'][0]) ? $entradas[0]['samaccountname'][0] : '',
                'msg'            => 'Usuario encontrado en el directorio',
            );
        }

        return array('ok' => true, 'encontrado' => false, 'msg' => 'El correo no existe en el directorio');
    }
}