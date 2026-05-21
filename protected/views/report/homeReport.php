
<?php
	$this->pageTitle=Yii::app()->name . ' - Reportes';
	$this->breadcrumbs=array('Reportes',);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />	
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-2.1.1.min.js" ></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/APP.js" ></script>
</head>

<style type="text/css">
	#optionReporte{
		text-align: center;
		margin-left: 10%;
		margin-right: 10%;
		/*background-color: gray;*/
	}
	#formReport{
		text-align: left;
	}
</style>
<body>

<div id="optionReporte">
			<input  style="background-color: #82B2FE; color: #FFFFFF;border: #000 " type="button" onclick="showR();" value="Ver Reportes"/>
			<input style="background-color: #82B2FE; color: #FFFFFF;border: #000 " type="button" onclick="createR();" value="Generar Reporte"/>


<div id="createReport" style="display:none;">
	<h4>Generar Reporte</h4>
	<span>Rellenar los campos*</span>
	<div id="formReport">
		<form method="post" action="constancia" target="_blank">
			 <label>Nombre:</label><input type="text" name="nombre"  placeholder="Nombre del trabajador"  size="50" autofocus="true" ><br/>
			 <label>Lugar de trabajo:</label><input type="text" name="lugar"  placeholder="Lugar de trabajo" size="50" ><br/>
			 <label>Lugar de adscripcion:</label><input type="text" name="adscrito"  placeholder="Adscripcion" size="50" ><br/>
			 <label>Matricula:</label><input type="text" name="matricula" placeholder="1123000000" size="10" maxlength="10" >
			  <label>Telefono:</label><input type="text" name="telefono"  placeholder="51-0000000" maxlength="10" size="10" ><br/><br/>
			 <label>Identificacion:</label><input type="text" name="id"  placeholder="Medio de identificacion" size="50" ><br/>
			
			 
			 <label>Cantidad</label>
			 <select name="cant" >
			    <option value="0">-Seleccione-</option>
			 	<option value="1">1</option>
			 	<option value="2">2</option>
			 	<option value="3">3</option>
			 	<option value="4">4</option>
			 	<option value="5">5</option>
			 	<option value="6">6</option>
			 </select>

			 <label>Naturaleza de los bienes</label>
			 <select name="nbienes">
			 	<option value="0">-Seleccione una-</option>
			 	<option value="BC">BC</option>
			 	<option value="BMC">BMC</option>
			 	<option value="BMNC">BMNC</option>
			 	<option value="BPS">BPS</option>
			 </select>
			 <br/>
			 <label>Descripcion del bien</label><input type="text" name="descripcionB" ><br/>

			 <label>Motivo</label><input type="text" name="motivo" placeholder="motivo de constancia" size=""  ><br/>
			 <label>Observaciones</label><br/> <textarea name="obs" id="obs" rows="4" cols="60"></textarea><br/>

			 <label>Fecha de devolucion</label><input type="date" name="devolver"  placeholder="fecha"  ><br/>
			 <label>Nombre del Responsable</label><input type="text" name="administrativo"  placeholder="Nombre del Responsable" size="40" ><br/>
			 <label>Nombre del Solicitante</label><input type="text" name="solicitante"  placeholder="Nombre del solicitante" size="40" ><br/>

			 <label>Lugar</label><input type="text" name="lugar2" placeholder="Lugar" size="50" > fecha <input type="date" name="fecha2"><br/>
			 <!--Lugar y fecha de elaboracion-->
			 	<br/><br/><br/>

			 <input type="submit" value="Generar" name="enviar" class="">
			 <input type="reset" value="Reporte Nuevo" class="">
		</form>
</div>
	</div>


		<div id="showReport" style="display:none">
			<h4>Reportes</h4>
				<table border="1">

					<tr><!-- Cabeceras -->
					<th width="120px;">Folio de Reporte</th>
					<th width="150px;">Fecha</th>
					<th width="350px;">Descripcion</th>
					</tr>
					<!--Información de la tabla-->
					<tr>
						<td><a href="">RS-110003</a></td>
						<td>11/01/2015</td>
						<td>Instalaci&oacute;n de nuevo sistema operativo</td>
					</tr>

				</table>
		</div>
</div>

</body>
</html>