 <?php
	$this->pageTitle=Yii::app()->name . ' - Reporte';
	// ── Verificar si ya fue enviado a Helix ──────────────────────────
	$yaEnviado      = false;
	$codigoHelixPrev = '';

	$notaHelix = Yii::app()->db->createCommand(
		"SELECT mensaje FROM cdi_notas
		WHERE Nrastreo = :nr
		AND mensaje LIKE '%Helix%'
		ORDER BY fecha DESC
		LIMIT 1"
	)->bindValue(':nr', $codigo)->queryRow();

	if ($notaHelix) {
		// Extraer el código WO/INC de la nota guardada
		if (preg_match('/\b(WO|INC|IM)[0-9]+\b/i', $notaHelix['mensaje'], $m)) {
			$codigoHelixPrev = strtoupper($m[0]);
		}
		$yaEnviado = true;
	}
?>

 <?php  if( !Yii::app()->user->isGuest ){?>
 <div id="submenu">
     <table >
         <tr>
             <td>
                 <a href="<?php echo Yii::app()->request->baseUrl; ?>/soporte/administrar.html"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/inicio.gif"></a>
             </td>
             <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
             <td>
                 &nbsp&nbsp&nbsp&nbsp<a href="<?php echo Yii::app()->request->baseUrl; ?>/soporte/usuarios.html"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/usuarios.gif"></a>
             </td>
             <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
             <td>
                 &nbsp&nbsp&nbsp&nbsp&nbsp<a href="<?php echo Yii::app()->request->baseUrl; ?>/soporte/categorias.html"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/categorias.gif"></a>
             </td>
             <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
             <td>
                 &nbsp&nbsp&nbsp&nbsp&nbsp<a href="<?php echo Yii::app()->request->baseUrl; ?>/soporte/reportes.html"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/reportes.gif"></a>
             </td>
             <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
             <td>
                 <a href="<?php echo Yii::app()->request->baseUrl; ?>/soporte/perfil.html"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/perfil.gif"></a>
             </td>
         </tr>
         <tr>
             <td>
                 <a href="<?php echo Yii::app()->request->baseUrl; ?>/soporte/administrar.html"><font color="white">Inicio</font></a>
             </td>
             <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
             <td>
                 <a href="<?php echo Yii::app()->request->baseUrl; ?>/soporte/usuarios.html"><font color="white">Usuarios</font></a>
             </td>
             <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
             <td>
                 <a href="<?php echo Yii::app()->request->baseUrl; ?>/soporte/categorias.html"><font color="white">Categorias</font></a>
             </td>
             <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
             <td>
                 <a href="<?php echo Yii::app()->request->baseUrl; ?>/soporte/reportes.html"><font color="white">Resultados</font></a>
             </td>
             <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
             <td>
                 <a href="<?php echo Yii::app()->request->baseUrl; ?>/soporte/perfil.html"><font color="white">Perfil</font></a>
             </td>
         </tr>
     </table>
 </div>
<?php }?>

<input type="hidden" name="nRastreo" id="nRastreo" value="<?php echo $codigo; ?>">
<?php
	if(isset($_GET['stat'])){
		if($_GET['stat']){
?>
<div id="mensaje-correcto">
	<table>
		<tbody>
			<tr>
				<td><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/suceso.png"></td>
				<td><strong>&nbsp&nbspSatisfactorio:&nbsp&nbsp&nbsp&nbsp</strong></td>
				<td>Acción realizada con exito.</td>
			</tr>
		</tbody>
	</table>
</div>
<?php
		}
		else{
?>
<div id="mensaje-error">
	<table>
		<tbody>
			<tr>
				<td><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/alert.png"></td>
				<td><strong>&nbsp&nbspAdvertencia:&nbsp&nbsp&nbsp&nbsp</strong></td>
				<td>Hubo un error al intentar hacer esta acción, Intentalo de nuevo más tarde.</td>
			</tr>
		</tbody>
	</table>
</div>
<?php
		}
	}
 ?>

 <?php
	if(isset($_GET['status'])){
		if($_GET['status']){
?>
<div id="mensaje-correcto">
	<table>
		<tbody>
			<tr>
				<td><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/suceso.png"></td>
				<td><strong>&nbsp&nbspSatisfactorio:&nbsp&nbsp&nbsp&nbsp</strong></td>
				<td>Informacion actualizada exitosamente.</td>
			</tr>
		</tbody>
	</table>
</div>
<?php
		}
		else{
?>
<div id="mensaje-error">
	<table>
		<tbody>
			<tr>
				<td><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/alert.png"></td>
				<td><strong>&nbsp&nbspAdvertencia:&nbsp&nbsp&nbsp&nbsp</strong></td>
				<td>Hubo un error al actualizar la informacion, Intentalo de nuevo más tarde..</td>
			</tr>
		</tbody>
	</table>
</div>
<?php
		}
	}
 ?>

 <form action="<?php echo Yii::app()->request->baseUrl; ?>/soporte/actualizarTodos" method="post">
     <input type="hidden" name="nRastr" id="nRastr" value="<?php echo $codigo; ?>">
<div id="rastreo-principal">
	<table class="table">
		<tbody>
			<tr>
				<td>
					<h5>Numero de Rastreo: <?php echo $codigo; ?></h5>
				</td>
				<td>
					<h5>NNI/Serie: <?php echo ($dat[0]['nSerie']); ?></h5>
				</td>
			</tr>
			<tr>
				<td>
					<h5>Estado Actual: <?php echo ($dat[0]['status']); ?></h5>
				</td>
				<td>
					<h5>Ultima Actualización: <?php echo ($dat[0]['ultimoCambio']); ?></h5>
				</td>
			</tr>
			<tr>
				<td>
					<h5>Encargado: <?php echo ($dat[0]['soporte']); ?></h5>
				</td>
				<td>
                    <h5>Fecha de Creación: <?php echo ($dat[0]['fechaReporte']); ?></h5>
				</td>
			</tr>
			<tr>
				<td>
					<h5>Ip de Origen: <?php echo $dat[0]['ipOrigen']; ?></h5>
				</td>
				<td>
					<h5>Usuario: <?php echo $reportador; ?> </h5>
					<?php if ( false == true)://$dat[0]['status'] == 'Resuelto'): ?>
						<input  class="btn btn-primary" type="button" value="Constancia de autorización">
						<input onclick="showDialogCheckList('<?php echo $codigo; ?>');" class="btn btn-info" type="button" value="Checklist de Salida">
					<?php endif ?>
				</td>
			</tr>
			<tr>
				<td>
					<h5>Teléfono: <?php echo $dat[0]['Telefono']; ?></h5>
				</td>
				<td>
					<h5>Departamento: <?php echo $dat[0]['departamento']; ?></h5>
				</td>
			</tr>

			<tr>
				<td>
					<h5>Correo: <?php echo $dat[0]['eMail']; ?></h5>
				</td>
				<td>
				
				</td>
			</tr>

			<?php if ( !$isUsuario ): ?>
			<tr>
				<td>
					<font color="#428BCC"><h5 >Usuario: <?php echo $dat[0]['usuario']; ?></h5></font>
					<font color="#428BCC"><h5>Contraseña: <?php echo $dat[0]['contrasena']; ?></h5></font>
				</td>
				<td>
					<font color="#428BCC"><h5>Ip del Equipo: <?php echo $dat[0]['ipEquipo']; ?></h5></font>
					<font color="#428BCC"><h5>Falla: <?php echo $dat[0]['descripcionFalla']; ?></h5></font>
				</td>
			</tr>
			<?php endif ?>
		</tbody>
	</table>
<?php if ( sizeof($imgs)>0 ): ?>
	<div style="display:block" id="contenedorImagenes" class="info-popover">
	    <table class="table">
	    	<tr>
	    		<?php foreach ($imgs as $ruta):
                    if (strpos($ruta['pathArchivo'],'jpg') !== false) { ?>

	    			<td>
		    			<div id="vistaPrevia">
		    				<img onclick="showDialogImg(this);" src="<?php echo Yii::app()->request->baseUrl.$ruta['pathArchivo']; ?>" alt="Captura de Pantalla">
		    			</div>
		    		</td>
	    		<?php  }else{ ?>
                        <td>
                        <div id="vistaPrevia">
                            <a href="<?php echo Yii::app()->request->baseUrl.$ruta['pathArchivo']; ?>" download="Archivo_IMSS"><img src="<?php echo Yii::app()->request->baseUrl."/images/word.png"; ?>" /></a>
                        </div>
                        </td>
                <?php    } ?>
                    <?php if ( sizeof($imgs)==1 ): ?>
                    <td></td>
                <?php endif ?>
                <?php endforeach ?>
	    	</tr>
	    </table>
	</div>
	<div class="arrow">
		<img id="arrow" src="<?php echo Yii::app()->request->baseUrl; ?>/images/down.png" >
	</div>
	<script type="text/javascript">iniciarDiv();</script>
<?php endif ?>


<?php if( $isAdmin || $isMine && (!$isUsuario) ){ ?>
	<table class="table">
		<tbody>
			<tr>
				<td>
					<table>
						<tr>
							<td><h4>Notas:&nbsp&nbsp</h4></td>
							<td><a href="javascript:agregarNota();" >+ Agregar Nueva Nota</a></td>
						</tr>
					</table>

					<font color="gray">* Las notas no son visibles para el usuario.</font>
				</td>
				<td>
				</td>
			</tr>
			<tr>
				<td>
					<div id="agregar-nota" >
                            <textarea id="txtNota" name="txtNota" cols="100" rows="5"></textarea>
					</div>
				</td>
				<td></td>
			</tr>
		</tbody>
	</table>
<?php } ?>
	<?php
    //if($isAdmin || $isMine && (!$isUsuario))
        if( !$isUsuario )
		foreach ($notas as $not) {
	?>
		<div id="div-notas">
			<table>
				<tbody>
					<tr>
						<td>
							Agregado Por: <?php echo $not['agregadoPor'].' - '.$not['fecha']; ?>
							<input type="hidden" name="agr" id="agr" value="<?php echo Yii::app()->user->name; ?>">
						</td>
					<tr>
						<td>
							<?php echo $not['mensaje']; ?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	<?php
	}
	?>
	</div>

<?php
	if($isAdmin || $isMine && (!$isUsuario) && ( $dat[0]['status']=='Nuevo' || $dat[0]['status']=='Proceso' || $dat[0]['status']=='Espera' ) ){
?>
	<div id="control-rastreo">
			<table class="table">
				<tbody>
					<tr>
						<td>
							<font color="red" size="3px">Asignar A:</font><br>

							<input type="hidden" name="selectSoporte" id="selectSoporte" value="0">

							<div class="contenedor-buscador">
								<input type="text" id="buscarSoporte" autocomplete="off"
									placeholder="Buscar encargado..."
									value="<?php
											foreach ($soporte as $us) {
												if (strpos($us['nom'], $dat[0]['soporte']) !== false) {
													echo htmlspecialchars($us['nom']);
													break;
												}
											}
									?>">

								<div id="listaSoporte">
									<?php foreach ($soporte as $us): ?>
										<div class="opcion-soporte"
											data-valor="<?php echo $us['Matricula']; ?>"
											data-nombre="<?php echo htmlspecialchars($us['nom']); ?>">
											<?php echo htmlspecialchars($us['nom']); ?>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
						</td>
						<td>
							<font color="red" size="3px">Cambiar Estado A:</font>
							<select id="selectStatus" name="selectStatus" style="width:90%">
							<option value="0">Seleccione un estado...</option>
							<?php foreach ($stat as $st) {
								if( $dat[0]['status'] == $st['Status'] )
									echo '<option selected value="'.$st['Status'].'">'.$st['Status'].'</option>';
								else
									echo '<option value="'.$st['Status'].'">'.$st['Status'].'</option>';
							} ?>
							</select>
						</td>
					</tr>

					<tr>
						<td></td>
						<td>
							<div style="float:right; padding-right:35px;">
							</div>
						</td>

					</tr>
				</tbody>
			</table>
	</div>

<?php
	}
 ?>

<div id="rastreo-mensajes">
</div>

<script type="text/javascript">
	getRespuestas();
</script>
<?//php if ( $isAdmin || ($isMine  && ( $dat[0]['status']=='Nuevo' || $dat[0]['status']=='Proceso' || $dat[0]['status']=='Espera' )) ): ?>
	<div id="rastreo-respuesta">
			<input type="hidden" name="matr" id="matr" value="<?php echo Yii::app()->user->name; ?>">
			<h4 style="color:green">Responder.</h4>
			<textarea id="txtRespuesta" name="txtRespuesta" cols="100" rows="8"></textarea></br></br>
			<a class="btn btn-warning" style="margin-top:6px; margin-right:2px;" href="<?php echo '/msicdi/report/reporte?idTicket='.$codigo; ?>" target="_blank">Generar Reporte</a>
			<button class="btn btn-primary" type="submit">Actualizar</button>
			<?php if($isAdmin || $iscoAdmin): ?>
				<?php if ($yaEnviado): ?>
					<button class="btn btn-success" type="button" disabled>✓ Enviado a Helix</button>
				<?php else: ?>
					<button class="btn" style="background-color:#2e7d32; color:#fff;" type="button" onclick="abrirHelixWO();">Helix</button>
				<?php endif; ?>
			<?php endif; ?>

	</div>
<?php //endif ?>

<?php include("helix.php"); //FormularioHelix ?>
</form>
<?php
	if($isAdmin || $iscoAdmin){
?>
	<div id="div-historial">
		<h4><font color="green">Historial del reporte.</font></h4></br>
		<?php
			echo $dat[0]['historial'];
		?>
	</div>
<?php
	}
?>


<?php
	$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
	    'id'=>'checklist',
	    'options'=>array(
				        'title'		=> '   Generar Constancia de autorización', //titulo del modal
				        'autoOpen'	=> false,
				        'modal'		=> true,
				        'width'		=> 500,
				        'height'	=> 400,
				        'draggable' => false,
				        'resizable'	=> false,
				        'position' 	=> 'center',
				        'overlay' 	=> array(
				            'backgroundColor'	=> 'black',
				            'opacity'			=> 0.5,
				        ),
				        'close'		=> 'js:function(){$("body").removeClass("modal-open");}',
				        'show' 		=> 'shake',
				        'hide' 		=> 'blind',
						'buttons'	=> array(
						//	'Generar Constancia' => 'js:function(){ redirigeConstancia();/*$("#form-actualizar").submit();*/}',
						//	'Cancel'=>'js:function(){$(this).dialog("close");$("body").removeClass("modal-open");}',
						),

				    ),
	));
	include("constancia.php");//Contenido del modal
	$this->endWidget('zii.widgets.jui.CJuiDialog');
	$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
	    'id'=>'imgViewModal',
	    'options'=>array(
				        'title'		=> 'Archivo Subido Por El Usuario', //titulo del modal
				        'autoOpen'	=> false,
				        'modal'		=> true,
				        'width'		=> 700,
				        'height'	=> 700,
				        'draggable' => false,
				        'resizable'	=> false,
				        'position' 	=> 'center',
				        'overlay' 	=> array(
				            'backgroundColor'	=> 'black',
				            'opacity'			=> 0.5,
				        ),
				        'close'		=> 'js:function(){$("body").removeClass("modal-open");}',
				        'show' 		=> 'blind',
				        'hide' 		=> 'blind',
						'buttons'	=> array(
						),

				    ),
	));?>
	<div id="divImgModal">
		<img id="imgModal" src="" alt="Archivo Subido">
	</div>

<?php
	$this->endWidget('zii.widgets.jui.CJuiDialog');
?>

<script type="text/javascript">
    $('#agregar-nota').hide();

	jQuery('#arrow').live('click', function(event) {
		htmlActual = $('#contenedorImagenes').html();
		if( htmlActual == "" ){
			$('#contenedorImagenes').html(htmlDiv);
			$("#arrow").attr("src","<?php echo Yii::app()->request->baseUrl; ?>/images/up.png");
		}
		else{
			$('#contenedorImagenes').html("");
			$("#arrow").attr("src","<?php echo Yii::app()->request->baseUrl; ?>/images/down.png");
		}
	});
</script>

<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/buscar_soporte.css">
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/buscar_soporte.js"></script>

