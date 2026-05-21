<?php
	$this->pageTitle=Yii::app()->name . ' - Reporte';
	$tipoForm = ( Yii::app()->user->isGuest )?"validarForm3()":"validarForm2()";
?>

<div id="div-form">
		<form role="form"   id="reporteForm" name="reporteForm" action="<?php echo Yii::app()->request->baseUrl; ?>/soporte/ReporteEnviado" onsubmit="return <?php echo $tipoForm; ?>" method="post">
			<input type="hidden" value="false" id="isValido" />
			<?php if ( Yii::app()->user->isGuest ): ?>

				<div id="form-block">
					<div id="div-form-inside">
						<div id="nMatricula" >
							<div class="form-group">
							    <label for="nserie">Numero de matricula:</label>
							    <input type="text" class="form-control" name="nmatr" id="nmatr"  placeholder="Introduzca su numero de matricula.">
					  		</div>
						</div>
						<div id="nNombre" class="div-temporal">
							<div class="form-group">
							    <label for="nserie">Nombre Completo:</label>
							    <input type="text" class="form-control" name="nnom" id="nnom"  placeholder="Introduzca su nombre completo.">
					  		</div>
						</div>
				  		<div id="infoMatricula"></div>
				  		<label style="color:red">
				      		<input onchange="noMatricula(this);" id="NoTengoMatricula" name="NoTengoMatricula" type="checkbox"> No cuento con matricula
				    	</label>
					</div>
				</div>

			<?php endif ?>
			<div id="form-block">
				<div id="div-form-inside">
					<div class="form-group">
					    <label for="nserie">Numero de Serie / NNI:</label>
					    <input type="text" class="form-control" name="nserie" id="nserie"  placeholder="Introduzca el numero de serie o NNI del equipo">
			  		</div>
			  		<div id="infoBySerie"></div>
				</div>
			</div>

			<div id="form-block">
				<div id="div-form-inside">
					<div class="form-group">
					    <label for="falla">Descripcion De Falla:</label>
					    <textarea id="falla" name="falla" class="form-control" rows="5"></textarea>
			  		</div>
			  		<div id="errorLogger"></div>
			  		<div id="errorLogger2"></div>
			  		<div id="errorLogger3"></div>
				</div>
			</div>
			<div id="div-btn">
				<button type="reset" onclick="limpiarFormReporte()" class="btn btn-primary">Limpiar Formulario</button>
				<button type="submmit" class="btn btn-success"> Enviar Reporte.</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			</div>
			<div id="form-block">
				<div id="div-form-inside">
				</div>
			</div>		
			<?php 
				$ip = 	getenv('HTTP_CLIENT_IP')?:getenv('HTTP_X_FORWARDED_FOR')?:getenv('HTTP_X_FORWARDED')?:getenv('HTTP_FORWARDED_FOR')?:
						getenv('HTTP_FORWARDED')?:getenv('REMOTE_ADDR'); 
			?>
			<input type="hidden" value="<?php echo $ip;?>" name="ipOrigen" id="ipOrigen" />

		</form> 
		<div id="div-nota">
			<table>
				<tbody>
					<tr>
						<td width="60px">
							<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/alert.png">
							Nota:
						</td>
						<td>
						<li class="smaller">
							Todos los reportes son controlados mediante la direccion ip de origen, por lo que cualquier reporte invalido repercutira
							en proximos reportes y serán candidatos a las sanciones establecidas por la coordinacion de informatica.
						</li>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
</div>

<script type="text/javascript">
	$('#nserie').keydown(function (e) {
	  if (e.keyCode == 13) {
	    e.preventDefault();
	    getInformacionBySerie();
	    document.getElementById("falla").focus();
	  }
	});

	$('#nmatr').keydown(function (e) {
	  if (e.keyCode == 13) {
	    e.preventDefault();
	   	getInformacionMatricula();
	    document.getElementById("nserie").focus();
	  }
	});
</script>