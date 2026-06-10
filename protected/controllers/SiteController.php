<?php
    /**
     * Controlador de Site,
     * 
     * El controlador de Site se encarga de cambiar estados, acrtualizar informacion, obtener informacion solicitada, validar elementos que se solicitan y de agregar elementos nuevos a las bases de datos.
     * @author González Santiago Héctor Florencio
     * @copyright Copyright (c) 2015, González Héctor <hector@devoaxaca.com>
     * @version 1.0.1
     * @package protected.controllers
     * @category Controlador
     */
class SiteController extends Controller
{
  public function actionAcerca(){
      $this->render('acerca');
  }

  public function actionMGSI(){
        $this->render('mgsi');
  }

  public function actionExcelReportes(){
        extract($_REQUEST);
        if(isset($cr)){
            $cr_next = (int)$cr + 1;

            $query = "SELECT r.*,
                        n.mensaje AS notaHelix
                    FROM cdi_reportes_manual r
                    LEFT JOIN (
                        SELECT Nrastreo, mensaje
                        FROM cdi_notas
                        WHERE mensaje LIKE 'Ticket registrado en Helix%'
                    ) n ON n.Nrastreo = r.NRastreo
                    WHERE r.fechaReporte >= '{$cr}-01-01'
                    AND r.fechaReporte <  '{$cr_next}-01-01'";

            $db = Yii::app()->db->createCommand($query)->queryAll();

            foreach ($db as &$row) {
                $codigoHelix = '';
                if (!empty($row['notaHelix'])) {
                    if (preg_match('/\b(WO|INC|IM)[0-9]+\b/i', $row['notaHelix'], $m)) {
                        $codigoHelix = strtoupper($m[0]);
                    }
                }
                $row['codigoHelix'] = $codigoHelix;
            }
            unset($row);

            Yii::app()->request->sendFile('miarchivo.xls',
                $this->renderPartial('excelRep', compact('db'), true));
        } else {
            $this->redirect(Yii::app()->request->baseUrl."/inicio");
        }
    }

  public function actionExcel(){
        extract($_REQUEST);
        if( isset($cr) ){
            $query = "select * from cdi_inventario i,cdi_cat_hw h, cdi_cat_inmuebles m,cdi_cat_municipios s where h.id_hw = i.id_hw and i.referencia=m.Referencia and s.ClaveMunicipio=m.ClaveMunicipio and (".$cr.") order by IdInv";
          $db = Yii::app()->db->createCommand($query)->queryAll();
          $query = "show columns from cdi_inventario";
          $res = Yii::app()->db->createCommand($query)->queryAll();
          $columnas = array();
          foreach($res as $r){
            $t = array();
            array_push($t,$r['Field']);
            array_push($columnas,$t);
          }
          Yii::app()->request->sendFile('miarchivo.xls',
                                      $this->renderPartial('excel',compact('db','columnas'),true));
      }else
        $this->redirect(Yii::app()->request->baseUrl."/inicio");
  }

  public function actionRepRes(){
       if( !Yii::app()->user->isGuest ){
          extract($_REQUEST);
          header("Content-type: application/json");
          $query = "select * from cdi_inventario i,cdi_cat_hw h, cdi_cat_inmuebles m,cdi_cat_municipios s where h.id_hw = i.id_hw and i.referencia=m.Referencia and s.ClaveMunicipio=m.ClaveMunicipio and (".$criterio.") order by IdInv";
          $db = Yii::app()->db->createCommand($query)->queryAll();
          echo CJSON::encode($db);
       }
    }

    public function actionactBack(){
       if( !Yii::app()->user->isGuest ){
            $mail = $_POST['mail'];
            $serie = $_POST['nserie'];
            $falla = $_POST['falla'];
            $iporigen = $_POST['iporigen'];
            $telefono = $_POST['telefono'];
            $usuario = $_POST['usuario'];
            $contrasena = $_POST['contrasena'];
            $ipEquipo = $_POST['ipequipo'];
            $nRastreo = $_POST['folio'];

            $query="UPDATE cdi_reportes_manual SET eMail='{$mail}', nSerie='{$serie}',descripcionFalla='{$falla}',ipOrigen='{$iporigen}',Telefono='{$telefono}', usuario='{$usuario}',contrasena='{$contrasena}',ipEquipo='{$ipEquipo}'  WHERE NRastreo = '{$nRastreo}' ";
            $res = Yii::app()->db->createCommand($query)->execute();

                $this->redirect(Yii::app()->request->baseUrl."/soporte/gerardo.html?state=".$res);

        }else
            $this->redirect(Yii::app()->request->baseUrl."/soporte");
    }

    public function actionGetInformacionReporte(){
        header("Content-type: application/json");
        $query = "SELECT * FROM cdi_reportes_manual WHERE nRastreo='{$_POST['criterio']}'";
        $db = Yii::app()->db->createCommand($query)->queryAll();
        echo CJSON::encode($db);
    }

  public function actionGetMensajesMenu(){
    if (Yii::app()->user->isGuest)
                $this->redirect(Yii::app()->request->baseUrl."/soporte");
            else{
                header("Content-type: application/json");
                $nom = $this->getNombreByMatriculaDos( Yii::app()->user->name );
                $query = "SELECT respuestaPara from cdi_respuestas where respuestaPara in (SELECT nRastreo from cdi_reportes_manual where soporte='{$nom}') && TIMESTAMPDIFF(HOUR,fechaRespuesta,now()) < 49 && nombre != '{$nom}'";
                $db = Yii::app()->db->createCommand($query)->queryAll();
                echo CJSON::encode($db);
            }
  }

  public function actionGetNotificacionesMenu(){
    if (Yii::app()->user->isGuest)
                $this->redirect(Yii::app()->request->baseUrl."/soporte");
            else{
                header("Content-type: application/json");
                $nom = $this->getNombreByMatriculaDos( Yii::app()->user->name );
                $query = "SELECT NRastreo R,status S FROM cdi_reportes_manual WHERE soporte='{$nom}' order by NRastreo desc";
                $db = Yii::app()->db->createCommand($query)->queryAll();
                echo CJSON::encode($db);
            }
  }
  /**
   * [getNotificaciones Obtiene las nuevas notificaciones de la base de datos]
   * @since 1.0.1 Se introdujo este elemento
   */
  public function actionGetNotificaciones(){
      if (Yii::app()->user->isGuest)
                $this->redirect(Yii::app()->request->baseUrl."/soporte");
            else
                if( isset($_POST['matr']) ){
                    header("Content-type: application/json");
                    $nom = $this->getNombreByMatriculaDos( $_POST['matr'] );
                    $query = "SELECT TIME_TO_SEC(TIMEDIFF(NOW(), ultimoCambio)) dif,NRastreo from cdi_reportes_manual where status='Nuevo' and soporte='{$nom}'";
                    $db = Yii::app()->db->createCommand($query)->queryAll();
                    $res = array();
                    foreach ($db as $rep) {
                      if( ((int)$rep['dif']) < 5 ){
                        array_push( $res,$rep );
                      }
                    }
                    echo CJSON::encode($res);
                }
  }
    /**
     * [actioncambiarVisibilidad Cambia la visibilidad de los estados]
     * @since 1.0.1 Se introdujo este elemento
     */
    public function actioncambiarVisibilidad(){
        if (Yii::app()->user->isGuest)
            $this->redirect(Yii::app()->request->baseUrl."/soporte");
        else
            if( isset($_POST['id']) ){
                $query="UPDATE cdi_cat_statusreporte SET visibilidad='{$_POST['val']}'  WHERE idStatus = '{$_POST['id']}' ";
                Yii::app()->db->createCommand($query)->execute(); 
            }
    }
    /**
     * [actionUpdateInventario Actualiza la informacion del inventario a partir del numero de inventario y la matricula]
     * @since 1.0.1 Se introdujo este elemento
     */
    public function actionUpdateInventario(){
            $matricula =$_POST['matr'];
            $nni=$_POST['nnip'];
            $nombreNuevo=$_POST['namePC'];
            $contrato=$_POST['contrato'];
            $notiMov=$_POST['notiMov'];
            $ubicacionDocto=$_POST['UbDocto'];
            $comenta=$_POST['comenta'];
            $finGarantia=$_POST['finG'];
            $serie=$_POST['serie'];
            $serieM=$_POST['serieM'];
            $ip=$_POST['ip'];
            $referencia=$_POST['nuevaR'];
            $seg1=$_POST['seg1'];
            $seg2=$_POST['seg2'];
            $vpn=$_POST['vpn'];
            $dir=$_POST['direccion'];
            $num=$_POST['numero'];
            $municipio=$_POST['muni'];
            $asenta=$_POST['asentamiento'];
            $cp=$_POST['codigo'];
            $tipo=$_POST['tipoo'];
            $marca=$_POST['marcaa'];
            $mod=$_POST['modeloo'];
            $status=$_POST['status'];
            $so=$_POST['so'];
            $dp=$_POST['dp'];
            $un=$_POST['unidad'];
            $paterno=$_POST['pate'];
            $materno=$_POST['mate'];
            $nombres=$_POST['names'];
            $query="UPDATE cdi_inventario SET NomPC='{$nombreNuevo}', contrato='{$contrato}', NoticiaMov='{$notiMov}' , UbicacionDocto='{$ubicacionDocto}', Comentarios='{$comenta}', FinGarantia='{$finGarantia}', Serie='{$serie}', SerieMonitor='{$serieM}',IP='{$ip}',ClaveStatus='{$status}', ClaveSO='{$so}', CC='{$dp}',UI='{$un}' WHERE Matricula = '{$matricula}' AND NNI ='{$nni}' ";
            $db = Yii::app()->db->createCommand($query)->execute(); 
            $query="UPDATE cdi_cat_inmuebles SET SegmentoIP01='{$seg1}' , SegmentoIP02='{$seg2}' , CodigoVPN='{$vpn}', Direccion='{$dir}', Numero='{$num}' WHERE Referencia ='{$referencia}' ";
            $db = Yii::app()->db->createCommand($query)->execute(); 
            $query="UPDATE cdi_cat_municipios SET Municipio ='{$municipio}' , Asentamiento='{$asenta}', Codigo='{$cp}' WHERE ClaveMunicipio = (select ClaveMunicipio FROM cdi_cat_inmuebles WHERE Referencia='{$referencia}') ";
            $db = Yii::app()->db->createCommand($query)->execute(); 
            $query ="UPDATE cdi_cat_hw SET Descripcion='{$tipo}', Marca='{$marca}', Modelo='{$mod}' WHERE id_hw = (select id_hw FROM cdi_inventario WHERE NNI='{$nni}') ";
            $db = Yii::app()->db->createCommand($query)->execute(); 
            $query="UPDATE cdi_cat_personal SET Nombres='{$nombres}', ApPaterno='{$paterno}', ApMaterno='{$materno}' WHERE Matricula= (select distinct matricula from cdi_inventario where matricula='{$matricula}')";
            $db = Yii::app()->db->createCommand($query)->execute(); 
            

        }
        /**
         * [actionGetNombreByMatricula Obtiene la infromacion relacionada a la matricula]
         * @return [JSON] [Infromación acerca de la matrícula en formato JSON]
         * @since 1.0.1 Se introdujo este elemento
         */
        public function actionGetNombreByMatricula(){
            $matr = $_POST['matr'];
            $query = "select concat(Nombres, ' ',ApPaterno,' ',ApMaterno) n from cdi_cat_personal where Matricula='{$matr}'";
            $db = Yii::app()->db->createCommand($query)->queryAll();
            header("Content-type: application/json");
            echo CJSON::encode($db);
        }
        /**
         * [actionReporteAnual Obtiene la información de los reportes que se levantaron en cierto año]
         * @return [JSON] [Información solicitada en formato JSON]
         * @since 1.0.1 Se introdujo este elemento
         */
         public function actionReporteAnual(){
           if (Yii::app()->user->isGuest)
                  $this->redirect(Yii::app()->request->baseUrl."/soporte");
            else
                if(Yii::app()->user->isAdministrador()){
                    $anio = date('Y');
                    if(isset($_POST['anioReporte']))
                        $anio = $_POST['anioReporte'];
                    $query = "select count(id) c,month(fechaReporte) m from cdi_reportes_manual where year(fechaReporte)='{$anio}' group by month(fechaReporte) ";
                    $db = Yii::app()->db->createCommand($query)->queryAll();
                    $resp = $db;
                    header("Content-type: application/json");
                    echo CJSON::encode($resp);
                }else
                    $this->redirect(Yii::app()->request->baseUrl."/soporte");
        }

        /**
         * [actionReporteAnualResueltos Obtiene la cantidad de reportes que se encuentran en estado resuelto dado un año especifico, toamando en cuenta los niveles de acceso]
         * @return [JSON] [Información solicitada en formato JSON]
         * @since 1.0.1 Se introdujo este elemento
         */
         public function actionReporteAnualResueltos(){
           if (Yii::app()->user->isGuest)
                  $this->redirect(Yii::app()->request->baseUrl."/soporte");
            else
                if(Yii::app()->user->isAdministrador()){
                    $anio = date('Y');
                    if(isset($_POST['anioReporte']))
                        $anio = $_POST['anioReporte'];
                    $query = "select count(id) c1,month(fechaReporte) m1 from cdi_reportes_manual where year(fechaReporte)='{$anio}' and status='Resuelto' group by month(fechaReporte)";
                    $db = Yii::app()->db->createCommand($query)->queryAll();
                    $resp = $db;
                    header("Content-type: application/json");
                    echo CJSON::encode($resp);
                }else
                    $this->redirect(Yii::app()->request->baseUrl."/soporte");
        }

        /**
         * [actionActualizarPerfil Actualiza la información personal del usuario, tomando en cuenta los niveles de acceso]
         * @since 1.0.1 Se introdujo este elemento
         */
        public function actionActualizarPerfil(){
            if (Yii::app()->user->isGuest)
                  $this->redirect(Yii::app()->request->baseUrl."/soporte");
            else
                if( Yii::app()->user->isAdministrador() || Yii::app()->user->isCoAdmin()){
                    $matr = $_POST['_matr'];
                    $nom = $_POST['_nombres'];
                    $ap = $_POST['_apPaterno'];
                    $am = $_POST['_apMaterno'];
                    $contr = $_POST['_contra'];
                    $cad = $_POST['_adscrip'];
                    $ccat = $_POST['_catego'];
                    $mail = $_POST['_email'];
                    $nAnterior = $this->getNombreByMatriculaDos( $matr );
                    $query = "update cdi_cat_personal";
                    $query .= " set Nombres='{$nom}',ApPaterno='{$ap}',ApMaterno='{$am}',ClaveAdscripcion='{$cad}',ClaveCategoria='{$ccat}'";
                    $query .= " where Matricula='{$matr}'";
                    Yii::app()->db->createCommand($query)->execute();
                    if( $contr=='sincambios' )
                        $query = "update cdi_usuarios set Email='{$mail}' where Matricula='{$matr}'";
                    else
                       $query = "update cdi_usuarios set Email='{$mail}',Password=sha1('{$contr}') where Matricula='{$matr}'"; 
                    Yii::app()->db->createCommand($query)->execute();
                    $nDespues = $this->getNombreByMatriculaDos( $matr );
                    $query = "update cdi_reportes_manual set soporte='{$nDespues}' where soporte='{$nAnterior}'";
                    Yii::app()->db->createCommand($query)->execute();
                    $this->redirect(Yii::app()->request->baseUrl."/soporte/perfil.html?state=1");
                }else
                    $this->redirect(Yii::app()->request->baseUrl."/soporte");
        }

        /**
         * [actionrenombrarCategoria Actualiza la información contenida en la tabla categoria]
         * @since 1.0.1 Se introdujo este elemento
         */
        public function actionrenombrarCategoria(){
            if (Yii::app()->user->isGuest)
                  $this->redirect(Yii::app()->request->baseUrl."/soporte");
            else
                if(Yii::app()->user->isAdministrador()){
                    $nAnt = $_POST['nAnt'];
                    $nNu = $_POST['_categoria'];
                    if( strlen($nNu) == 0 )
                        $this->redirect(Yii::app()->request->baseUrl."/soporte/categorias.html?state=0");
                    $query = "select Status from cdi_cat_statusreporte where idStatus='{$nAnt}'";
                    $db = Yii::app()->db->createCommand($query)->queryAll();
                    $nName = $db[0]['Status'];
                    $query = "update cdi_cat_statusreporte set Status='{$nNu}' where idStatus='{$nAnt}'";
                    $res = Yii::app()->db->createCommand($query)->execute();
                    $query = "update cdi_reportes_manual set status='{$nNu}' where status='{$nName}'";
                    $res = Yii::app()->db->createCommand($query)->execute();
                    $this->redirect(Yii::app()->request->baseUrl."/soporte/categorias.html?state={$res}");
                }else
                    $this->redirect(Yii::app()->request->baseUrl."/soporte");
        }

        /**
         * [actionAgregarCategoria Agrega una nueva categoria a la tabla correspondiente]
         * @since 1.0.1 Se introdujo este elemento
         */
        public function actionAgregarCategoria(){
            if (Yii::app()->user->isGuest)
                  $this->redirect(Yii::app()->request->baseUrl."/soporte");
            else
                if(Yii::app()->user->isAdministrador()){
                    $cat = $_POST['categoria'];
                    if( strlen($cat) == 0 )
                        $this->redirect(Yii::app()->request->baseUrl."/soporte/categorias.html?state=0");
                    $query = "insert into cdi_cat_statusreporte (Status) values('{$cat}')";
                    $res = Yii::app()->db->createCommand($query)->execute();
                    $this->redirect(Yii::app()->request->baseUrl."/soporte/categorias.html?state={$res}");
                }else
                    $this->redirect(Yii::app()->request->baseUrl."/soporte");
        }

        /**
         * [actionActualizarInfo Actualiza la información personal de usuario]
         * @since 1.0.1 Se introdujo este elemento
         */
        public function actionActualizarInfo(){
            if (Yii::app()->user->isGuest)
                  $this->redirect(Yii::app()->request->baseUrl."/soporte");
            else
                if(Yii::app()->user->isAdministrador()){
                    $matr = $_POST['_matr'];
                    $nom = $_POST['_nombres'];
                    $ap = $_POST['_apPaterno'];
                    $am = $_POST['_apMaterno'];
                    $contr = $_POST['_contra'];
                    $cad = $_POST['_adscrip'];
                    $ccat = $_POST['_catego'];
                    $mail = $_POST['_email'];
                    $rol = $_POST['_rol'];
                    $query = "update cdi_cat_personal";
                    $query .= " set Nombres='{$nom}',ApPaterno='{$ap}',ApMaterno='{$am}',ClaveAdscripcion='{$cad}',ClaveCategoria='{$ccat}'";
                    $query .= " where Matricula='{$matr}'";
                    Yii::app()->db->createCommand($query)->execute();
                    if( $contr=='sincambios' )
                        $query = "update cdi_usuarios set Email='{$mail}', Rol='{$rol}' where Matricula='{$matr}'";
                    else
                       $query = "update cdi_usuarios set Email='{$mail}', Rol='{$rol}',Password=sha1('{$contr}') where Matricula='{$matr}'"; 
                    Yii::app()->db->createCommand($query)->execute();
                    $this->redirect(Yii::app()->request->baseUrl."/soporte/usuarios.html?state=1");
                }else
                    $this->redirect(Yii::app()->request->baseUrl."/soporte");
        }
        /** 
         * [actionGetInfo Obtiene la información personal del usuario solicitado.]
         * @return [JSON] [Información solicitada en formato JSON]
         */
        public function actionGetInfo(){
            if (Yii::app()->user->isGuest)
                  $this->redirect(Yii::app()->request->baseUrl."/soporte");
            else
                if(Yii::app()->user->isAdministrador())
                    if(isset($_POST['matricula'])){
                        $id = $_POST['matricula'];
                        $query = "select Nombres nom,ApPaterno ap, ApMaterno am, ClaveAdscripcion cad,claveCategoria ccat,rol";
                        $query .= " FROM cdi_usuarios u, cdi_cat_personal p";
                        $query .= " WHERE p.Matricula = u.Matricula and p.Matricula='{$id}'";
                        $db = Yii::app()->db->createCommand($query)->queryAll();
                        $query = "select Email from cdi_usuarios where Matricula = '{$id}'";
                        $dbc = Yii::app()->db->createCommand($query)->queryAll();
                        $db[0]['correo'] = $dbc[0]['Email'];
                        $resp = $db[0];
                        header("Content-type: application/json");
                        echo CJSON::encode($resp);
                    }else
                        $this->redirect(Yii::app()->request->baseUrl."/soporte");
                else
                    $this->redirect(Yii::app()->request->baseUrl."/soporte");
        }
        /** 
         * [actionEliminarUsuario Elimina el registro de usuario de la base de datos a partir de una matricual determinada]
         * @since 1.0.1 Se introdujo este elemento
         */
        public function actionEliminarUsuario(){
            if (Yii::app()->user->isGuest)
                  $this->redirect(Yii::app()->request->baseUrl."/soporte");
            else
                if(Yii::app()->user->isAdministrador())
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        $query = "delete from cdi_usuarios where Matricula='{$id}'";
                        $fDelete = Yii::app()->db->createCommand($query)->execute();
                       // $query = "delete from cdi_cat_personal where Matricula='{$id}'";
                        //$sDelete = Yii::app()->db->createCommand($query)->execute();
                        //$res = $fDelete&&$sDelete;
                        $this->redirect(Yii::app()->request->baseUrl."/soporte/usuarios.html?state={$fDelete}");
                    }else
                        $this->redirect(Yii::app()->request->baseUrl."/soporte");
                else
                    $this->redirect(Yii::app()->request->baseUrl."/soporte");
        }
        /**
         * [actionGetUsuarios Obtiene todos los usuarios que se encuentren registrados  que cumplan con un criterio de búsqueda]
         * @return [JSON] [Información solicitada en formato JSON]
         * @since 1.0.1 Se introdujo este elemento
         */
        public function actionGetUsuarios(){
            $criterio = strtolower(trim($_POST['criterio']));
            $criterio = str_replace("'","",$criterio);
            $query = "select p.Matricula, concat(Nombres,' ',ApPaterno,' ',ApMaterno),u.Email,u.rol";
            $query .= " from cdi_cat_personal p, cdi_usuarios u";
            $query .= " where p.Matricula = u.Matricula and (u.matricula like '%{$criterio}%' or concat(Nombres,' ',ApPaterno,' ',ApMaterno) like '%{$criterio}%') and p.Matricula<>'0000000000'";
            $db = Yii::app()->db->createCommand($query)->queryAll();
            $resp = array();
            foreach($db as $pk=>$data)
                        $resp[$pk] = $data;
            // entrega del array via JSON array
            header("Content-type: application/json");
            echo CJSON::encode($resp);
        }
        /**
         * [actionmatriculaValida Valida que una matrícula proporcionada se encuentre registrada en la base de datos]
         * @return [JSON] [Información solicitada en formato JSON]
         * @since 1.0.1 Se introdujo este elemento
         */
        public function actionmatriculaValida(){
            $matr = strtolower(trim($_POST['matricula']));
            $matr = str_replace("'","",$matr);;
            $query = "select Nombres,ApPaterno,ApMaterno from cdi_cat_personal where Matricula='{$matr}'";
            $db = Yii::app()->db->createCommand($query)->queryAll();
            header("Content-type: application/json");
            echo CJSON::encode($db);
        }
        /**
         * [actionUsuarioDisponible Verifica que un usuario no se encuentre dado de alta e intente volver a registrarse]
         * @return [JSON] [Información solicitada en formato JSON]
         * @since 1.0.1 Se introdujo este elemento
         */
        public function actionUsuarioDisponible(){
            $matr = strtolower(trim($_POST['matricula']));
            $matr = str_replace("'","",$matr);
            $query = "select count(Matricula) cont from cdi_usuarios where Matricula='{$matr}'";
            $db = Yii::app()->db->createCommand($query)->queryAll();
            header("Content-type: application/json");
            echo CJSON::encode( $db[0]['cont'] );
        }
        /**
         * [actionGetAdscripcion Obtiene las adscripciones que cumplan co un criterio de búsqueda]
         * @return [JSON] [Información solicitada en formato JSON]
         * @since 1.0.1 Se introdujo este elemento
         */
        public function actionGetAdscripcion(){
            $criterio = strtolower(trim($_POST['criterio']));
            $criterio = str_replace("'","",$criterio);
            $query = "SELECT ClaveAdscripcion, Adscripcion from cdi_cat_adscripcion where ClaveAdscripcion like '%{$criterio}%' or Adscripcion like '%{$criterio}%' limit 100";
            $db = Yii::app()->db->createCommand($query)->queryAll();
            $resp = array();
            foreach($db as $pk=>$data)
                        $resp[$pk] = $data;
            header("Content-type: application/json");
            echo CJSON::encode($resp);
        }
        /**
         * [actionGetCategoria Obtiene las categorías que cumplan con un criterio de búsqueda]
         * @return [JSON] [Información solicitada en formato JSON]
         * @since 1.0.1 Se introdujo este elemento
         */
        public function actionGetCategoria(){
            $criterio = strtolower(trim($_POST['criterio']));
            $criterio = str_replace("'","",$criterio);
            $query = "SELECT ClaveCategoria, Categoria from cdi_cat_categoria where ClaveCategoria like '%{$criterio}%' or Categoria like '%{$criterio}%' limit 100";
            $db = Yii::app()->db->createCommand($query)->queryAll();
            $resp = array();
            foreach($db as $pk=>$data)
                        $resp[$pk] = $data;
            header("Content-type: application/json");
            echo CJSON::encode($resp);
        }
        /**
         * [actionGetElementos Obtiene los elementos de inventario que cumplan con un criterio de búsqueda y un numero máximo de elementos]
         * @return [JSON] [Información solicitada en formato JSON]
         * @since 1.0.1 Se introdujo este elemento
         */
       public function actionGetElementos(){
        	$criterio = strtolower(trim($_POST['criterio']));
            $criterio = str_replace("'","",$criterio);
            $limite = $_POST['limite'];
            $query = "select i.nni, i.serie, m.municipio ubicacion,h.descripcion,h.marca,h.modelo,concat(p.appaterno,' ',apmaterno,' ',p.nombres)responsable";
            $query .= " from cdi_cat_cc  c,  cdi_inventario i,cdi_cat_personal p,cdi_cat_hw h,cdi_cat_inmuebles im, cdi_cat_municipios m";
            $query .= " where  i.cc=c.cc and i.matricula=p.matricula and i.id_hw=h.id_hw and i.referencia=im.referencia and im.clavemunicipio=m.clavemunicipio and ( i.nni like '%$criterio%' or c.descripcion like '%$criterio%' or i.serie like '%$criterio%' or h.descripcion like '%$criterio%' or concat(p.appaterno,' ',apmaterno,' ',p.nombres) like '%$criterio%' or h.marca like '%$criterio%' or m.municipio like'%$criterio%')";
            $query .= ($limite=="todo")?"  order by  i.nni;":" order by i.nni limit {$limite} ;";
            $db = Yii::app()->db->createCommand($query)->queryAll();
            $resp = array();
            foreach($db as $pk=>$data)
                        $resp[$pk] = $data;
            // entrega del array via JSON array
            header("Content-type: application/json");
            echo CJSON::encode($resp);
        }
        /**
         * [actionGetInformacion Obtiene Información de un elemento del inventario a partir de un nni proporcionado]
         * @return [JSON] [Información solicitada en formato JSON]
         * @since 1.0.1 Se introdujo este elemento
         */
        public function actionGetInformacion(){
            $nni = strtolower(trim($_POST['nni']));
            $nni = str_replace("'","",$nni);
            header("Content-type: application/json");
            $query = " select i.nni,i.serie,Marca,Modelo,h.Descripcion tipoM,SerieMonitor,Status,concat(c.cc,' - ',c.Descripcion) Descripcion,concat(i.ui,' ',i.cc) prei,concat(i.ui,' ',a.adscripcion) unidad ,muni.municipio,concat(p.appaterno,' ',apmaterno,' ',p.nombres) responsable ,
                 im.SegmentoIP01 Seg1 , im.SegmentoIP02 Seg2 , im.CodigoVPN , im.Direccion, im.Numero,muni.Asentamiento, im.Referencia,
                 muni.Codigo,i.Matricula, i.Comentarios, i.Contrato, i.NomPC, i.IP, i.NoticiaMov, i.FinGarantia, i.UbicacionDocto, so.DescSO,po.Proyecto ";
            $query .= " from cdi_inventario i, cdi_cat_hw h, cdi_cat_status s,cdi_cat_cc c, cdi_cat_ui u,cdi_cat_adscripcion a , cdi_cat_municipios muni , cdi_cat_personal p , cdi_cat_inmuebles im , cdi_cat_so so,cdi_proyectosasignados  pa,cdi_cat_proyecto po ";
            $query .= " where nni='{$nni}' and h.id_hw=i.id_hw and i.ClaveStatus=s.ClaveStatus and i.cc=c.cc and i.ui=u.ui and u.claveadscripcion = a.claveadscripcion and i.matricula=p.matricula and i.referencia=im.referencia and im.clavemunicipio=muni.clavemunicipio and i.ClaveSO=so.ClaveSO and pa.IdInv=i.IdInv and pa.ClaveProyecto =po.ClaveProyecto";
            $db = Yii::app()->db->createCommand($query)->queryAll();
            $resp = array();
            foreach($db as $pk=>$data)
                        $resp[$pk] = $data;
            echo CJSON::encode($resp);
        }
        /**
         * [actionGetInfoBySerie Obtiene la información de n elemento del inventario a partir de un número de serie proporcionado]
         * @return [JSON] [Información solicitada en formato JSON]
         * @since 1.0.1 Se introdujo este elemento
         */
        public function actionGetInfoBySerie(){
            $nSerie = strtolower(trim($_POST['ns']));
            $nSerie = str_replace("'","",$nSerie);
            if($nSerie!=''){
                header("Content-type: application/json");
                $query = "select DescSO so, SegmentoIP01 ip1,SegmentoIP02 ip2, CodigoVPN vpn, CONCAT(Direccion, ' ',Numero) dir,Municipio, Adscripcion,st.Status,hw.Descripcion,hw.Marca,hw.Modelo ";
                $query .= "from cdi_inventario i, cdi_cat_so so, cdi_cat_inmuebles inm,cdi_cat_municipios mun,cdi_cat_adscripcion ad, cdi_cat_status st,cdi_cat_hw hw ";
                $query .=  "where (Serie = '{$nSerie}' or NNI='{$nSerie}') and so.ClaveSO = i.ClaveSO and inm.Referencia=i.Referencia and mun.ClaveMunicipio=inm.ClaveMunicipio and ad.ClaveAdscripcion=inm.ClaveAdscripcion and i.ClaveStatus=st.ClaveStatus and hw.id_hw=i.id_hw";
                $db = Yii::app()->db->createCommand($query)->queryAll();
                $resp = array();
                foreach($db as $pk=>$data)
                    $resp[$pk] = $data;
                echo CJSON::encode($resp);
            }
        }
        /**
         * [actionGetRespuetas Obtiene todas las respuestas que pertenecen a un número de reporte proporcionado]
         * @return [JSON] [Información solicitada en formato JSON]
         * @since 1.0.1 Se introdujo este elemento
         */
        public function actionGetRespuetas(){
            $nRastreo = trim($_POST['nR']);
            header("Content-type: application/json");
            $query = "SELECT fechaRespuesta,Mensaje,nombre FROM cdi_respuestas con WHERE respuestaPara='{$nRastreo}' order by id asc";
            $db = Yii::app()->db->createCommand($query)->queryAll();
            $resp = array();
            foreach($db as $pk=>$data)
                $resp[$pk] = $data;
            echo CJSON::encode($resp);
        }

        /**
         * [actionAgregarRespuesta Agrega una respuesta al seguimiento del reporte, a partir de un identificador]
         * @return [JSON] [Información solicitada en formato JSON]
         * @since 1.0.1 Se introdujo este elemento
         */
        public function actionAgregarRespuesta(){
            if( isset( $_POST['nRastr'] ) && isset( $_POST['txtRespuesta'] ) ){
                $nr     = $_POST['nRastr'];//Numero de rastreo del reporte
                $res    = $_POST['txtRespuesta'];//Mensaje que se publicara
                /**
                 * Si el reportador se identifico se usara la informacion con la que se identifico
                 * si no entonces se usara el nombre con el cual levanto el reporte
                 */
                if( $_POST['matr']=="Guest" ) {
                    $query      = "SELECT nombreReportador  from cdi_reportes_manual where NRastreo='{$_POST['nRastr']}'";
                    $db         = Yii::app()->db->createCommand($query)->queryAll();
                    $nm         = $db[0]['nombreReportador'];
                    if( $nm == ""){
                        $query      = "SELECT Matricula  from cdi_reportes_manual where NRastreo='{$_POST['nRastr']}'";
                        $db             = Yii::app()->db->createCommand($query)->queryAll();
                        //$matrTemporal   = $db[0]['Matricula'];
                        $nm = $this->getNombreByMatriculaDos($db[0]['Matricula']);
                    }
                    $query      = "INSERT INTO cdi_respuestas(nombre, respuestaPara, Mensaje, fechaRespuesta) VALUES ( '{$nm}','{$nr}','{$res}',NOW())";
                    $nReg       = Yii::app()->db->createCommand($query)->execute();
                    $resultado  = ( $nReg!=0 )?true:false;
                    $this->redirect(Yii::app()->request->baseUrl."/soporte/rastreo?codigo={$_POST['nRastr']}&&stat={$resultado}");
                }else{
                    $query      = "SELECT concat(Nombres,' ', ApPaterno,' ',ApMaterno) nom from cdi_cat_personal p  where p.Matricula='{$_POST['matr']}'";
                    $db         = Yii::app()->db->createCommand($query)->queryAll();
                    $nm         = $db[0]['nom'];
                    $query      = "INSERT INTO cdi_respuestas(nombre, respuestaPara, Mensaje, fechaRespuesta) VALUES ( '{$nm}','{$nr}','{$res}',NOW())";
                    $nReg       = Yii::app()->db->createCommand($query)->execute();
                    $resultado  = ( $nReg!=0 )?true:false;
                    $this->redirect(Yii::app()->request->baseUrl."/soporte/rastreo?codigo={$_POST['nRastr']}&&stat={$resultado}");
                }
            }else
                $this->redirect(Yii::app()->request->baseUrl."/soporte");
        }   
        /** 
         * [getNombreByMatriculaDos Obtiene el nombre completo del usuario a partir de una matricula proporcionada]
         * @param  [String] $matr [Matricula del usuario]
         */
        private function getNombreByMatriculaDos($matr){
            $query = "select concat(Nombres, ' ',ApPaterno,' ',ApMaterno) n from cdi_cat_personal where Matricula='{$matr}'";
            $db = Yii::app()->db->createCommand($query)->queryAll();
            return $db[0]['n'];
        }
        /**
         * [actionAgregarUsuario Agrega un registro de nuevo usuario a la base de datos]
         * @since 1.0.1 Se introdujo este elemento
         */
        public function actionAgregarUsuario(){
            if(isset($_POST['matricula'])){
                $matr = $_POST['matricula'];
                $pass = $_POST['contra'];
                $rol = $_POST['rol'];
                $mail = ( sizeof($_POST['email'])>0 )?$_POST['email']:'';
                $query = "insert into cdi_usuarios(Matricula,Password,MobilePIN,Email,PassWordQuestion,PasswordAnswer,IsApproved,IsLockedOut,CreateDate,LastLoginDate,LastPasswordChangedDate,LastLockOutDate,FailedPasswordAttemptCount,Comment,Rol,Perfil) values ";
                $query .= "('{$matr}',sha1('{$pass}'),'','{$mail}','','','1','0',NOW(),NOW(),NOW(),NOW(),'0','','{$rol}',NULL);";
                $sInsert = Yii::app()->db->createCommand($query)->execute();
                $this->redirect(Yii::app()->request->baseUrl."/soporte/usuarios.html?state={$sInsert}");
            }else
                $this->redirect(Yii::app()->request->baseUrl."/soporte/usuaarios.html");
        }
        /** 
         * [actionEditarInfo Obtiene los difernetes sistemas operativos que se encientran almacendados en la base de datos]
         * @return [JSON] [Información solicitada en formato JSON]
         * @since 1.0.1 Se introdujo este elemento
         */
        public function actionEditarInfo(){
            header("Content-type: application/json");
            //$clave=$_POST['claveDelSistema'];
            $query = " select distinct so.descSO as SistemaOperativo, ClaveSO";
            $query .=" from cdi_cat_so so order by 1";
            //$query .= "where SistemaOperativo ='{$clave}'";
            //s"select status from cdi_cat_status"
            $db = Yii::app()->db->createCommand($query)->queryAll();
            /*
            $referencia =$_POST['referencia'];
            $nuevoCC =$_POST[''];
            $statusN =$_POST['status'];
            $serieMonitorN =$_POST['serieMonitor'];
            $serie=$_POST['serie'];
            $nvoContrato =$_POST['contrato'];
            $nvaNoticia =$_POST['noticiaMovi'];
            $nvoPrei =$_POST['prei'];
            $nvaUbi =$_POST['ubicacionDoc'];
            $nvoPc =$_POST[''];
            $nvoComentario =$_POST[''];
            $=$_POST[''];

            */
            //$query = "update cdi_inventario set claveso='clave', referencia='{$referencia}',cc ='nuevoCC' ,claveStatus = 'statusNuevo', serie ='serieNva', serieMonitor='serieMNvo', contrato='nvoContrato', NoticiaMov='nvaNoticia', UbicacionDocto='nuevaUbi',nomPC='nombrePC', comentarios='comentariosN' where matricula = 'matricula' and nni ='nni' ";
            //
            //$query .="update cdi_inventario"
            $resp = array();
            foreach($db as $pk=>$data)
                        $resp[$pk] = $data;
            echo CJSON::encode($resp);
        }
        /**
        * [actionGetStatus Obtiene los diferenes estados que puede adquirir un elemento del inventario]
        * @return [JSON] [Información solicitada en formato JSON]
        * @since 1.0.1 Se introdujo este elemento
        */
        public function actionGetStatus(){
            header("Content-type: application/json");
            $query = "select status,ClaveStatus from cdi_cat_status order by 1";
            $db = Yii::app()->db->createCommand($query)->queryAll();
            $resp = array();
            foreach($db as $pk=>$data)
                        $resp[$pk] = $data;
            echo CJSON::encode($resp);
        }
        /** 
         * [actionGetMarca Obtiene las diferentes marcas que tiene un tipo de elemento]
         * @return [JSON] [Información solicitada en formato JSON]
         * @since 1.0.1 Se introdujo este elemento
         */
        public function actionGetMarca(){
            header("Content-type: application/json");
            $tipoo=$_POST['tipo2p'];
            $query = "select distinct descripcion, marca from cdi_cat_hw where descripcion = '{$tipoo}' order by 2";
            $db = Yii::app()->db->createCommand($query)->queryAll();
            $resp = array();
            foreach($db as $pk=>$data)
                        $resp[$pk] = $data;
            echo CJSON::encode($resp);
        }
        /**
         * [actionGetModelo Obtiene todos los modelos de hardware que puede tener un elemento a partir de una marca proporcionada]
         * @return [JSON] [Información solicitada en formato JSON]
         * @since 1.0.1 Se introdujo este elemento
         */
        public function actionGetModelo(){
            header("Content-type: application/json");
            $marcaa=$_POST['marca2dp'];
            $query = "select distinct marca, modelo from cdi_cat_hw where marca = '{$marcaa}'  order by 2 ";
            $db = Yii::app()->db->createCommand($query)->queryAll();
            $resp = array();
            foreach($db as $pk=>$data)
                        $resp[$pk] = $data;
            echo CJSON::encode($resp);
        }
        /**
         * [actionGetUnidad Obtiene la unidad y la dscripción en la que se encuentra un elemento del inventario]
         * @return [JSON] [Información solicitada en formato JSON]
         * @since 1.0.1 Se introdujo este elemento
         */
        public function actionGetUnidad(){
            header("Content-type: application/json");
            $matricula =$_POST['matr'];
            $query = " select distinct concat(i.ui,' ',a.adscripcion) as unidad ,i.ui as ui";
            $query .=" from cdi_inventario i, cdi_cat_adscripcion a ,cdi_cat_ui u ";
            $query .=" where i.ui=u.ui and u.claveadscripcion = a.claveadscripcion and i.matricula ='{$matricula}'";
            $db = Yii::app()->db->createCommand($query)->queryAll();
            $resp = array();
            foreach($db as $pk=>$data)
                        $resp[$pk] = $data;
            echo CJSON::encode($resp);
        }
        /**
         * [actionGetDepto Obtiene el departamento en donde se encuentra un elemento del inventario a partir de una unidad proporcionada]
         * @return [JSON] [Información solicitada en formato JSON]
         * @since 1.0.1 Se introdujo este elemento
         */
        public function actionGetDepto(){
            header("Content-type: application/json");
            $unidad=$_POST['uni'];
            $query="select clave,concat(clave,' ',descripcion)as descripcion from (SELECT SUBSTRING(claveprei,7,12) as clave,descripcion, SUBSTRING(clavePREI,1,6) as unidad FROM cdi_cat_prei order by 2) as unidad where unidad='{$unidad}'";
            $db = Yii::app()->db->createCommand($query)->queryAll();
            $resp = array();
            foreach($db as $pk=>$data)
                        $resp[$pk] = $data;
            echo CJSON::encode($resp);
        }
       /**
        * [actionReportePDF Obtien la matrícula, falla, fecha de reporte, estado y el encargado de un reporte, a partir de un número de seguimiento]
        * @return [JSON] [Información solicitada en formato JSON]
        * @since 1.0.1 Se introdujo este elemento
        */
        public function actionReportePDF(){
            header("Content-type: application/json");
            $idRastr=$_POST['idRast'];
            $query =" select matricula, descripcionFalla, fechaReporte, status, soporte as Responsable ";
            $query .=" from cdi_reportes_manual ";
            $query .=" where NRastreo='{$idRast}'";
            $db = Yii::app()->db->createCommand($query)->queryAll();
            $resp = array();
            foreach($db as $pk=>$data)
                        $resp[$pk] = $data;
            // entrega del array via JSON array
            header("Content-type: application/json");
            echo CJSON::encode($resp);        
        }
        /**
         * [actionOptionClaveSO Obtiene informacion de los sistems operativos a partir de una clave de SO proporcionado]
         * @return [JSON] [Información solicitada en formato JSON]
         * @since 1.0.1 Se introdujo este elemento
         */
        public function actionOptionClaveSO(){
            header("Content-type: application/json");
            $claveSOn=$_POST['claveOrigen'];
            $query = "select descSO, claveSO FROM cdi_cat_so WHERE DescSO ='{$claveSOn}'";
            $db = Yii::app()->db->createCommand($query)->queryAll();
            $resp = array();
            foreach($db as $pk=>$data)
                        $resp[$pk] = $data;
            echo CJSON::encode($resp);
        }
        /**
         * [actionAddSO Agrega un nuevo registro de SO en la base de datos]
         * @return [JSON] [Información solicitada en formato JSON]
         * @since 1.0.1 Se introdujo este elemento
         */
        public function actionAddSO(){        
            $query="select max(idSO) mn from cdi_cat_so";
            $db = Yii::app()->db->createCommand($query)->queryAll();
            $tmp = $db[0]['mn'];
            $sId = $tmp+1;
            $cve=$_POST['claveSO'];
            $nombreSO=$_POST['newSO'];        
            $query="INSERT INTO cdi_cat_so (ClaveSO, idSO, DescSo) VALUES ('{$cve}' , '{$sId}', '{$nombreSO}')";
            $newSO = Yii::app()->db->createCommand($query)->execute();
            header("Content-type: application/json");
            echo CJSON::encode(true);
        }
        /** 
         * [actionUpdateSO Actualiza el nombre y la clave de un sistema operativo en la base de datos.]
         * @since 1.0.1 Se introdujo este elemento
         */
        public function actionUpdateSO(){
            $nombreSO=$_POST['soNuevoo'];
            echo $nombreSO;
            $claveSOn=$_POST['claveOrigen'];
            echo $claveSOn;
            $query="UPDATE cdi_cat_so SET DescSO = '{$nombreSO}' WHERE ClaveSO='{$claveSOn}' ";
            $db = Yii::app()->db->createCommand($query)->execute();   
        }
        /**
         * [actionGetTipo Obtiene los diferentes tipos de hardware que se encuentran almacenados en la base de datos]
         * @return [JSON] [Información solicitada en formato JSON]
         * @since 1.0.1 Se introdujo este elemento
         */
        public function actionGetTipo(){
            header("Content-type: application/json");
            $query = " select distinct descripcion as tipo";
            $query.= " from cdi_cat_hw order by 1";
            $db = Yii::app()->db->createCommand($query)->queryAll();
            $resp = array();
            foreach($db as $pk=>$data)
                        $resp[$pk] = $data;
            echo CJSON::encode($resp);
        }
        /**
         * [actionInsertaTipo Inserta un nuevo registro de un nuevo elemento del inventario]
         * @return [JSON] [Información solicitada en formato JSON]
         * @since 1.0.1 Se introdujo este elemento
         */
        public function actionInsertaTipo(){
            $query="select max(id_hw) mi from cdi_cat_hw";
            $db = Yii::app()->db->createCommand($query)->queryAll();
            $tmp = $db[0]['mi'];
            $tId = $tmp+1;
            $nombreTipo=$_POST['tipoNuevo'];
            $nombreMarca=$_POST['marcaNueva'];
            $nombreModelo=$_POST['modeloNuevo'];
            $query=" INSERT INTO cdi_cat_hw( id_hw, Descripcion, Marca ,Modelo) VALUES ('{$tId}','{$nombreTipo}', '{$nombreMarca}', '{$nombreModelo}')";
            $newTi=Yii::app()->db->createCommand($query)->execute();
            header("Content-type: application/json");
            echo CJSON::encode(true);
        }
        /**
         * [actionUpdateHW Actualiza la información de un elemento de hardware de la base de datos]
         * @since 1.0.1 Se introdujo este elemento
         */
        public function actionUpdateHW(){
            // poner los datos anteriores a editar para aser la comparación
            $nombreTipo=$_POST['nomTipo'];
            $nombreMarca=$_POST['nomMarca'];
            $nombreModelo=$_POST['nomModelo'];
            $tipoAntes=$_POST['tipoA'];
            $marcaAntes=$_POST['marcaA'];
            $modeloAntes=$_POST['modA'];
            /*echo $nombreTipo;
            echo $nombreMarca;
            echo $nombreModelo;
            echo $tipoAntes;
            echo $marcaAntes;
            echo $modeloAntes;*/
            //UPDATE `cdi_cat_hw` SET  Descripcion='LAPtop', Marca= 'DELL09' , Modelo='inspiron NUEVO' 
            //WHERE Descripcion='laptop' AND Marca='dell' AND Modelo='Inspiron AEIOU' 
            $query="UPDATE cdi_cat_hw SET Descripcion = '{$nombreTipo}', Marca = '{$nombreMarca}',Modelo = '{$nombreModelo}' WHERE Descripcion='{$tipoAntes}' AND Marca ='{$marcaAntes}' AND Modelo = '{$modeloAntes}'";
            //echo $query;
            $upHW = Yii::app()->db->createCommand($query)->execute();      
        }
        /**
         * [actionUpdateTipo ACtualiza la información de un modelo de un elemento de la base de datos]
         * @return [JSON] [Información solicitada en formato JSON]
         * @since 1.0.1 Se introdujo este elemento
         */
        public function actionUpdateTipo(){
            header("Content-type: application/json");
            $model=$_POST['modelop'];
            echo $model;
            $query="select id_hw, Modelo FROM cdi_cat_hw WHERE Modelo = '{$model}' ";
            $db = Yii::app()->db->createCommand($query)->queryAll();
            $resp = array();
            foreach($db as $pk=>$data)
                        $resp[$pk] = $data;
            echo CJSON::encode($resp);
        
        }
} 
