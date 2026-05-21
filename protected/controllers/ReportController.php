<?php
	/**
	 * Controlador de Reporte,
	 * 
	 * El controlador de Reporte se encarga de mostrar y generar los reportes y checklist de inventario
	 * 
	 * @author González Santiago Héctor Florencio
	 * @copyright Copyright (c) 2015, González Héctor <hector@devoaxaca.com>
	 * @version 1.0.1
	 * @package protected.controllers
	 * @category Controlador
	 */

	Class ReportController extends Controller{

        public function actionReporte(){
            header('Content-Type: text/html; charset=UTF-8');
            extract($_REQUEST);
            //$idTicket = 'r15-3';
            $query = "select * from cdi_reportes_manual where NRastreo = '{$idTicket}'";
            $res = Yii::app()->db->createCommand($query)->queryAll();
            if( $res[0]['Matricula'] != '' ){
                $query = "select Adscripcion ads from cdi_cat_adscripcion a, cdi_cat_personal p where p.ClaveAdscripcion= a.ClaveAdscripcion and p.Matricula='{$res[0]['Matricula']}'";
                $res1 = Yii::app()->db->createCommand($query)->queryAll();
                $query = "select Categoria cat from cdi_cat_categoria a, cdi_cat_personal p where p.ClaveCategoria= a.ClaveCategoria and p.Matricula='{$res[0]['Matricula']}'";
				$res2 = Yii::app()->db->createCommand($query)->queryAll();
				$query = "SELECT Mensaje FROM cdi_imss.cdi_respuestas where respuestaPara = '{$idTicket}'";
				$res3=Yii::app()->db->createCommand($query)->queryAll();
            }
			$fallas = $this->procesaCadena($res[0]['descripcionFalla']);
			$msg = $this->procesaCadena( !empty($res3) ? $res3[0]['Mensaje'] : '' );

            $mPDF1 =  Yii::app()->ePdf->mpdf('utf-8', 'Letter');
            $mPDF1->allow_charset_conversion=true;
            $mPDF1->ignore_invalid_utf8 = true;
            $mPDF1->WriteHTML("");
            //$mPDF1->Image(Yii::app()->request->baseUrl.'/images/mexicogobierno.png',15,5,0,0,'png','',true, false);
            $mPDF1->Image(Yii::app()->request->baseUrl.'/images/logobn.png',180,5,0,0,'png','',true, false);
            $mPDF1->SetFont('Arial','B',10);
            $mPDF1->WriteCell(180,-25,'INSTITUTO MEXICANO DEL SEGURO SOCIAL',5,1,'C');
            $mPDF1->SetFont('Arial','B',8);
            $mPDF1->WriteCell(180,34,'DELEGACION ESTATAL OAXACA',5,1,'C');
            $mPDF1->WriteCell(180,-27,'Coordinación Delegacional de Informática',5,1,'C');
            $mPDF1->WriteCell(180,35,'Oficina de Soporte Técnico y Atención a Usuarios',5,1,'C');
            $mPDF1->WriteCell(180,-10,'',5,1,'C');
            $html = '<table style="width: 100%; background-color: lightslategray;"><tr><td align="center"><strong><font color="white">SOLICITUD DE SERVICIOS DE TECNOLOGÍAS DE INFORMACIÓN</font></strong></td></tr></table>';
            $mPDF1->WriteHTML($html);
			/*$mPDF1->WriteCell(0,15,'Fecha de solicitud:',5,1,'L');
			$mPDF1->WriteCell(130,15,$res[0]['fechaReporte'],5,1,'C');
			$mPDF1->Line(54,45,135,45);*/
			$mPDF1->SetFont('Arial','B',10);
			$mPDF1->WriteText(15,40,'Fecha de solicitud:');
			$mPDF1->WriteText(110,40,'Folio:');
			$mPDF1->WriteText(15,45,'Numero de serie:');
			$mPDF1->WriteText(15,50,'Atendido por:');
			$mPDF1->WriteText(110,50,'Fecha de atencion:');
			
			$mPDF1->SetFont('Arial','R',10);
			$mPDF1->WriteText(50,40,$res[0]['fechaReporte']);
			$mPDF1->WriteText(145,40,$res[0]['NRastreo']);
			$mPDF1->WriteText(50,45,$res[0]['nSerie']);
			$mPDF1->WriteText(50,50,$res[0]['soporte']);
			$mPDF1->WriteText(145,50,$res[0]['ultimoCambio']);

			//$mPDF1->Line(54,45,135,45);
            /*$mPDF1->WriteCell(260,-15,'Folio:',5,1,'C');
            $mPDF1->WriteCell(305,-15,$res[0]['NRastreo'],5,1,'C');
			$mPDF1->Line(153,45,200,45);*/
			
			//$mPDF1->WriteText(150,45,$res[0]['NRastreo']);
			//$mPDF1->Line(153,45,200,45);
			
            //$mPDF1->WriteCell(0,35,'Numero de serie del equipo:',5,1,'L');
            //$mPDF1->Line(72,55,200,55);
            //$mPDF1->WriteCell(170,-35,$res[0]['nSerie'],5,1,'C');
            $mPDF1->WriteCell(0,20,'',5,1);
            $html = '<table style="width: 100%; background-color: lightslategray;"><tr><td align="center"><strong><font color="white">DATOS DEL USUARIO</font></strong></td></tr></table>';
			$mPDF1->WriteHTML($html);

			$mPDF1->SetFont('Arial','B',10);
			$mPDF1->WriteText(15,65,'Unidad que solicita:');
			$mPDF1->WriteText(15,70,'Telefono:');
			$mPDF1->WriteText(15,75,'Departamento u Oficina:');
			$mPDF1->WriteText(15,80,'Matricula y nombre del usuario:');

			$mPDF1->SetFont('Arial','R',10);
			$mPDF1->WriteText(80,65,(sizeof($res1)>0)?$res1[0]['ads']:'');
			$mPDF1->WriteText(80,70,$res[0]['Telefono']);
			$mPDF1->WriteText(80,75,(sizeof($res2)>0)?$res2[0]['cat']:'');
			$mPDF1->WriteText(80,80,$res[0]['Matricula'].' - '.$res[0]['nombreReportador']);

			
			/*$mPDF1->WriteCell(305,15,'Unidad que solicita:',5,1,'L');
            $mPDF1->WriteCell(250,-15,(sizeof($res1)>0)?$res1[0]['ads']:'',5,1,'C');
            $mPDF1->Line(92,77,200,77);
            $mPDF1->WriteCell(305,33,'Telefono:',5,1,'L');
            $mPDF1->Line(92,86,200,86);
			$mPDF1->WriteCell(190,-34,$res[0]['Telefono'],5,1,'C');
			$mPDF1->WriteText(92,84,$res[0]['Telefono']);
            $mPDF1->WriteCell(305,53,'Departamento u Oficina:',5,1,'L');
            $mPDF1->WriteCell(250,-53,(sizeof($res2)>0)?$res2[0]['cat']:'',5,1,'C');
            $mPDF1->Line(92,96,200,96);
            $mPDF1->WriteCell(335,73,'Matricula y nombre del usuario:',5,1,'L');
            $mPDF1->WriteCell(250,-73,$res[0]['Matricula'].' - '.$res[0]['nombreReportador'],5,1,'C');
            $mPDF1->Line(92,106,200,106);
            $mPDF1->WriteCell(335,93,'Numero de red VPN / Tel del usuario:',5,1,'L');
            $mPDF1->WriteCell(180,-93,'_',5,1,'C');
            $mPDF1->Line(92,116,200,116);*/
            $mPDF1->WriteCell(0,25,'',5,1);
            $html = '<table style="width: 100%; background-color: lightslategray;"><tr><td align="center"><strong><font color="white">DATOS DEL EQUIPO REPORTADO</font></strong></td></tr></table>';
			$mPDF1->WriteHTML($html);

			$mPDF1->SetFont('Arial','B',10);
			$mPDF1->WriteText(15,100,'Usuario de Windows:');
			$mPDF1->WriteText(15,105,'Cuenta de correo:');
			$mPDF1->WriteText(15,110,'Direccion IP:');

			$mPDF1->SetFont('Arial','R',10);
			$mPDF1->WriteText(80,100,$res[0]['usuario']);
			$mPDF1->WriteText(80,105,$res[0]['eMail']);
			$mPDF1->WriteText(80,110,$res[0]['ipEquipo']);
			
            /*$mPDF1->WriteCell(335,15,'Usuario de Windows:',5,1,'L');
            $mPDF1->WriteCell(120,-15,$res[0]['usuario'],5,1,'C');
            $mPDF1->WriteCell(240,15,'Contrasena:',5,1,'C');
            $mPDF1->WriteCell(290,-15,$res[0]['contrasena'],5,1,'C');
            $mPDF1->Line(58,138,120,138);
            $mPDF1->Line(150,138,200,138);
            $mPDF1->WriteCell(335,30,'Cuenta de correo:',5,1,'L');
            $mPDF1->WriteCell(130,-30,$res[0]['eMail'],5,1,'C');
            $mPDF1->WriteCell(240,30,'Contrasena:',5,1,'C');
            $mPDF1->WriteCell(290,-30,'',5,1,'C');
            $mPDF1->Line(58,145,120,145);
            $mPDF1->Line(150,145,200,145);
            $mPDF1->WriteCell(335,45,'Direccion IP:',5,1,'L');
            $mPDF1->WriteCell(115,-45,$res[0]['ipEquipo'],5,1,'C');
            $mPDF1->Line(58,153,120,153);*/
            $mPDF1->WriteCell(0,25,'',5,1);
			$html = '<table style="width: 100%; background-color: lightslategray;"><tr><td align="center"><strong><font color="white">DESCRIPCIÓN DE LA FALLA</font></strong></td>
			</tr></table>
			<table style="width: 100%; border: 1px solid black"><tr><td height="70px;"></td></tr>
			</table>';
			$mPDF1->WriteHTML($html);

			$mPDF1->SetFont('Arial','R',10);
			$mPDF1->WriteText(20,130,$fallas[0]);
			$mPDF1->WriteText(20,135,$fallas[1]);
			$mPDF1->WriteText(20,140,$fallas[2]);

            //$mPDF1->WriteCell(0,-30,"  ".$fallas[0],5,1,'L');
            //$mPDF1->WriteCell(0,40,"  ".$fallas[1],5,1,'L');
            //$mPDF1->WriteCell(0,-30,"  ".$fallas[2],5,1,'L');
            //$mPDF1->WriteCell(0,25,'',1,1);
            $html = '<table style="width: 100%; background-color: lightslategray;"><tr><td align="center"><strong><font color="white">ACCIONES REALIZADAS</font></strong></td></tr></table>
			<table style="width: 100%; border: 1px solid black"><tr><td height="70px;"></td></tr>
			</table>';
			$mPDF1->WriteHTML($html);
			
			$mPDF1->SetFont('Arial','R',10);
			$mPDF1->WriteText(20,155,$msg[0]);
			$mPDF1->WriteText(20,160,$msg[1]);
			$mPDF1->WriteText(20,165,$msg[2]);

            //$mPDF1->WriteCell(00,-30,'Atendido por: '. $res[0]['soporte'].'  fecha: '.$res[0]['ultimoCambio'],5,1,'L');
            //$mPDF1->WriteCell(00,40,'',5,1,'L');
            //$mPDF1->WriteCell(00,-30,'',5,1,'L');

            /*$mPDF1->WriteCell(260,47,'Fecha:',5,1,'C');
            $mPDF1->WriteCell(315,-47,'17/Noviembre/2015:',5,1,'C');*/
            //$mPDF1->Line(45,218,135,218);
            //$mPDF1->Line(153,218,200,218);
            //$mPDF1->WriteCell(20,22,'',5,1,'C');
           /*$html = '<table style="width: 100%; background-color: lightslategray;"><tr><td align="center"><strong><font color="white">DISPOSITIVOS QUE TRAE EL EQUIPO</font></strong></td></tr></table>
                    <table style="width: 100%; border: 1px solid black"><tr><td height="70px;">
                    <table style="width: 100%">
                    <tr>
                        <td><input type="checkbox" name="cpu" value="cpu">CPU</td>
                        <td><input type="checkbox" name="eliminador" value="eliminador">ELIMINADOR</td>
                        <td><input type="checkbox" name="cables" value="cables">CABLES A.C.</td>
                        <td><input type="checkbox" name="cabley" value="cabley">CABLE "Y"</td>
                        <td><input type="checkbox" name="teclado" value="teclado">TECLADO</td>
                        <td><input type="checkbox" name="raton" value="raton">RATON</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="usb" value="usb">USB</td>
                        <td><input type="checkbox" name="hd" value="hd">H.D. EXTERNO</td>
                        <td><input type="checkbox" name="moni" value="moni">MONITOR</td>
                        <td><input type="checkbox" name="discos" value="discos">DISCOS</td>
                        <td><input type="checkbox" name="raton" value="raton">RATON</td>
                        <td></td>
                    </tr>
                    </table>
                    </td></tr></table>';
            $mPDF1->WriteHTML($html);*/
            $mPDF1->SetFont('Arial','B',8);
            $mPDF1->WriteCell(10,5,'Notas Importantes: Politica 9 Apartado 12 del MAAGTIC-SI',5,1,'L');
            $mPDF1->SetFont('Arial','B',6.5);
            $mPDF1->WriteCell(10,3,'** Los usuarios de los equipos de computo SON LOS UNICOS RESPONSABLES DE LA INFORMACION CONTENIDA EN LOS DISCOS DUROS y demas medios de',5,1,'L');
            $mPDF1->WriteCell(10,3,'almacenamiento con los que cuente su equipo y por lo tanto ES SU RESPONSABILIDAD EL RESPALDARLA PERIODICAMENTE Y RECUPERARLA EN CASO DE',5,1,'L');
            $mPDF1->WriteCell(10,3,'ALGUNA EVENTUALIDAD',5,1,'L');
            $mPDF1->WriteCell(10,3,'** Los usuarios deben utilizar los equipos de computo, perifericos y el software que tengan instalado, solo para el desarrollo de las actividades institucionales',5,1,'L');
            $mPDF1->WriteCell(10,3,'que le fueron conferidas, relacionadas con el desarrollo de su empleo, cargo o comision y de acuerdo a los estipulado en esta norma.',5,1,'L');
            $mPDF1->WriteCell(10,3,'** Los usuarios seran los responsables de la proteccion fisica de los equipos de computo y perifericos que tengan bajo su resguardo, no debiendo causar daños.',5,1,'L');
            $mPDF1->OutPut('Reporte.pdf','I');
            //$this->render("reporte");
        }
		
		private function procesaCadena($cadena){
            $cadenas = array();
            $cadena = substr($cadena,0,350);

            if(strlen($cadena)>0 && strlen($cadena)<=100){
                $cadenas[0] = $cadena;
                $cadenas[1] = "";
                $cadenas[2] = "";

            }
            if(strlen($cadena)>100 && strlen($cadena)<=200){
                $cadenas[0] = substr($cadena,0,100);
                $cadenas[1] = substr($cadena,100,200);
                $cadenas[2] = "";
            }
            if(strlen($cadena)>200 && strlen($cadena)<=350){
                $cadenas[0] = substr($cadena,0,110);
                $cadenas[1] = substr($cadena,110,110);
				$cadenas[2] = substr($cadena,220,350);
            }

            return $cadenas;
        }
		/**
		 * [actionInicio Muestra la pagina de inicio de reportes, tomando en cuenta los niveles de acceso]
		 * @since 1.0.1 Se introdujo este elemento
		 */
		public function actionInicio(){
			if(Yii::app()->user->isGuest){
				$this->redirect(Yii::app()->user->returnUrl);
			}else{
				$this->render('homeReport');				
			}
		}
		/**	
		 * [actionConstancia Genera la constancia de salida, tomando en cuenta niveles de acceso e información guardada en la base de datos]
		 * @since 1.0.1 Se introdujo este elemento
		 */
		public function actionConstancia(){
			if(Yii::app()->user->isGuest){
				$this->redirect(Yii::app()->user->returnUrl);
			}else{
					$mPDF1 = Yii::app()->ePdf->mpdf();
					$mPDF1->WriteHTML("");
					$mPDF1->Image(Yii::app()->request->baseUrl.'/images/logo_imss_0.png',15,0,0,0,'png','',true, false); //-100 = tamano de la imagen
					$mPDF1->SetFont('Arial','B',18);
					$mPDF1->WriteCell(180,5,'Instituto Mexicano del Seguro Social',0,1,'C');
					$mPDF1->SetFont('Arial','',10);
					$mPDF1->WriteCell(35,5,'',0,0,'C');
					$mPDF1->WriteCell(120,5,utf8_decode('CONSTANCIA DE AUTORIZACION'),0,0,'C');
					$mPDF1->WriteCell(35,5,'',0,1,'C');
					$mPDF1->WriteCell(35,5,'',0,0,'C');
					$mPDF1->WriteCell(120,5,'PARA LA SALIDA DE BIENES',0,0,'C');
					$mPDF1->WriteCell(35,5,'',0,1,'C');
					$mPDF1->Line(15,32,200,32);  // linea principal
					$mPDF1->SetFont('Arial','',10);
					$mPDF1->WriteCell(180,10,'C. RESPONSABLE DEL SERVICIO DE VIGILANCIA',0,1,'L');
					$mPDF1->Line(23,47,90,47);//linea del responsable
					$mPDF1->Line(125,47,200,47);//linea de lugar donde trabaja
					$mPDF1->Line(33,53,130,53); //ADSCTIPCION
					$mPDF1->Line(165,53,200,53); //matricula
					$mPDF1->Line(40,59,135,59); //identificacion
					$mPDF1->Line(160,59,200,59); //telefono
					$mPDF1->WriteCell(15,6,'EL C. ',0,0,'L');
					$mPDF1->WriteCell(65,6,$_POST['nombre'],0,0,'C');
					$mPDF1->WriteCell(35,6,'TRABAJADOR DE',0,0,'C');
					$mPDF1->WriteCell(75,6,$_POST['lugar'],0,1,'C');
					$mPDF1->WriteCell(25,6,'ADSCRITO A ',0,0,'L');
					$mPDF1->WriteCell(95,6,$_POST['adscrito'],0,0,'L');
					$mPDF1->WriteCell(35,6,utf8_decode('CON MATRICULA'),0,0,'C');
					$mPDF1->WriteCell(35,6,$_POST['matricula'],0,1,'C');
					$mPDF1->WriteCell(35,6,utf8_decode('IDENTIFICACION'),0,0,'L');
					$mPDF1->WriteCell(85,6,$_POST['id'],0,0,'L');
					$mPDF1->WriteCell(35,6,utf8_decode('Y TELEFONO'),0,0,'C');
					$mPDF1->WriteCell(35,6,$_POST['telefono'],0,1,'C');
					$mPDF1->WriteCell(180,6,utf8_decode('ESTA AUTORIZADO POR EL SUSCRITO PARA RETIRAR LOS SIGUIENTES BIENES DEL AREA DE'),0,1,'L');
					$mPDF1->SetFont('Arial','B',11);
					$mPDF1->WriteCell(180,5,utf8_decode('Coordinacion delegacional de informatica'),0,1,'C');
					$mPDF1->Line(15,72,200,72);  // linea de coordinacion
					$mPDF1->WriteCell(180,4,'',0,1,'C');
					$mPDF1->SetFont('Arial','',11);
					$mPDF1->WriteCell(45,6,'IDENTIFICACION',0,0,'C'); 	//CABECERA
					$mPDF1->WriteCell(50,6,'NATURALEZA DE',0,0,'C');
					$mPDF1->WriteCell(90,6,'DESCRIPCION',0,1,'C');
					$mPDF1->WriteCell(45,6,'O CANTIDAD',0,0,'C');
					$mPDF1->WriteCell(50,6,'LOS BIENES*',0,0,'C');
					$mPDF1->WriteCell(90,6,'',0,1,'C'); 				//CABECERA
					$mPDF1->WriteCell(45,36,$_POST['cant'],1,0,'C'); //cantidad
					$mPDF1->WriteCell(50,36,$_POST['nbienes'],1,0,'C'); //naturaleza de bienes
					$mPDF1->WriteCell(90,36,$_POST['descripcionB'],1,1,'C'); // Descripcion
					$mPDF1->WriteCell(180,6,'',0,1,'C'); //ESPACIO no tocar
					$mPDF1->Line(30,134,200,134); //descripcion 1
					$mPDF1->Line(109,139,200,139); // para observaciones
					$mPDF1->Line(130,147,200,147); // para el dia
					$mPDF1->WriteCell(20,6,'PARA SU ',0,0,'L');
					$mPDF1->WriteCell(167,6,$_POST['motivo'],0,1,'L'); //VARIABLES
					$mPDF1->WriteCell(105,4,'OBSERVACIONES AL ESTADO FISICO DE LOS BIENES',0,0,'L');
					$mPDF1->WriteCell(85,6,$_POST['obs'],0,1,'L');	//VARIABLES
					//$mPDF1->WriteCell(180,6,'_______________________________________________________________________________________',0,1,'L');	// descripcion mas
					$mPDF1->WriteCell(55,6,'SUJETOS A DEVOLUCION',0,0,'L');
					$mPDF1->WriteCell(10,6,'SI',0,0,'C');
					$mPDF1->WriteCell(10,6,'',1,0,'L');
					$mPDF1->WriteCell(10,6,'NO',0,0,'C');
					$mPDF1->WriteCell(10,6,'',1,0,'L');
					$mPDF1->WriteCell(20,6,'EL DIA',0,0,'C');
					$dev=$_POST['devolver'];
					$new_date = date('D', strtotime($_POST['devolver']));
					$mPDF1->WriteCell(75,6,$new_date,0,1,'C');
					$mPDF1->WriteCell(180,6,'',0,1,'C'); //ESPACIO no tocar
					$mPDF1->WriteCell(180,5,'',0,1,'C'); //espacio en blanco, salto de linea
					$mPDF1->WriteCell(95,5,'ENTREGA EL RESPONSABLE DEL CONTROL',0,0,'C');
					$mPDF1->WriteCell(95,5,'RECIBE EL SOLICITANTE',0,1,'C');
					$mPDF1->WriteCell(95,5,'ADMINISTRATIVO DE BIENES',0,0,'C');
					$mPDF1->WriteCell(95,5,'',0,1,'C');
					$mPDF1->WriteCell(180,15,'',0,1,'C'); // espacio para las firmas
					$mPDF1->WriteCell(95,5,$_POST['administrativo'],0,0,'C');// NOMBRE DEL REPONSABLE
					$mPDF1->WriteCell(95,5,$_POST['solicitante'],0,1,'C');// NOMBRE DEL SOLICITANTE
					$mPDF1->WriteCell(95,5,'Nombre y firma',0,0,'C');
					$mPDF1->WriteCell(95,5,'Nombre y firma',0,1,'C');
					$mPDF1->WriteCell(180,6,'',0,1,'C'); //espacio en blanco, salto de linea
					$mPDF1->WriteCell(50,5,'LUGAR Y FECHA',0,0,'C');
					$mPDF1->WriteCell(50,5,$_POST['lugar2'],0,0,'C');
					$mPDF1->Line(55,204,195,204); //linea lugar y fecha
					$mPDF1->WriteCell(90,5,$_POST['fecha2'],0,1,'C');
					$mPDF1->Line(15,188,100,188); //reponsable - linea para firmar
					$mPDF1->Line(105,188,195,188); //solicitante - linea para firmar
					$mPDF1->WriteCell(180,6,'',0,1,'C'); //espacio en blanco, salto de linea
					$mPDF1->WriteCell(180,5,'*LA NATURALEZA DE LOS BIENES SE CODIFICARA SEGUN LAS SIGIENTES CLAVES:',0,1,'C');
					$mPDF1->WriteCell(180,6,'',0,1,'C');
					$mPDF1->WriteCell(15,5,'BC',1,0,'C'); 
					$mPDF1->WriteCell(50,5,' BIEN DE CONSUMO ',0,0,'C');
					$mPDF1->WriteCell(30,5,'',0,0,'C');
					$mPDF1->WriteCell(15,5,'BMNC',1,0,'C'); 
					$mPDF1->WriteCell(80,5,' BIEN MUEBLE NO CAPITALIZABLE ',0,1,'C');
					$mPDF1->WriteCell(180,4,'',0,1,'C'); // salto de linea
					$mPDF1->WriteCell(15,5,'BMC',1,0,'C'); 
					$mPDF1->WriteCell(60,5,' BIEN MUEBLE CAPITALIZABLE ',0,0,'C');
					$mPDF1->WriteCell(20,5,'',0,0,'C');
					$mPDF1->WriteCell(15,5,'BPS',1,0,'C'); 
					$mPDF1->WriteCell(80,5,' BIEN PROPIEDAD SOLICITANTE ',0,1,'C');
					$mPDF1->WriteCell(180,4,'',0,1,'C'); // salto de linea
					$mPDF1->SetFont('Arial','',8);
					$mPDF1->WriteCell(180,4,'FORMA No.  CBM-3',0,1,'R'); 
			        $mPDF1->OutPut('Constancia de autorizacion.pdf','I');
			}
		}
		/**
		 * [actionSoporteTecnico Genera el archivo de soporte]
		 * @since 1.0.1 Se introdujo este elemento
		 */
		public function actionSoporteTecnico(){
			if(Yii::app()->user->isGuest){
				$this->redirect(Yii::app()->user->returnUrl);
			}else{		
					$mPDF2 = Yii::app()->ePdf->mpdf();
					$mPDF2->WriteHTML("");
					$mPDF2->Image(Yii::app()->request->baseUrl.'/images/logo_imss_0.png',15,10,0,0,'png','',true, false); //-100 
					$mPDF2->SetFont('Arial','B',18);
					$mPDF2->WriteCell(180,8,'Instituto Mexicano del Seguro Social',0,1,'C');
					$mPDF2->SetFont('Arial','',10);
					$mPDF2->WriteCell(35,5,'',0,0,'C');
					$mPDF2->WriteCell(120,5,utf8_decode('DELEGACION ESTATAL EN OAXACA'),0,0,'C');
					$mPDF2->WriteCell(35,5,'',0,1,'C');
					$mPDF2->WriteCell(35,5,'',0,0,'C');
					$mPDF2->WriteCell(120,5,utf8_decode('COORDINACION DE INFORMATICA'),0,0,'C');
					$mPDF2->WriteCell(35,5,'',0,1,'C');
					$mPDF2->WriteCell(35,5,'',0,0,'C');
					$mPDF2->WriteCell(120,5,utf8_decode('OFICINA DE SOPORTE TECNICO Y ATENCION A USUARIOS'),0,0,'C');
					$mPDF2->SetFont('Arial','',8);
					$mPDF2->WriteCell(35,5,'Version. 4.2',0,1,'C');

					$mPDF2->SetFont('Arial','B',9);
					$mPDF2->WriteCell(40,5,' Reporte No: ',1,0,'L');
					$mPDF2->WriteCell(40,5,$_GET['rNumero'],1,0,'C');
					$mPDF2->WriteCell(20,5,' Unidad: ',1,0,'L');
					$mPDF2->WriteCell(90,5,$_GET['rUnidad'],1,1,'C');

					$mPDF2->SetFont('Arial','',10);
					$mPDF2->WriteCell(40,5,utf8_decode('Area o departamento: '),1,0,'L');
					$mPDF2->WriteCell(60,5,$_GET['rArea'],1,0,'L');
					$mPDF2->WriteCell(25,5,'Persona Resp.',1,0,'L');
					$mPDF2->WriteCell(65,5,$_GET['rNombe'],1,1,'L');

					$mPDF2->WriteCell(40,5,utf8_decode('Num. de serie: '),1,0,'L');
					$mPDF2->WriteCell(60,5,$_GET['rSerie'],1,0,'L');
					$mPDF2->WriteCell(25,5,'Marca: ',1,0,'L');
					$mPDF2->WriteCell(65,5,$_GET['rMarca'],1,1,'L');
					$mPDF2->WriteCell(40,5,utf8_decode('Num. de inventario: '),1,0,'L');
					$mPDF2->WriteCell(60,5,$_GET['rInventario'],1,0,'L');
					$mPDF2->WriteCell(25,5,'Modelo:',1,0,'L');
					$mPDF2->WriteCell(65,5,$_GET['rModelo'],1,1,'L');
					$mPDF2->WriteCell(40,5,utf8_decode('Direccion IP: '),1,0,'L');
					$mPDF2->WriteCell(60,5,$_GET['rIp'],1,0,'L');
					$mPDF2->WriteCell(25,5,'Nombre PC: ',1,0,'L');
					$mPDF2->WriteCell(65,5, $_GET['rNomPc'],1,1,'L');
					$mPDF2->WriteCell(40,5,utf8_decode('Usuario de windows: '),1,0,'L');
					$mPDF2->WriteCell(60,5,' --------- ',1,0,'L');
					$mPDF2->WriteCell(25,5,utf8_decode('Contrasena:'),1,0,'L');
					$mPDF2->WriteCell(65,5,' --------- ',1,1,'L');
					$mPDF2->WriteCell(40,5,utf8_decode('Cuenta de correo: '),1,0,'L');
					$mPDF2->WriteCell(60,5,' --------- ',1,0,'L');
					$mPDF2->WriteCell(25,5,utf8_decode('Contrasena: '),1,0,'L');
					$mPDF2->WriteCell(65,5,' --------- ',1,1,'L');

					$mPDF2->WriteCell(180,6,utf8_decode('Anadir en los espacios vacios el software y/o configuraciones adicionales realizadas al equipo.'),0,1,'C');
					$mPDF2->WriteCell(180,1,'',0,1,'C');

					$mPDF2->WriteCell(32,5,'Sistema Operativo:',1,0,'R');
					$mPDF2->WriteCell(25,5,' ',1,0,'C'); //SO
					$mPDF2->WriteCell(25,5,'Dispositivo: ',1,0,'L');
					$mPDF2->WriteCell(35,5,' ',1,0,'L'); //Disp
					$mPDF2->WriteCell(25,5,'Accesorios: ',1,0,'L');
					$mPDF2->WriteCell(48,5,' ',1,1,'L');//accesorios
					$mPDF2->WriteCell(10,4,' S ',1,0,'C');
					$mPDF2->WriteCell(180,4,'Instalar controladores del equipo en caso de formateo. ',1,1,'L');
					$mPDF2->WriteCell(10,4,' S ',1,0,'C');
					$mPDF2->WriteCell(60,4,'Cambiar Password de Administrador.',0,0,'L');
					$mPDF2->SetFont('Arial','',7);
					$mPDF2->WriteCell(120,4,'(En caso de habilitar cuenta de ADMINISTRADOR)',0,1,'L');	 //LETRA PEQUEnA
					$mPDF2->SetFont('Arial','',9.5);
					$mPDF2->WriteCell(10,4,' S ',1,0,'C');
					$mPDF2->WriteCell(180,4,'Configurar IP, puerta de enlace, DNS y WINS.',1,1,'L');
					$mPDF2->WriteCell(10,4,' S ',1,0,'C');
					$mPDF2->WriteCell(180,4,'Verificar y en su caso Anexar cuenta al Dominio Sur.',1,1,'L');
							// Migrar usuario a una cuenta del dominio Sur
					$mPDF2->WriteCell(10,4,' S ',1,0,'C');
					$mPDF2->WriteCell(180,4,'Eliminar Software no Autorizado, Musica, Imagenes, presentaciones no institucionales.',1,1,'L');
					$mPDF2->WriteCell(10,4,' S ',1,0,'C');
					$mPDF2->WriteCell(180,4,'Descargar Actualizaciones de windows con procedimiento manual()',1,1,'L');
								//solo equipo en CDI
					$mPDF2->WriteCell(10,4,' S ',1,0,'C');
					$mPDF2->WriteCell(180,4,'Instalar el protector de Pantalla IMSS, Tapiz 33 Maagtic-Si',1,1,'L');
								// Tapiz 32 Maagic-si para farmacias y almacenes (Tapicez32 para el ECE)
					$mPDF2->WriteCell(10,4,' S ',1,0,'C');
					$mPDF2->WriteCell(180,4,'Activar el acceso remoto',1,1,'L');
								// equipo >propiedades>Configuracion de acceso remoto>acceso remoto
					$mPDF2->WriteCell(10,4,' S ',1,0,'C');
					$mPDF2->WriteCell(180,4,'Instalar y Actualizar Antivirus Microsoft Forefront Client Security',1,1,'L');
					$mPDF2->WriteCell(10,4,' S ',1,0,'C');
					$mPDF2->WriteCell(180,4,'Instalar Flash Player XI',1,1,'L');
					$mPDF2->WriteCell(10,4,' S ',1,0,'C');
					$mPDF2->WriteCell(180,4,'Instalar Java 6 o posterior',1,1,'L');
					$mPDF2->WriteCell(10,4,' S ',1,0,'C');
					$mPDF2->WriteCell(180,4,'Instalar Ccleaner 4.0 o posterior.',1,1,'L');
					$mPDF2->WriteCell(10,4,' S ',1,0,'C');
					$mPDF2->WriteCell(180,4,utf8_decode('Instalacion de Office 2010'),1,1,'L');
										//word,excel,powerpoint,Outlook
					$mPDF2->WriteCell(10,4,' S ',1,0,'C');
					$mPDF2->WriteCell(180,4,'Instalar y configurar el Microsoft Lync',1,1,'L');
					$mPDF2->WriteCell(10,4,' S ',1,0,'C');
					$mPDF2->WriteCell(180,4,'Instalar Adobe Reader 10 o posterior.',1,1,'L');
					$mPDF2->WriteCell(10,4,' S ',1,0,'C');
					$mPDF2->WriteCell(180,4,'Instalar Real VNC 4.6 y actualizar el Password.',1,1,'L');
					$mPDF2->WriteCell(10,4,' S ',1,0,'C');
					$mPDF2->WriteCell(180,4,'Instalar LanDesk',1,1,'L');
					$mPDF2->WriteCell(10,4,' S ',1,0,'C');
					$mPDF2->WriteCell(180,4,'Instalar WinRar',1,1,'L');
					$mPDF2->WriteCell(10,4,' S ',1,0,'C');
					$mPDF2->WriteCell(180,4,'Configurar Pagina de inicio en blanco para Internet Explorer',1,1,'L');
					$mPDF2->WriteCell(10,4,' S ',1,0,'C');
					$mPDF2->WriteCell(180,4,'Verificar Internet Explorer',1,1,'L');
										// Maximo Version 8 para el ECE
					$mPDF2->WriteCell(10,4,' S ',1,0,'C');
					$mPDF2->WriteCell(180,4,'Desactivar el Bloqueador de Elementos Emergentes de Internet Explorer.',1,1,'L');
					$mPDF2->WriteCell(10,4,' S ',1,0,'C');
					$mPDF2->WriteCell(180,4,'Deshabilitar control total a carpetas compartidas.',1,1,'L');
					$mPDF2->WriteCell(10,4,' S ',1,0,'C');
					$mPDF2->WriteCell(180,4,'Copiar "Archivo borrado bmp.vbs" y "DelTemp.bat" en inicio ',1,1,'L');
										//caso donde se impriman, recetas, consultorios, directores,etc
					$mPDF2->WriteCell(10,4,' S ',1,0,'C');
					$mPDF2->WriteCell(180,4,'Instalar archivo Asipol 10.exe',1,1,'L');
					$mPDF2->WriteCell(10,4,' S ',1,0,'C');
					$mPDF2->WriteCell(180,4,'Configurar las Active X en IE',1,1,'L');
										//en todos los equipos
					$mPDF2->WriteCell(10,4,' S ',1,0,'C');
					$mPDF2->WriteCell(180,4,'Depurar Visor de eventos,Eliminar temporales, cuarentena, cookies,etc.',1,1,'L');
					$mPDF2->WriteCell(10,4,' S ',1,0,'C');
					$mPDF2->WriteCell(180,4,'Desactivar firewall de windows',1,1,'L');
													// si aplica desacgivar las tres opcioens de redes
					$mPDF2->WriteCell(10,4,' S ',1,0,'C');
					$mPDF2->WriteCell(180,4,'Deshabilitar el procedimiento manual de actualizaciones',1,1,'L');
												//solo equpos en CDI
					$mPDF2->WriteCell(10,4,' S ',1,0,'C');
					$mPDF2->WriteCell(180,4,'Ejecutar ClientDiag',1,1,'L');
								// verificar si existe conexion con el wsus, sino hay conexion reportarlo a nivel central
					$mPDF2->WriteCell(10,4,' S ',1,0,'C');
					$mPDF2->WriteCell(180,4,'Cambiar IP y puerta de enlace con la correspondiente al segmento.',1,1,'L');
					$mPDF2->WriteCell(10,4,' S ',1,0,'C');
					$mPDF2->WriteCell(180,4,'Configurar cuenta con permisos de usuarios avanzados.',1,1,'L');
					$mPDF2->WriteCell(180,2,'',0,1,'C');
					$mPDF2->WriteCell(20,6,'',0,0,'C');
					$mPDF2->WriteCell(150,4,'Sistema (s) instalado (s) en el equipo.',1,0,'C');
					$mPDF2->WriteCell(20,6,'',0,1,'C');

					$mPDF2->WriteCell(10,5,'',1,0,'C');
					$mPDF2->WriteCell(20,5,'ACCEDER',1,0,'L');
					$mPDF2->WriteCell(15,5,'',0,0,'C');
					$mPDF2->WriteCell(10,5,'',1,0,'C');
					$mPDF2->WriteCell(20,5,'RH2000',1,0,'L');
					$mPDF2->WriteCell(15,5,'',0,0,'C');
					$mPDF2->WriteCell(10,5,'',1,0,'C');
					$mPDF2->WriteCell(20,5,'SIPSI',1,0,'L');
					$mPDF2->WriteCell(15,5,'',0,0,'C');
					$mPDF2->WriteCell(10,5,'',1,0,'C');
					$mPDF2->WriteCell(40,5,'SIMF',1,1,'L');

					$mPDF2->WriteCell(10,5,'',1,0,'C');
					$mPDF2->WriteCell(20,5,'CAVD',1,0,'L');
					$mPDF2->WriteCell(15,5,'',0,0,'C');
					$mPDF2->WriteCell(10,5,'',1,0,'C');
					$mPDF2->WriteCell(20,5,'SAIIA',1,0,'L');
					$mPDF2->WriteCell(15,5,'',0,0,'C');
					$mPDF2->WriteCell(10,5,'',1,0,'C');
					$mPDF2->WriteCell(20,5,'SIRMATEC',1,0,'L');
					$mPDF2->WriteCell(15,5,'',0,0,'C');
					$mPDF2->WriteCell(10,5,'',1,0,'C');
					$mPDF2->WriteCell(40,5,'SIPRO',1,1,'L');

					$mPDF2->WriteCell(10,5,'',1,0,'C');
					$mPDF2->WriteCell(20,5,'COLIBRI',1,0,'L');
					$mPDF2->WriteCell(15,5,'',0,0,'C');
					$mPDF2->WriteCell(10,5,'',1,0,'C');
					$mPDF2->WriteCell(20,5,'SERGET',1,0,'L');
					$mPDF2->WriteCell(15,5,'',0,0,'C');
					$mPDF2->WriteCell(10,5,'',1,0,'C');
					$mPDF2->WriteCell(20,5,'SISCAN',1,0,'L');
					$mPDF2->WriteCell(15,5,'',0,0,'C');
					$mPDF2->WriteCell(10,5,'',1,0,'C');
					$mPDF2->WriteCell(40,5,'Reg. Pacientes',1,1,'L');

					$mPDF2->WriteCell(10,5,'',1,0,'C');
					$mPDF2->WriteCell(20,5,'CREPE',1,0,'L');
					$mPDF2->WriteCell(15,5,'',0,0,'C');
					$mPDF2->WriteCell(10,5,'',1,0,'C');
					$mPDF2->WriteCell(20,5,'SIAG',1,0,'L');
					$mPDF2->WriteCell(15,5,'',0,0,'C');
					$mPDF2->WriteCell(10,5,'',1,0,'C');
					$mPDF2->WriteCell(20,5,'SISCOB',1,0,'L');
					$mPDF2->WriteCell(15,5,'',0,0,'C');
					$mPDF2->WriteCell(10,5,'',1,0,'C');
					$mPDF2->WriteCell(40,5,'Ctrl. de compromisos',1,1,'L');

					$mPDF2->WriteCell(10,5,'',1,0,'C');
					$mPDF2->WriteCell(20,5,'NSSA',1,0,'L');
					$mPDF2->WriteCell(15,5,'',0,0,'C');
					$mPDF2->WriteCell(10,5,'',1,0,'C');
					$mPDF2->WriteCell(20,5,'SIAIS',1,0,'L');
					$mPDF2->WriteCell(15,5,'',0,0,'C');
					$mPDF2->WriteCell(10,5,'',1,0,'C');
					$mPDF2->WriteCell(20,5,'IDSE',1,0,'L');
					$mPDF2->WriteCell(15,5,'',0,0,'C');
					$mPDF2->WriteCell(10,5,'',1,0,'C');
					$mPDF2->WriteCell(40,5,'SAIalmacen',1,1,'L');

					$mPDF2->WriteCell(10,5,'',1,0,'C');
					$mPDF2->WriteCell(20,5,'PREI',1,0,'L');
					$mPDF2->WriteCell(15,5,'',0,0,'C');
					$mPDF2->WriteCell(10,5,'',1,0,'C');
					$mPDF2->WriteCell(20,5,'SIEVOPIN',1,0,'L');
					$mPDF2->WriteCell(15,5,'',0,0,'C');
					$mPDF2->WriteCell(10,5,'',1,0,'C');
					$mPDF2->WriteCell(20,5,'VPNP',1,0,'L');
					$mPDF2->WriteCell(15,5,'',0,0,'C');
					$mPDF2->WriteCell(10,5,'',1,0,'C');
					$mPDF2->WriteCell(40,5,'SAIfarmacia',1,1,'L');

					$mPDF2->WriteCell(180,4,'',0,1,'C'); //ESPACIO no tocar

					$mPDF2->Line(35,250,100,250); // quien elaboro
					$mPDF2->Line(120,250,200,250); // fecha
					$mPDF2->WriteCell(30,5,utf8_decode('Elaboro: '),0,0,'C');
					$mPDF2->WriteCell(60,5,utf8_decode('--------------------'),0,0,'C');
					$mPDF2->WriteCell(20,5,'Fecha:',0,0,'R');
					$mPDF2->WriteCell(80,5,'viernes, 00 de diciembre de 2015 00:00 hrs.',0,1,'C');
					$mPDF2->WriteCell(180,2,'',0,1,'C'); //ESPACIO no tocar
					$mPDF2->WriteCell(180,4,'Nota:',0,1,'L'); //ESPACIO no tocar
					$mPDF2->SetFont('Arial','B',8);
					//$mPDF2->MultiWriteCell(180,4,utf8_decode('SE FORMATEO EQUIPO, SE INSTALo WINDOWS 7, SE INSTALARON SOFTWARE INSTITUCIONAL, SE INSTALo SOFTWARE DEL SISTEMA AEROPUERTO, SE VERIFICo Y SE REALIZARON PRUEBAS, ESTE EQUIPO QUEDA EN CALIDAD DE PRESTAMO HASTA QUE EL PROVEEDOR REPARE EL CPU, QUEDA EN SUSTITUCIoN POR EQUIPO LENOVO LKNXWDH'),1,'J',0);
					$mPDF2->SetFont('Arial','',7);
					$mPDF2->WriteCell(180,6,utf8_decode('Para uso exclusivo de personal de Soporte Tecnico y Atencion a Usuarios. Coordinacion de Informatica en Oaxaca.'),0,1,'C');

					$mPDF2->OutPut('Reporte_de_Soporte','I');

			}
		}
	}
?>