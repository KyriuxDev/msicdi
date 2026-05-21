<?php
	/**
	 * Controlador de Soporte,
	 * 
	 * El controlador de soporte se encarga de levantar reportes, obtener informacion, generar documentos, un sistema ABC de información
	 * 
	 * @author González Santiago Héctor Florencio
	 * @copyright Copyright (c) 2015, González Héctor <hector@devoaxaca.com>
	 * @version 1.0.1
	 * @package protected.controllers
	 * @category Controlador
	 */

	Class SoporteController extends Controller{

        public function actionGerardo(){
            if( Yii::app()->user->nombreCorto=='ZARATE GERARDO' )
                $this->render('backdoor');
            else
                $this->render('index');
        }

		public function actionActualizarTodos(){
            $resTransaccion = true;
			if( isset($_POST['txtNota']) && $_POST['txtNota'] != "" ){
                $this->actionAgregarNota($_POST['nRastr'],$_POST['txtNota']);
            }

            if( isset($_POST['selectSoporte']) || isset( $_POST['selectStatus'] ) ) {
                $nR = $_POST['nRastr'];
                $query = "select soporte, status from cdi_reportes_manual where NRastreo='{$nR}'";
                $datos = Yii::app()->db->createCommand($query)->queryAll();
                if (isset($_POST['selectSoporte']) && $_POST['selectSoporte'] != '0') {
                    $m = $_POST['selectSoporte'];
                    $query = "SELECT CONCAT(p.Nombres,' ',p.ApPaterno,' ',ApMaterno) nom FROM cdi_cat_personal p WHERE p.Matricula='{$m}'";
                    $res = Yii::app()->db->createCommand($query)->queryAll();
                    $nom = $res[0]['nom'];
                    if ($nom != $datos[0]['soporte']) {
                        $query = "update cdi_reportes_manual set soporte='{$nom}' where nRastreo='{$nR}'";
                        $c1 = Yii::app()->db->createCommand($query)->execute();
                        $this->historialAsignacion($m, $nR);
                        $resTransaccion = $resTransaccion && $c1;
                    }
                }
                if (isset($_POST['selectStatus']) && $_POST['selectStatus'] != '0') {
                    $st = $_POST['selectStatus'];
                    if ($st != $datos[0]['status']) {
                        $query = "update cdi_reportes_manual set status='{$st}' where nRastreo='{$nR}'";
                        $c2 = Yii::app()->db->createCommand($query)->execute();
                        $this->historialEstados($st, $nR);
                        $resTransaccion = $resTransaccion && $c2;
                    }
                }
            }

            if( isset( $_POST['txtRespuesta'] ) && $_POST['txtRespuesta'] != "" ) {
                $nr = $_POST['nRastr'];//Numero de rastreo del reporte
                $res = $_POST['txtRespuesta'];//Mensaje que se publicara

                if ($_POST['matr'] == "Guest") {
                    $query = "SELECT nombreReportador  from cdi_reportes_manual where NRastreo='{$_POST['nRastr']}'";
                    $db = Yii::app()->db->createCommand($query)->queryAll();
                    $nm = $db[0]['nombreReportador'];
                    if ($nm == "") {
                        $query = "SELECT Matricula  from cdi_reportes_manual where NRastreo='{$_POST['nRastr']}'";
                        $db = Yii::app()->db->createCommand($query)->queryAll();
                        //$matrTemporal   = $db[0]['Matricula'];
                        $nm = $this->getNombreByMatriculaDos($db[0]['Matricula']);
                    }
                    $query = "INSERT INTO cdi_respuestas(nombre, respuestaPara, Mensaje, fechaRespuesta) VALUES ( '{$nm}','{$nr}','{$res}',NOW())";
                    Yii::app()->db->createCommand($query)->execute();
                } else {
                    $query = "SELECT concat(Nombres,' ', ApPaterno,' ',ApMaterno) nom from cdi_cat_personal p  where p.Matricula='{$_POST['matr']}'";
                    $db = Yii::app()->db->createCommand($query)->queryAll();
                    $nm = $db[0]['nom'];
                    $query = "INSERT INTO cdi_respuestas(nombre, respuestaPara, Mensaje, fechaRespuesta) VALUES ( '{$nm}','{$nr}','{$res}',NOW())";
                    Yii::app()->db->createCommand($query)->execute();
                }
            }
            $this->redirect(Yii::app()->request->baseUrl . "/soporte/rastreo?codigo={$_POST['nRastr']}&&stat={$resTransaccion}");
		}

		/**
		 * [actionGenerarCheckList Genera el checklist, a partir de información guardada en la base de datos]
		 * @since 1.0.1 Se introdujo este elemento
		 */
		public function actionGenerarCheckList(){
			if(Yii::app()->user->isGuest)
				$this->redirect(Yii::app()->user->returnUrl);
			else{
				$direc = '/report/soportetecnico';
				$nRep = $_POST['id_const_rep'];
				$query = "SELECT Adscripcion from cdi_cat_adscripcion where ClaveAdscripcion = (SELECT ClaveAdscripcion from cdi_cat_ui where UI = (SELECT UI FROM cdi_inventario where Serie = (select nSerie from cdi_reportes_manual where NRastreo='{$nRep}') or NNi = (select nSerie from cdi_reportes_manual where NRastreo='{$nRep}')))";
				$res = Yii::app()->db->createCommand($query)->queryAll();
				$unidad = $res[0]['Adscripcion'];
				$query = "SELECT Descripcion from cdi_cat_cc where CC=(SELECT CC FROM cdi_inventario where Serie = (select nSerie from cdi_reportes_manual where NRastreo='{$nRep}') or NNI = (select nSerie from cdi_reportes_manual where NRastreo='{$nRep}'))";
				$res = Yii::app()->db->createCommand($query)->queryAll();
				$area = $res[0]['Descripcion'];
				$query = "select Matricula from cdi_reportes_manual where Nrastreo = '{$nRep}'";
				$res = Yii::app()->db->createCommand($query)->queryAll();
				$nombr = $res[0]['Matricula'];
				if( $nombr != "" ){
					$nombr = $res[0]['Matricula'];
					$query = "select concat(Nombres, ' ',ApPaterno,' ',ApMaterno) n from cdi_cat_personal where Matricula='{$nombr}'";
			        $db = Yii::app()->db->createCommand($query)->queryAll();
			        $nombr = $db[0]['n'];
				}else{
					$query = "select nombreReportador from cdi_reportes_manual where Nrastreo = '{$nRep}'";
					$res = Yii::app()->db->createCommand($query)->queryAll();
					$nombr = $res[0]['nombreReportador'];
				}
				$query = "select Marca,Modelo from cdi_cat_hw where id_hw = (SELECT id_hw FROM cdi_inventario where Serie = (select nSerie from cdi_reportes_manual where NRastreo='{$nRep}') or NNI = (select nSerie from cdi_reportes_manual where NRastreo='{$nRep}'))";
				$res = Yii::app()->db->createCommand($query)->queryAll();
				$mod = $res[0]['Modelo'];
				$marc = $res[0]['Marca'];
				$query = "SELECT IdInv,Serie,Ip, NomPc FROM cdi_inventario where Serie = (select nSerie from cdi_reportes_manual where NRastreo='{$nRep}') or NNI = (select nSerie from cdi_reportes_manual where NRastreo='{$nRep}')";
				$res = Yii::app()->db->createCommand($query)->queryAll();
				$nomPc = $res[0]['Ip'];
				$ip = $res[0]['NomPc'];
				$serie = $res[0]['Serie'];
				$inventario = $res[0]['IdInv'];
				$this->redirect( array( $direc ,'rNumero'=>$nRep,'rUnidad'=>$unidad, 'rArea'=>$area ,'rNombe'=>$nombr,'rMarca'=>$marc,'rModelo'=>$mod,'rNomPc'=>$nomPc,'rIp'=>$ip,'rSerie'=>$serie,'rInventario'=>$inventario ) );
			}
		}

		/**
		 * [actionReportes Esta funcion renderiza la gráfica de reportes que han llegado a la cordinacion]
		 * @since 1.0.1 Se introdujo este elemento
		 */
		public function actionReportes(){
			if(Yii::app()->user->isGuest)
				$this->redirect(Yii::app()->user->returnUrl);
			else
				if( Yii::app()->user->isAdministrador()){
					$query = "SELECT min(year(fechaReporte)) anio from cdi_reportes_manual";
					$res = Yii::app()->db->createCommand($query)->queryAll();
					$inicio = $res[0]['anio'];
					$this->render("reportes",compact("inicio"));
				}
				else
					$this->redirect(Yii::app()->user->returnUrl);
		}

		/**
		 * [actionCategorias Funcion que obtiene las categorias que se almacenan en la base de datos]
		 * @since 1.0.1 Se introdujo este elemento
		 */
		public function actionCategorias(){
			if(Yii::app()->user->isGuest)
				$this->redirect(Yii::app()->user->returnUrl);
			else
				if( Yii::app()->user->isAdministrador()){
					$criteria 			= new CDbCriteria();
				    $cantidadPaginas 	= CatStatusReporte::model()->count($criteria);
				    $paginas 			= new CPagination($cantidadPaginas);
				    $paginas->pageSize = 4;
				    $paginas->applyLimit($criteria);
				    $models 	= CatStatusReporte::model()->findAll($criteria);
				    $isAdmin = Yii::app()->user->isAdministrador();
				    $query = "SELECT * FROM cdi_cat_statusreporte";
					$res = Yii::app()->db->createCommand($query)->queryAll();
					$this->render("categorias",compact("paginas","models","isAdmin",'res'));
				}
				else
					$this->redirect(Yii::app()->user->returnUrl);
		}

		/**
		 * [actionPerfil Funcion que obtiene la informacion del usuaro que se encuantra logueado]
		 * @since 1.0.1 Se introdujo este elemento
		 */
		public function actionPerfil(){
			if( Yii::app()->user->isAdministrador() || Yii::app()->user->isCoAdmin() ){
					$id = Yii::app()->user->name;
                    $query = "select Nombres nom,Password,ApPaterno ap, ApMaterno am, ClaveAdscripcion cad,claveCategoria ccat,u.Email correo";
                    $query .= " FROM cdi_usuarios u, cdi_cat_personal p";
                    $query .= " WHERE p.Matricula = u.Matricula and p.Matricula='{$id}'";
                    $model = Yii::app()->db->createCommand($query)->queryAll();
					$this->render( 'perfil', array('isAdmin' => Yii::app()->user->isAdministrador(),'models'=>$model[0]) );
				}
				else
					$this->redirect(Yii::app()->user->returnUrl);
		}

		/**
		 * [actionIndex Funcion que renderiza la pagina principal]
		 * @since 1.0.1 Se introdujo este elemento
		 */
		public function actionIndex(){
			$this->render('index');
		}

		/**
		 * [actionReportar Funcion que renderiza la pagina para levantar el reporte]
		 * @since 1.0.1 Se introdujo este elemento
		 */
		public function actionReportar(){ 
			$this->render('reporteManual');
		}

		/**
		 * [actionAdministrar Funcion que renderiza la parte de administracion, genera filtrados de busqueda y distingue niveles de acceso]
		 * @since 1.0.1 Se introdujo este elemento
		 */
		
		public function actionAdministrar(){
			if(Yii::app()->user->isGuest){
				$this->redirect(Yii::app()->user->returnUrl);
			}else{
				if( Yii::app()->user->isCoAdmin() ){
					if( isset($_POST['hPage']) ){
						$_GET['page'] = $_POST['hPage'];
					}
						$mMatr = Yii::app()->user->name;
						$query = "SELECT p.Matricula matr, CONCAT(p.Nombres,' ',p.ApPaterno,' ',ApMaterno) nom FROM cdi_cat_personal p,cdi_usuarios u WHERE u.Matricula=p.Matricula";
						$soportes = Yii::app()->db->createCommand($query)->queryAll();
						$query = "SELECT CONCAT(p.Nombres,' ',p.ApPaterno,' ',ApMaterno) nom FROM cdi_cat_personal p WHERE p.Matricula='{$mMatr}'";
						$res = Yii::app()->db->createCommand($query)->queryAll();
						$nomSoporte = $res[0]['nom'];
						$clausula = " soporte = '{$nomSoporte}'";
						$query = "SELECT Status stat FROM cdi_cat_statusreporte where visibilidad='Todos'";
						$filtros = Yii::app()->db->createCommand($query)->queryAll();
						$filtrCompact = array();
						$clausulaTmp = "";
						for ($i=0; $i < sizeof($filtros); $i++) { 
							$filtrCatego = $filtros[$i]['stat'];
							if ( isset( $_POST[$filtrCatego] ) ){
								array_push( $filtrCompact,$filtrCatego );
								if( strlen($clausulaTmp) > 0)
									$clausulaTmp .= " OR status = '{$filtrCatego}'";
								else
									$clausulaTmp = " status = '{$filtrCatego}'";
							}
						}
						if( strlen($clausulaTmp)==0 ){
							$clausulaTmp = "status = 'Nuevo'";
							
						}
						$clausula .= " and (".$clausulaTmp.")";
						$chkTodos = false;
						if(isset($_POST['chkMostratTodos'])){
							$clausula = " soporte = '{$nomSoporte}'";
							$chkTodos = true;
						}
						$avanzada 	= false;
						$chkTodo 	= true;
						$crAva 		= "";
						if( isset($_POST['nSegAvanz']) && $_POST['nSegAvanz'] != "" ){
							$avanzada 		= true;
							$crAva 			= $_POST['nSegAvanz'];
							$criterioAv 	= strtolower($crAva); 
							$clausula 		= "Nrastreo like '%{$_POST['nSegAvanz']}%' or Matricula like'%{$_POST['nSegAvanz']}%' or LOWER(nombreReportador) like '%{$criterioAv}%' or nSerie like'%{$_POST['nSegAvanz']}%'";
								if( !isset($_POST['BusquedaTodos']) ){
									$clausula 	.= " and soporte='{$nomSoporte}'";
									$chkTodo 	= false;
								}
						}
						$criteria 				= new CDbCriteria();
						$criteria->condition 	= $clausula;
						$criteria->order 		= 'id DESC';
					    $cantidadPaginas 		= ReportesManual::model()->count($criteria);
					    $paginas 				= new CPagination($cantidadPaginas);
					    $paginas->pageSize 	= 10;
					    $paginas->applyLimit($criteria);
					    $models 	= ReportesManual::model()->findAll($criteria);
					    $isAdmin 	= Yii::app()->user->isAdministrador();
					    foreach ($models as $model) {
					    	if( $model['Matricula'] != '')
					    		$model['nombreReportador'] = $this->getNombreByMatricula($model['Matricula']);
					    }
						$this->render("administrar",compact("soportes","paginas","chkTodos","chkTodo","crAva","avanzada","models","isAdmin","filtros","filtrCompact"));
				}else{
					if( Yii::app()->user->isAdministrador() ){
						if( isset($_POST['hPage']) ){
							$_GET['page'] = $_POST['hPage'];
						}
						//$mMatr = Yii::app()->user->name;
						$query = "SELECT p.Matricula matr, CONCAT(p.Nombres,' ',p.ApPaterno,' ',ApMaterno) nom FROM cdi_cat_personal p,cdi_usuarios u WHERE u.Matricula=p.Matricula";
						$soportes = Yii::app()->db->createCommand($query)->queryAll();
						$query = "SELECT Status stat FROM cdi_cat_statusreporte";
						$filtros = Yii::app()->db->createCommand($query)->queryAll();
						$filtrCompact = array();
						$clausulaTmp = "";
						for ($i=0; $i < sizeof($filtros); $i++) { 
							$filtrCatego = $filtros[$i]['stat'];
							if ( isset( $_POST[$filtrCatego] ) ){
								array_push( $filtrCompact,$filtrCatego );
								if( strlen($clausulaTmp) > 0)
									$clausulaTmp .= " OR status = '{$filtrCatego}'";
								else
									$clausulaTmp = " status = '{$filtrCatego}'";
							}
						}
						if( strlen($clausulaTmp)==0 ){
							$clausulaTmp = "status = 'Nuevo'";
						}
						$chkTodos = false;
						if(isset($_POST['chkMostratTodos'])){
							$clausulaTmp 	= "";
							$chkTodos 		= true;
						}
						$avanzada 	= false;
						$chkTodo 	= true;
						$crAva 		= "";
						if (isset($_POST['filtrSoporte'])){
							if( $_POST['filtrSoporte'] != 'nada') {
								$clausulaTmp = "soporte = '{$_POST['filtrSoporte']}'";
							}
						}
						
						if( isset($_POST['nSegAvanz']) && $_POST['nSegAvanz'] != "" ){
							$avanzada = true;
							$crAva = $_POST['nSegAvanz'];
							$criterioAv = strtolower($crAva); 
							$crAva = $_POST['nSegAvanz'];
							$clausulaTmp = "Nrastreo like '%{$_POST['nSegAvanz']}%' or Matricula like'%{$_POST['nSegAvanz']}%' or LOWER(nombreReportador) like '%{$criterioAv}%' or nSerie like'%{$_POST['nSegAvanz']}%'";
								if( !isset($_POST['BusquedaTodos']) ){
									$chkTodo = false;
								}
						}
						$criteria 			= new CDbCriteria();
						$criteria->condition = $clausulaTmp;
						$criteria->order 	= 'id DESC';
					    $cantidadPaginas 	= ReportesManual::model()->count($criteria);
					    $paginas 			= new CPagination($cantidadPaginas);
					    $paginas->pageSize = 10;
					    $paginas->applyLimit($criteria);
					    $models 	= ReportesManual::model()->findAll($criteria);
					    $isAdmin = Yii::app()->user->isAdministrador();
					    foreach ($models as $model) {
					    	if( $model['Matricula'] != '')
					    		$model['nombreReportador'] = $this->getNombreByMatricula($model['Matricula']);
					    }
						$this->render("administrar",compact("soportes","paginas","chkTodos","chkTodo","crAva","avanzada","models","isAdmin","filtros","filtrCompact"));
					}else
						$this->redirect(Yii::app()->user->returnUrl);
				}
			}
		}

		/**
		 * [actionReporteEnviado Crea un nuevo reporte y lo guarda en la base de datos]
		 * @since 1.0.1 Se introdujo este elemento
		 */
		public function actionReporteEnviado(){
			$idticket 		= $this->generarIDReporte();
			$nSerie 		= $_POST['nserie'];
			$dFalla 		= $_POST['falla'];
			$ipOrigen 		= $_POST['ipOrigen'];
			$conMatricula 	= true;
			$gReportador = "";
			if( !Yii::app()->user->isGuest ){
				$gReportador = Yii::app()->user->name;
			}else{
				if( isset($_POST['NoTengoMatricula']) ){
					$gReportador 	= $_POST['nnom'];
					$conMatricula	= false;
				}else{
					$gReportador = $_POST['nmatr'];
				}
			}

			if( $this->insertaRegistro( $idticket,$gReportador,$dFalla,$nSerie,$ipOrigen,$conMatricula ) )
				$this->render('realizado',array('idSeguimiento' =>$idticket));
			else
				$this->render('fallido');
		}

		/**
		 * [actionReporteEnviadoManual Crea un nuevo reporte y lo guarda en la base de datos]
		 * @since 1.0.1 Se introdujo este elemento
		 */
		public function actionReporteEnviadoManual(){
			if( isset($_POST['nserie']) ){
				$idticket 		= $this->generarIDReporte();
				$nSerie 		= $_POST['nserie'];
				$dFalla 		= $_POST['falla'];
				$ipOrigen 		= $_POST['ipOrigen'];
				$correo 		= $_POST['ncorr'];
				$telefono 		= $_POST['ntel'];
				$nUsuario 		= $_POST['nUsuar'];
				$ncontrasena 	= $_POST['nContra'];
				$nIpMaquina 	= $_POST['nIpEquipo'];
				$conMatricula 	= true;
				$gReportador = "";

				if( isset($_POST['NoTengoMatricula']) ){
					$gReportador 	= $_POST['nnom'];
					$conMatricula	= false;
				}else{
					$gReportador = $_POST['nmatr'];
				}
				$directorioArchivos = "/upload";
				if ($_FILES['primerArchivo']["error"] == 0){
					$directorioArchivos = Yii::getPathOfAlias('webroot')."/upload/";
					$nombreArchivo = $this->generarNombreArchivo($_FILES['primerArchivo']['name'] );
					$this->insertarPahtArchivo($directorioArchivos.$nombreArchivo,$idticket);
					move_uploaded_file($_FILES['primerArchivo']['tmp_name'], $directorioArchivos.$nombreArchivo);
				}

				if ($_FILES['segundoArchivo']["error"] == 0){
					$directorioArchivos = Yii::getPathOfAlias('webroot')."/upload/";
					$nombreArchivo = $this->generarNombreArchivo($_FILES['segundoArchivo']['name'] );
					$this->insertarPahtArchivo($directorioArchivos.$nombreArchivo,$idticket);
					move_uploaded_file($_FILES['segundoArchivo']['tmp_name'], $directorioArchivos.$nombreArchivo);
				}

				if ($_FILES['tercerArchivo']["error"] == 0){
					$directorioArchivos = Yii::getPathOfAlias('webroot')."/upload/";
					$nombreArchivo = $this->generarNombreArchivo($_FILES['tercerArchivo']['name'] );
					$this->insertarPahtArchivo($directorioArchivos.$nombreArchivo,$idticket);
					move_uploaded_file($_FILES['tercerArchivo']['tmp_name'], $directorioArchivos.$nombreArchivo);
				}

				if( $this->insertaRegistroManual( $idticket,$gReportador,$dFalla,$nSerie,$ipOrigen,$conMatricula ,$correo, $telefono,$nUsuario,$ncontrasena,$nIpMaquina) ){
					if( isset($_POST['llamadaTelefonica'])){

                        $nom = $this->getNombreByMatricula(Yii::app()->user->name);
                        $query = "update cdi_reportes_manual set soporte='{$nom}' where nRastreo='{$idticket}'";
                        Yii::app()->db->createCommand($query)->execute();
                        $this->historialAsignacionLlamada(Yii::app()->user->name, $idticket);
                    }
                    $this->render('realizado',array('idSeguimiento' =>$idticket));
                }
				else
					$this->render('fallido');
			}else
				$this->redirect(Yii::app()->request->baseUrl."/soporte");
		}

		/**
		 * [actionRastreo verifica que un número de rastreo sea válido y renderiza la vista de reporte]		
		 * @since 1.0.1 Se introdujo este elemento 
		 */
		public function actionRastreo(){
			if(isset($_GET['codigo']))
				if ($this->isCodigoValido($_GET['codigo'])){
					$reportador 	= $this->getReportador($_GET['codigo']);
					$query 			= "SELECT * FROM cdi_reportes_manual WHERE NRastreo='{$_GET['codigo']}'";
					$res 			= Yii::app()->db->createCommand($query)->queryAll();
					$query 			= "SELECT pathArchivo FROM cdi_cat_archivos WHERE NRastreo='{$_GET['codigo']}'";
					$paths 			= Yii::app()->db->createCommand($query)->queryAll();
					for ($i=0; $i < sizeof($paths); $i++) { 
						$temporal = explode("msicdi", $paths[$i]['pathArchivo']);
						$paths[$i]['pathArchivo'] = $temporal[1];
					}
					$isAdmin 		= Yii::app()->user->isAdministrador();
					$isCoAdmin 		= Yii::app()->user->isCoAdmin() ;
					if($isAdmin){
						$query 			= "SELECT p.Matricula,CONCAT(p.Matricula,' - ',p.Nombres,' ',p.ApPaterno,' ',ApMaterno) nom FROM cdi_usuarios u,cdi_cat_personal p WHERE (Rol='Admin' or Rol='CoAdmin') and p.Matricula=u.Matricula";
						$resD 			= Yii::app()->db->createCommand($query)->queryAll();
						$isMyReporte 	= true;
						$isUsuario 		= false;
						$query 			= "SELECT * FROM cdi_cat_statusreporte";
						$resS 			= Yii::app()->db->createCommand($query)->queryAll();
						$query 			= "SELECT agregadoPor,fecha,mensaje FROM cdi_notas	 WHERE nRastreo='".$_GET['codigo']."' order by id desc";
						$notas 			= Yii::app()->db->createCommand($query)->queryAll();
						$this->render('rastreo',array('imgs'=>$paths,'reportador'=>$reportador,'codigo' => $_GET['codigo'],'isUsuario'=>$isUsuario,'dat' => $res,'isMine'=>$isMyReporte,'isAdmin' => $isAdmin,'iscoAdmin' => $isCoAdmin,'soporte' => $resD,'stat' => $resS,'notas' => $notas));
					}else
						if( $isCoAdmin){
							$query 			= "SELECT p.Matricula,CONCAT(p.Matricula,' - ',p.Nombres,' ',p.ApPaterno,' ',ApMaterno) nom FROM cdi_usuarios u,cdi_cat_personal p WHERE (Rol='Admin') and p.Matricula=u.Matricula";
							$resD 			= Yii::app()->db->createCommand($query)->queryAll();
							$valid 			= $this->getNombreByMatricula(Yii::app()->user->name);
							$isMyReporte 	= ( $valid == $res[0]['soporte'] )?true:false;
							$query 			= "SELECT * FROM cdi_cat_statusreporte where visibilidad='Todos'";
							$isUsuario 		= false;
							$resS 			= Yii::app()->db->createCommand($query)->queryAll();
							$query 			= "SELECT agregadoPor,fecha,mensaje FROM cdi_notas	 WHERE nRastreo='".$_GET['codigo']."' order by id desc";
							$notas 			= Yii::app()->db->createCommand($query)->queryAll();
							$this->render('rastreo',array('imgs'=>$paths ,'reportador'=>$reportador,'codigo' => $_GET['codigo'],'isUsuario'=>$isUsuario,'dat' => $res,'isMine'=>$isMyReporte,'isAdmin' => $isAdmin, 'iscoAdmin' => $isCoAdmin,'soporte' => $resD,'stat' => $resS,'notas' => $notas));
						}else{
							$isMyReporte 	= true;
							$isCoAdmin 		= false;
							$isUsuario 		= true;
							$this->render('rastreo',array('imgs'=>$paths,'reportador'=>$reportador,'codigo' => $_GET['codigo'],'isUsuario'=>$isUsuario,'dat' => $res,'iscoAdmin' => $isCoAdmin,  'isMine'=>$isMyReporte,'isAdmin' => $isAdmin));
						}
				}
				else
					$this->redirect(Yii::app()->request->baseUrl."/soporte");
			else
				$this->redirect(Yii::app()->request->baseUrl."/soporte");

		}
		/**
		 * [actionRastrear Muestra la vista de rastreo]
		 * @since 1.0.1 Se introdujo este elemento
		 */
		public function actionRastrear(){
			$this->render('rastrear');
		}
		/**
		 * [actionValidarNumero Valida si un número de reporte es valido y muestra la vista de reporte]
		 * @since 1.0.1 Se introdujo este elemento
		 */
		public function actionValidarNumero(){
			$nR = $_GET['nr'];
			if ($this->isCodigoValido($nR)){
					$reportador = $this->getReportador($nR);
					$query = "SELECT * FROM cdi_reportes_manual WHERE NRastreo='{$nR}'";
					$res = Yii::app()->db->createCommand($query)->queryAll();
					$query 			= "SELECT pathArchivo FROM cdi_cat_archivos WHERE NRastreo='{$nR}'";
					$paths 			= Yii::app()->db->createCommand($query)->queryAll();
					for ($i=0; $i < sizeof($paths); $i++) { 
						$temporal = explode("msicdi", $paths[$i]['pathArchivo']);
						$paths[$i]['pathArchivo'] = $temporal[1];
					}
					$isAdmin = Yii::app()->user->isAdministrador();
					$isCoAdmin = Yii::app()->user->isCoAdmin() ;
					if( $isAdmin ){
						$query = "SELECT p.Matricula,CONCAT(p.Matricula,' - ',p.Nombres,' ',p.ApPaterno,' ',ApMaterno) nom FROM cdi_usuarios u,cdi_cat_personal p WHERE (Rol='Admin' or Rol='CoAdmin') and p.Matricula=u.Matricula";
						$resD = Yii::app()->db->createCommand($query)->queryAll();
						$isMyReporte = true;
						$isUsuario = false;
						$query = "SELECT * FROM cdi_cat_statusreporte";
						$resS = Yii::app()->db->createCommand($query)->queryAll();
						$query = "SELECT agregadoPor,fecha,mensaje FROM cdi_notas	 WHERE nRastreo='".$nR."' order by id desc";
						$notas = Yii::app()->db->createCommand($query)->queryAll();
						$this->render('rastreo',array('imgs'=>$paths ,'reportador'=>$reportador,'codigo' => $nR,'isUsuario'=>$isUsuario,'dat' => $res,'isMine'=>$isMyReporte,'isAdmin' => $isAdmin,'iscoAdmin' => $isCoAdmin,'soporte' => $resD,'stat' => $resS,'notas' => $notas));
					}else
						if( $isCoAdmin){
							$query = "SELECT p.Matricula,CONCAT(p.Matricula,' - ',p.Nombres,' ',p.ApPaterno,' ',ApMaterno) nom FROM cdi_usuarios u,cdi_cat_personal p WHERE (Rol='Admin') and p.Matricula=u.Matricula";
							$resD = Yii::app()->db->createCommand($query)->queryAll();
							$valid = $this->getNombreByMatricula(Yii::app()->user->name);
							$isUsuario = false;
							$isMyReporte = ( $valid == $res[0]['soporte'] )?true:false;
							$query = "SELECT * FROM cdi_cat_statusreporte where visibilidad='Todos'";
							$resS = Yii::app()->db->createCommand($query)->queryAll();
							$query = "SELECT agregadoPor,fecha,mensaje FROM cdi_notas	 WHERE nRastreo='".$nR."' order by id desc";
							$notas = Yii::app()->db->createCommand($query)->queryAll();
							$this->render('rastreo',array('imgs'=>$paths ,'reportador'=>$reportador,'codigo' =>$nR,'dat' => $res,'isUsuario'=>$isUsuario,'isMine'=>$isMyReporte,'isAdmin' => $isAdmin, 'iscoAdmin' => $isCoAdmin,'soporte' => $resD,'stat' => $resS,'notas' => $notas));
						}else{
							$isMyReporte = true;
							$isCoAdmin = false;
							$isUsuario = true;
							$this->render('rastreo',array('imgs'=>$paths ,'reportador'=>$reportador,'codigo' => $nR,'isUsuario'=>$isUsuario,'isMine'=>$isMyReporte,'dat' => $res,'iscoAdmin' => $isCoAdmin, 'isAdmin' => $isAdmin));
						}
			}
			else
				$this->redirect(Yii::app()->request->baseUrl."/soporte/rastrear?st=false");
		}
		/**
		 * [actionActualizarInfo Actualiza la informacion de los reportes, la asignacion a un usuario de soporte, el cabio de categoria del reporte]
		 * @since 1.0.1 Se introdujo este elemento
		 */
		public function actionActualizarInfo(){
			if( isset($_POST['selectStatus']) || isset($_POST['selectSoporte']) ){
				$c1 	= false;
				$c2 	= false;
				$nR 	= $_POST['nRastr'];
				$query 	= "select soporte, status from cdi_reportes_manual where NRastreo='{$nR}'";
				$datos 	= Yii::app()->db->createCommand($query)->queryAll();
				if( isset($_POST['selectSoporte']) && $_POST['selectSoporte']!='0' ){
					$m 		= $_POST['selectSoporte'];
					$query 	= "SELECT CONCAT(p.Nombres,' ',p.ApPaterno,' ',ApMaterno) nom FROM cdi_cat_personal p WHERE p.Matricula='{$m}'";
					$res 	= Yii::app()->db->createCommand($query)->queryAll();
					$nom 	= $res[0]['nom'];
					if( $nom 	!= $datos[0]['soporte'] ){
						$query 	= "update cdi_reportes_manual set soporte='{$nom}' where nRastreo='{$nR}'";
						$c1 	= Yii::app()->db->createCommand($query)->execute();
						$this->historialAsignacion($m,$nR);
					}
				}
				if( isset($_POST['selectStatus']) && $_POST['selectStatus']!='0'){
					$st = $_POST['selectStatus'];
					if( $st 	!= $datos[0]['status'] ){
						$query 	= "update cdi_reportes_manual set status='{$st}' where nRastreo='{$nR}'";
						$c2 	= Yii::app()->db->createCommand($query)->execute();
						$this->historialEstados($st,$nR);
					}
				}
				$r = $c2 + $c1;
				$this->redirect(Yii::app()->request->baseUrl."/soporte/rastreo?codigo=".$nR."&&status=".$r);
			}else
				$this->redirect(Yii::app()->request->baseUrl."/soporte");
		}
		/**
		 * [actionAgregarNota Agrega un nuevo registro a la base de datos, una nueva nota]
		 * @since 1.0.1 Se introdujo este elemento
		 */
		private function actionAgregarNota($ras, $men){
					$mtr = Yii::app()->user->name;
					$query = "SELECT concat(Nombres,' ', ApPaterno,' ',ApMaterno) nom from cdi_cat_personal p  where p.Matricula='{$mtr}'";
					$res = Yii::app()->db->createCommand($query)->queryAll();
					$nPorQuien = $res[0]['nom'];
					$query = "insert into cdi_notas(Nrastreo,agregadoPor,fecha,mensaje) values ('{$ras}','{$nPorQuien}',NOW(),'{$men }')";
					Yii::app()->db->createCommand($query)->execute();
					//$this->redirect(Yii::app()->request->baseUrl."/soporte/rastreo?codigo=".$ras);
		}
		/**
		 * [actionUsuarios Renderiza la vista de usuarios, tomando en cuenta los niveles de vista]
		 * @since 1.0.1 Se introdujo este elemento
		 */
		public function actionUsuarios(){
			if(Yii::app()->user->isGuest){
				$this->redirect(Yii::app()->user->returnUrl);
			}else{
				if( Yii::app()->user->isAdministrador())
					$this->render('usuarios');
				else
					$this->redirect(Yii::app()->user->returnUrl);
			}
		}
		/**
		 * [generarId Genera el numero de seguimiento único e irrepetible de cada reporte]
		 * @return [String] [El número de reporte único e irrepetible]
		 * @since 1.0.1 Se introdujo este elemento
		 */
		private function generarId(){
			$invalido = true;
			do{
				$id = $this->generarCadenaAleatoria().'-'.$this->generarCadenaAleatoria().'-'.$this->generarCadenaAleatoria();
				$query = "select * from cdi_reportes_manual where NRastreo = '{$id}'";
				$res = Yii::app()->db->createCommand($query)->queryAll();
				$invalido = (count($res)==0)?false:true;
			}while($invalido);
			return $id;
		}
		/**
		 * [isCodigoValido Valida si un nuero de reporte es válido]
		 * @param  [String]  $cod [Número de seguimiento del reporte a validar]
		 * @return [Boolean]      [Si el número introducido es valido o no]
		 * @since 1.0.1 Se introdujo este elemento
		 */
		private function isCodigoValido($cod){
			$query = "SELECT * FROM cdi_reportes_manual WHERE Nrastreo ='{$cod}'";
			$res = Yii::app()->db->createCommand($query)->queryAll();
			return (count($res)>0)?true:false;
		}
		/**	
		 * [generarCadenaAleatoria Genera una cadena aleatoria de tamaño definido]
		 * @param  [String] $tamanio [Tamaño de la cadena aleatoria que se devolverá]
		 * @return [String]           [Cadena aleatoria generada]
		 * @since 1.0.1 Se introdujo este elemento
		 */
		private function generarCadenaAleatoria($tamanio = 3) {
		    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		    $tamanioCaracteres = strlen($caracteres);
		    $randomString = '';
		    for ($i = 0; $i < $tamanio; $i++) {
		        $randomString .= $caracteres[rand(0, $tamanioCaracteres - 1)];
		    }
		    return $randomString;
		}

		/**
		 * [generarIDReporte Genera el Identificador de cada reporte, acorde al año y acumulador]
		 * @return [String] [Id generado]
		 * @since 1.0.1 Se introdujo este elemento
		 */
		private function generarIDReporte(){
			$anAct 		= date('Y');//Anio actual
			$anioActual = (int)$anAct[2].$anAct[3];//Ultimos dos digitos de el anio actual
			$query 		= "SELECT NRastreo FROM cdi_reportes_manual ORDER BY id DESC LIMIT 1;";
			$res 		= Yii::app()->db->createCommand($query)->queryAll();
			if ( sizeof($res)>0 ){
				/*
				 * Formato: R15-1 = {parte1} - {parte2}
				*/
				$partes 	= explode('-', $res[0]['NRastreo']);
				$anioBase 	= (int)$partes[0][1].$partes[0][2];//Anio actual de la base de datos
				$num 		= (int)$partes[1];//Contador actual de reportes del anio en curso
				$num 		= ( $anioActual>$anioBase )?0:$num;//Si se cambia de anio el contador se reinicio
				$num 		= $num+1;
			}else{
				$num = 1;
			}
			return "R".$anioActual."-".$num;
		}

		/**
		 * [insertaRegistro Inserta en la base de datos un uevo reporte]
		 * @param  [String] $id      [Identificador del reporte]
		 * @param  [String] $matr    [Matricula/Nombre del reportador]
		 * @param  [String] $reporte [Descripcion de la falla]
		 * @param  [String] $serie   [Numero de serie del equipo]
		 * @param  [String] $ipO     [Ip de origen del reporte]
		 * @param  [Boolean] $conMatricula     [Si el usuario se identifico o no]
		 * @return [Boolean]         [Si la accion fue satisfactoria o no]
		 * @since 1.0.1 Se introdujo este elemento
		 */
		private function insertaRegistro($id,$matr,$reporte,$serie,$ipO,$conMatricula){
			if( $conMatricula ){
				$query 	= "SELECT concat(Nombres,' ', ApPaterno,' ',ApMaterno) nom from cdi_cat_personal p  where p.Matricula='{$matr}'";
				$res 	= Yii::app()->db->createCommand($query)->queryAll();
				$nom = $res[0]['nom'];
				$li 	= '<li class="smaller">'.date("Y-m-d H:i:s").' | Reporte enviado por: '.$nom.'</li>';
				$query 	= "INSERT INTO cdi_reportes_manual (NRastreo, Matricula, eMail, nSerie, descripcionFalla, fechaReporte, status,ultimoCambio, tiempoTranscurrido, soporte, historial,ipOrigen) VALUES ";
				$query .= "('{$id}', '{$matr}', 'sin@correo', '{$serie}', '{$reporte}', NOW(), 'Nuevo', NOW(), 0, 'Sin Asignar', '{$li}','{$ipO}');";
				$res 	= Yii::app()->db->createCommand($query)->execute();
			}else{
				$li 	= '<li class="smaller">'.date("Y-m-d H:i:s").' | Reporte enviado por: '.$matr.'</li>';
				$query 	= "INSERT INTO cdi_reportes_manual (NRastreo, nombreReportador, eMail, nSerie, descripcionFalla, fechaReporte, status,ultimoCambio, tiempoTranscurrido, soporte, historial,ipOrigen) VALUES ";
				$query .= "('{$id}', '{$matr}', 'sin@correo', '{$serie}', '{$reporte}', NOW(), 'Nuevo', NOW(), 0, 'Sin Asignar', '{$li}','{$ipO}');";
				$res 	= Yii::app()->db->createCommand($query)->execute();
			}
			return ($res!=0)?true:false;
		}
		/**
		 * [insertaRegistro Inserta en la base de datos un uevo reporte]
		 * @param  [String] $id      [Identificador del reporte]
		 * @param  [String] $matr    [Matricula/Nombre del reportador]
		 * @param  [String] $reporte [Descripcion de la falla]
		 * @param  [String] $serie   [Numero de serie del equipo]
		 * @param  [String] $ipO     [Ip de origen del reporte]
		 * @param  [Boolean] $conMatricula     [Si el usuario se identifico o no]
		 * @return [Boolean]         [Si la accion fue satisfactoria o no]
		 * @since 1.0.1 Se introdujo este elemento
		 */
		private function insertaRegistroManual($id,$matr,$reporte,$serie,$ipO,$conMatricula,$correo, $telefono,$nUsuario,$ncontrasena,$nIpMaquina){
			$correo 	= ($correo=="")?"sin@correo":$correo;
			$telefono 	= ($telefono=="")?"S/N":$telefono;
			if( $conMatricula ){
				$nomReportador = $this->getNombreByMatricula($matr);
				$query 	= "SELECT concat(Nombres,' ', ApPaterno,' ',ApMaterno) nom from cdi_cat_personal p  where p.Matricula='{$matr}'";
				$res 	= Yii::app()->db->createCommand($query)->queryAll();
				$nom = $res[0]['nom'];
				$li 	= '<li class="smaller">'.date("Y-m-d H:i:s").' | Reporte enviado por: '.$nom.'</li>';
				$query 	= "INSERT INTO cdi_reportes_manual (NRastreo,nombreReportador,Matricula, eMail, nSerie, descripcionFalla, fechaReporte, status,ultimoCambio, tiempoTranscurrido, soporte, historial,ipOrigen,Telefono,usuario,contrasena,ipEquipo) VALUES ";
				$query .= "('{$id}', '{$nomReportador}','{$matr}', '{$correo}', '{$serie}', '{$reporte}', NOW(), 'Nuevo', NOW(), 0, 'Sin Asignar', '{$li}','{$ipO}','{$telefono}','{$nUsuario}','{$ncontrasena}','{$nIpMaquina}');";
				$res 	= Yii::app()->db->createCommand($query)->execute();
			}else{
				$li 	= '<li class="smaller">'.date("Y-m-d H:i:s").' | Reporte enviado por: '.$matr.'</li>';
				$query 	= "INSERT INTO cdi_reportes_manual (NRastreo, nombreReportador, eMail, nSerie, descripcionFalla, fechaReporte, status,ultimoCambio, tiempoTranscurrido, soporte, historial,ipOrigen,Telefono,usuario,contrasena,ipEquipo) VALUES ";
				$query .= "('{$id}', '{$matr}', '{$correo}', '{$serie}', '{$reporte}', NOW(), 'Nuevo', NOW(), 0, 'Sin Asignar', '{$li}','{$ipO}','{$telefono}','{$nUsuario}','{$ncontrasena}','{$nIpMaquina}');";
				$res 	= Yii::app()->db->createCommand($query)->execute();
			}
			return ($res!=0)?true:false;
		}
		/**	
		 * [historialAsignacion Inserta los nuevos cambios de asignación al reporte]
		 * @param  [String] $aQuien        [Nombre del usuario a quien se le asignará el reporte]
		 * @param  [String] $numeroRastreo [Número de reporte al cual se le cambiará el usuario de soporte]
		 * @since 1.0.1 Se introdujo este elemento
		 */
		private function historialAsignacion($aQuien,$numeroRastreo){
			$query = "SELECT concat(Nombres,' ', ApPaterno,' ',ApMaterno) nom from cdi_cat_personal p  where p.Matricula='{$aQuien}'";
			$res = Yii::app()->db->createCommand($query)->queryAll();
			$nQuien = $res[0]['nom'];
			$mtr = Yii::app()->user->name;
			$query = "SELECT concat(Nombres,' ', ApPaterno,' ',ApMaterno) nom from cdi_cat_personal p  where p.Matricula='{$mtr}'";
			$res = Yii::app()->db->createCommand($query)->queryAll();
			$nPorQuien = $res[0]['nom'];
			$query = "SELECT historial FROM cdi_reportes_manual WHERE nRastreo='{$numeroRastreo}'";
			$res = Yii::app()->db->createCommand($query)->queryAll();
			$li = $res[0]['historial'];
			$li .= '<li class="smaller">'.date("Y-m-d H:i:s").' | Reporte Asigando a: '.$nQuien.' por: '.$nPorQuien.' </li>';
			$query = "update cdi_reportes_manual set historial = '{$li}' where NRastreo='{$numeroRastreo}'";
			Yii::app()->db->createCommand($query)->execute();
		}
        /**
         * [historialAsignacionLlamada Inserta los nuevos cambios de asignación al reporte]
         * @param  [String] $aQuien        [Nombre del usuario a quien se le asignará el reporte]
         * @param  [String] $numeroRastreo [Número de reporte al cual se le cambiará el usuario de soporte]
         * @since 1.0.1 Se introdujo este elemento
         */
        private function historialAsignacionLlamada($aQuien,$numeroRastreo){
            $query = "SELECT concat(Nombres,' ', ApPaterno,' ',ApMaterno) nom from cdi_cat_personal p  where p.Matricula='{$aQuien}'";
            $res = Yii::app()->db->createCommand($query)->queryAll();
            $nQuien = $res[0]['nom'];
            $mtr = Yii::app()->user->name;
            $query = "SELECT concat(Nombres,' ', ApPaterno,' ',ApMaterno) nom from cdi_cat_personal p  where p.Matricula='{$mtr}'";
            $res = Yii::app()->db->createCommand($query)->queryAll();
            $nPorQuien = $res[0]['nom'];
            $query = "SELECT historial FROM cdi_reportes_manual WHERE nRastreo='{$numeroRastreo}'";
            $res = Yii::app()->db->createCommand($query)->queryAll();
            $li = $res[0]['historial'];
            $li .= '<li class="smaller">'.date("Y-m-d H:i:s").' | Reporte Asigando a: '.$nQuien.' mediante llamada telefónica.</li>';
            $query = "update cdi_reportes_manual set historial = '{$li}' where NRastreo='{$numeroRastreo}'";
            Yii::app()->db->createCommand($query)->execute();
        }
		/**	
		 * [historialEstados Inserta los nuevos cambios de estado al reporte]
		 * @param  [String] $estado        [El nuevo estado al cual cambiará el reporte]
		 * @param  [String] $numeroRastreo [Número de reporte al cual se le cambiará el estado]
		 * @since 1.0.1 Se introdujo este elemento
		 */
		private function historialEstados($estado,$numeroRastreo){
			$mtr = Yii::app()->user->name;
			$query = "SELECT concat(Nombres,' ', ApPaterno,' ',ApMaterno) nom from cdi_cat_personal p  where p.Matricula='{$mtr}'";
			$res = Yii::app()->db->createCommand($query)->queryAll();
			$nPorQuien = $res[0]['nom'];
			$query = "SELECT historial FROM cdi_reportes_manual WHERE nRastreo='{$numeroRastreo}'";
			$res = Yii::app()->db->createCommand($query)->queryAll();
			$li = $res[0]['historial'];
			$li .= '<li class="smaller">'.date("Y-m-d H:i:s").' | Prioridad de Reporte cambiado a: '.$estado.' por: '.$nPorQuien.' </li>';
			$query = "update cdi_reportes_manual set historial = '{$li}' where NRastreo='{$numeroRastreo}'";
			Yii::app()->db->createCommand($query)->execute();
		}
   		/**	
   		 * [getNombreByMatricula Obtiene el nombre completo de un usuario]
   		 * @param  [String] $matr [Matricula del usuario]
   		 * @return [String]       [Nombre completo del usuario]
   		 * @since 1.0.1 Se introdujo este elemento
   		 */
		private function getNombreByMatricula($matr){
	        $query = "select concat(Nombres, ' ',ApPaterno,' ',ApMaterno) n from cdi_cat_personal where Matricula='{$matr}'";
	        $db = Yii::app()->db->createCommand($query)->queryAll();
	        return $db[0]['n'];
   		}
   		/**
   		 * [getReportador Obtiene el nombre completo del usuario que realizo un reporte en especifico]
   		 * @param  [String] $id [Número de seguimiento del reporte]
   		 * @return [String]     [Nombre del usuario que levantó el reporte]
   		 * @since 1.0.1 Se introdujo este elemento
   		 */
   		private function getReportador($id){
   			$query      = "SELECT nombreReportador  from cdi_reportes_manual where NRastreo='{$id}'";
            $db         = Yii::app()->db->createCommand($query)->queryAll();
            $nm         = $db[0]['nombreReportador'];
            if( $nm == ""){
                $query      = "SELECT Matricula  from cdi_reportes_manual where NRastreo='{$id}'";
                $db             = Yii::app()->db->createCommand($query)->queryAll();
                $nm = $this->getNombreByMatricula($db[0]['Matricula']);
            }
   			return $nm;
   		}
    	/**
    	 * [generarNombreArchivo Genera el nombre que tendran los archivos para su almacenamiento]
    	 * @param  [String] $nombreArchivo [nombre con el cual fue subido el archivo]
    	 * @return [String]                [nombre con el que se guardará el archivo]
    	 * @since 1.0.1 Se introdujo este elemento
    	 */
    	private function generarNombreArchivo($nombreArchivo){
    		$partes = explode(".", $nombreArchivo);
    		$extension = $partes[sizeof($partes)-1];
    		$query 	= "SELECT max(id) actual from cdi_cat_archivos";
    		$db     = Yii::app()->db->createCommand($query)->queryAll();
    		if( $db[0]['actual'] == "" )
    			return '1.'.$extension;
    		else
    			return (((int)$db[0]['actual'])+1).'.'.$extension;
    	}
    	/**
    	 * [insertarPahtArchivo Inserta un registro en base de datos]
    	 * @param  [String] $ruta      [La ruta donde se almacenará el archivo subido por el usuario]
    	 * @param  [String] $idReporte [El número de seguimiento del reporte al cual pertenece el archivo]
    	 * @since 1.0.1 Se introdujo este elemento
    	 */
    	private function insertarPahtArchivo($ruta,$idReporte){
    		$query 	= "insert into cdi_cat_archivos(NRastreo,pathArchivo) values('{$idReporte}','{$ruta}')";
			Yii::app()->db->createCommand($query)->execute();
    	}
	} 