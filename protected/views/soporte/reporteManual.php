<?php
/*$browser = getenv("HTTP_USER_AGENT");
if (preg_match("/MSIE/i", "$browser"))
{
	echo "<p style='font-family:verdana; font-size:250%; text-align:center; color:red;'>Este navegador no está soportado para levantar su incidencia. Favor de generar el reporte en Chrome. </p>";
}
else
{
	$this->pageTitle=Yii::app()->name . ' - Reporte';
	//$this->require_once=Yii::app()->
}*/

preg_match('/MSIE (.*?);/', $_SERVER['HTTP_USER_AGENT'], $matches);
if(count($matches)<2)
{
  preg_match('/Trident\/\d{1,2}.\d{1,2}; rv:([0-9]*)/', $_SERVER['HTTP_USER_AGENT'], $matches);
}

if (count($matches)>1)
{
  //Then we're using IE
  $version = $matches[1];

	if ($version==10 || $version==11)
	{
		echo "<p style='font-family:verdana; font-size:250%; text-align:center; color:red;'>Este navegador no está soportado para levantar su incidencia. Favor de generar el reporte en Chrome. </p>";
	}
	else
	{
		$this->pageTitle=Yii::app()->name . ' - Reporte';
		//Yii::app()->request->baseUrl; "/images/alert.png";
	}
}
?>

<div id="div-form">
		<form role="form"   enctype="multipart/form-data" id="reporteForm" name="reporteForm" action="<?php echo Yii::app()->request->baseUrl; ?>/soporte/ReporteEnviadoManual" onsubmit="return validaFormManual();" method="post">
			<input type="hidden" value="false" id="isValido" />


				<div id="form-block">
					<div id="div-form-inside">
						<div id="nMatricula" >
							<div class="form-group">
							    <label for="nserie">Número de matrícula:</label>
							    <input type="text" onblur="getInformacionMatricula();" class="form-control" name="nmatr" id="nmatr"  placeholder="Introduzca su matricula.">
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
				      		<input onchange="noMatricula(this);" id="NoTengoMatricula" name="NoTengoMatricula" type="checkbox"> No cuento con matrícula
				    	</label>
                        <?php
                            if(strtolower(Yii::app()->user->name) != 'guest')
                            {?>
                                <label style="color:red; float: right; " >
                                    Es una llamada telefónica&nbsp&nbsp<input  id="llamadaTelefonica" name="llamadaTelefonica" type="checkbox"/>
                                </label>
                        <?php
                            }
                        ?>


					</div>
				</div>


			<div id="form-block">
				<div id="div-form-inside">
					<div class="form-group">
					    <label for="nserie">Número de Serie del equipo (Altamente requerido):</label>
					    <input type="text" class="form-control" name="nserie" id="nserie"  placeholder="Introduzca el numero de serie del equipo a reportar">
			  		</div>
			  		<div id="infoBySerie"></div>
				</div>
				<div id="div-form-inside">
					<div class="form-group">
						<label for="ncorr"><font color="green">Correo Electrónico:</font></label>
						<input type="text" class="form-control" name="ncorr" id="ncorr"
							placeholder="Escriba su correo electrónico institucional"
							autocomplete="off"
							oninput="correoMostrarHint();"
							onblur="correoCompletarYValidar();"/>
						<div style="margin-top:5px;">
							<label style="color:red; font-weight:bold; cursor:pointer;">
								<input type="checkbox" id="sinCorreo" name="sinCorreo"
									onchange="toggleSinCorreo(this);"> 
								Sin correo institucional
							</label>
						</div>
						<div id="ncorr_hint" style="display:none; font-size:12px; color:#1565c0; margin-top:3px;"></div>
						<div id="ncorr_ldap_feedback" style="display:none; margin-top:5px;"></div>
					</div>
					<input type="hidden" name="ldap_nombre" id="ldap_nombre" value=""/>
				</div>
				<div id="div-form-inside">
					<div class="form-group">
					    <label for="nserie"><font color="green">Telefono:</font></label>
					    <input type="text" class="form-control" name="ntel" id="ntel"  placeholder="Escriba un teléfono local para contacto en caso de ser necesario">
			  		</div>
				</div>
				<div id="div-form-inside">
					<div class="form-group">
					    <label for="nserie"><font color="green">Cuenta de usuario del equipo (Obligatorio):</font></label>
					    <input type="text" class="form-control" name="nUsuar" id="nUsuar"  placeholder="Escriba el usuario que se muestra al encender el equipo a reportar (ej. juan.perez, siap01.01803)">
			  		</div>
				</div>
				<div id="div-form-inside">
					<div class="form-group">
					    <label for="nserie"><font color="green">Contraseña de usuario (Obligatorio):</font></label>
					    <input type="text" class="form-control" name="nContra" id="nContra"  placeholder="Anote la contraseña CORRECTA que se escribe al encender el equipo que reporta">
			  		</div>
				</div>
				<div id="div-form-inside">
					<div class="form-group">
					    <label for="nserie"><font color="green">Ip del Equipo (Obligatorio):</font></label>
					    <input type="text" class="form-control" name="nIpEquipo" id="nIpEquipo"  placeholder="Escriba la dirección ip del equipo que está reportando">
			  		</div>
				</div>
				<div id="div-form-inside">
					<div class="form-group">
					    <label for="nserie"><font color="green">Departamento al que pertenece (Altamente requerido):</font></label>
					    <input type="text" class="form-control" name="depto" id="depto"  placeholder="Escriba el área en donde se encuentra físicamente el equipo reportado">
			  		</div>
				</div>
			</div>
			<div id="div-form-inside">
					<div class="form-group">
					    <label for="falla">Descripción del servicio:</label>
					    <textarea id="falla" name="falla" class="form-control" placeholder="Describa detalladamente la incidencia y proporciones datos adicionales en caso de ser necesario (ej. Migraciones, configuracion de correo)" rows="5"></textarea>
			  		</div>
					<div class="form-group">
					<font color="blue"><label >Aqui puede subir archivos que considere pertinentes para su reporte:</label></font>
					<table class="table">
						<tr>
							<td><input name="primerArchivo" class="file" type="file" /></td>
						</tr>
						<tr>
							<td><input name="segundoArchivo" type="file" class="file" ></td>
						</tr>
						<tr>
							<td><input name="tercerArchivo" type="file" class="file" ></td>
						</tr>
					</table>

			  		</div>
			</div>
			<div id="form-block">
				<div id="div-form-inside">

			  		<div id="errorLogger"></div>
			  		<div id="errorLogger2"></div>
			  		<div id="errorLogger3"></div>
					<div id="errorLogger4"></div>
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
							en proximos reportes y serán candidatos a las sanciones establecidas por la coordinación de informatica.
						</li>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
</div>

<script type="text/javascript">
	/*$('#nserie').keydown(function (e) {
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
	});*/
</script>

<script src="/msicdi/js/correo-ldap.js"></script>
<style>.kv-fileinput-upload { display: none !important; }</style>
