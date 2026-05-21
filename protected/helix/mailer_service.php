<?php

require_once 'config.php';

function enviar_correo_cliente(array $datos, $codigoHelix, $tipo = 'wo') {
    $autoload = PHPMAILER_PATH . 'PHPMailerAutoload.php';
    if (!file_exists($autoload)) {
        error_log('PHPMailer no encontrado en: ' . PHPMAILER_PATH);
        return array('ok' => false, 'error' => 'PHPMailer no encontrado');
    }

    require_once $autoload;
    require_once PHPMAILER_PATH . 'phpmailer.php';
    require_once PHPMAILER_PATH . 'smtp.php';

    $tipoLabel = ($tipo === 'incidente') ? 'Incidente' : 'Orden de Trabajo';

    // ── Destinatarios ─────────────────────────────────────────────────────────
    $emailCliente = (isset($datos['email_cliente']) && $datos['email_cliente'] !== '')
        ? $datos['email_cliente']
        : trim($datos['login_cliente']) . '@imss.gob.mx';

    $emailContacto = (isset($datos['login_contacto']) && $datos['login_contacto'] !== '')
        ? trim($datos['login_contacto']) . '@imss.gob.mx'
        : '';

    // ── Códigos ───────────────────────────────────────────────────────────────
    $ticketLocal = isset($datos['ticket_msl']) && $datos['ticket_msl'] !== ''
        ? $datos['ticket_msl']
        : (isset($datos['nRastreo']) ? $datos['nRastreo'] : '—');

    // ── Cuerpo HTML ───────────────────────────────────────────────────────────
    $html = '
    <!DOCTYPE html>
    <html lang="es">
    <head><meta charset="UTF-8"></head>
    <body style="margin:0; padding:0; background:#f4f4f4; font-family:Arial,sans-serif;">
      <table width="100%" cellpadding="0" cellspacing="0" style="background:#f4f4f4; padding:30px 0;">
        <tr><td align="center">
          <table width="580" cellpadding="0" cellspacing="0"
                 style="background:#ffffff; border-radius:8px;
                        box-shadow:0 2px 8px rgba(0,0,0,.1); overflow:hidden;">

            <!-- Cabecera -->
            <tr>
              <td style="background:#1a6e2e; padding:24px 32px; text-align:center;">
                <h2 style="margin:0; color:#ffffff; font-size:20px; letter-spacing:1px;">
                  COORDINACIÓN DELEGACIONAL DE INFORMÁTICA OAXACA
                </h2>
                <p style="margin:6px 0 0; color:#c8e6c9; font-size:13px;">
                  Mesa de Servicios — Notificación de ticket
                </p>
              </td>
            </tr>

            <!-- Cuerpo -->
            <tr>
              <td style="padding:32px;">
                <p style="margin:0 0 20px; color:#333; font-size:15px;">
                  Su solicitud ha sido registrada en la mesa de servicios. A continuación los datos de seguimiento:
                </p>

                <!-- Tabla de códigos -->
                <table width="100%" cellpadding="0" cellspacing="0"
                       style="border-collapse:collapse; margin-bottom:24px;">
                  <tr>
                    <td width="50%" style="padding:6px 0;">
                      <div style="background:#e8f5e9; border:1px solid #a5d6a7;
                                  border-radius:6px; padding:16px; text-align:center;">
                        <p style="margin:0 0 4px; font-size:12px; color:#555;
                                   text-transform:uppercase; letter-spacing:1px;">
                          Ticket Mesa Local
                        </p>
                        <p style="margin:0; font-size:22px; font-weight:bold;
                                   color:#1b5e20; letter-spacing:2px;">
                          ' . htmlspecialchars($ticketLocal) . '
                        </p>
                      </div>
                    </td>
                    <td width="10px"></td>
                    <td width="50%" style="padding:6px 0;">
                      <div style="background:#e3f2fd; border:1px solid #90caf9;
                                  border-radius:6px; padding:16px; text-align:center;">
                        <p style="margin:0 0 4px; font-size:12px; color:#555;
                                   text-transform:uppercase; letter-spacing:1px;">
                          Ticket Helix
                        </p>
                        <p style="margin:0; font-size:22px; font-weight:bold;
                                   color:#0d47a1; letter-spacing:2px;">
                          ' . htmlspecialchars($codigoHelix) . '
                        </p>
                      </div>
                    </td>
                  </tr>
                </table>

                <p style="margin:0 0 8px; color:#555; font-size:13px;">
                  <strong>Resumen:</strong> ' . htmlspecialchars($datos['resumen']) . '
                </p>
              </td>
            </tr>

            <!-- Pie -->
            <tr>
              <td style="background:#f9f9f9; padding:16px 32px; text-align:center;
                          border-top:1px solid #eee;">
                <p style="margin:0; font-size:12px; color:#aaa;">
                  Instituto Mexicano del Seguro Social &mdash; IMSS Oaxaca
                </p>
              </td>
            </tr>

          </table>
        </td></tr>
      </table>
    </body>
    </html>';

    // ── PHPMailer ─────────────────────────────────────────────────────────────
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host        = MAIL_HOST;
        $mail->Port        = MAIL_PORT;
        $mail->SMTPAuth    = true;
        $mail->Username    = MAIL_USERNAME;
        $mail->Password    = MAIL_PASSWORD;
        $mail->SMTPSecure  = 'tls';
        $mail->Timeout     = 5;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer'       => false,
                'verify_peer_name'  => false,
                'allow_self_signed' => true,
            ),
        );

        $mail->CharSet = 'UTF-8';
        $mail->setFrom(MAIL_FROM, MAIL_FROM_NAME);
        $mail->addAddress($emailCliente);

        if ($emailContacto !== '' && $emailContacto !== $emailCliente) {
            $mail->addCC($emailContacto);
        }

        $mail->isHTML(true);
        $mail->Subject = "Ticket registrado Local: {$ticketLocal} | Helix: {$codigoHelix}";
        $mail->Body    = $html;
        $mail->AltBody = "Su solicitud fue registrada como {$tipoLabel}.\n"
                       . "Ticket Msicdi: {$ticketLocal}\n"
                       . "Ticket Helix: {$codigoHelix}\n"
                       . "Resumen: {$datos['resumen']}";

        $mail->send();
        return array('ok' => true, 'error' => '');

    } catch (Exception $e) {
        $errorInfo = $mail->ErrorInfo ?: $e->getMessage();
        error_log('PHPMailer error [cliente:' . $emailCliente . ' contacto:' . $emailContacto . ']: ' . $errorInfo);
        return array('ok' => false, 'error' => $errorInfo);
    }
}