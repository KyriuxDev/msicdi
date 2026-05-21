<?php
	$this->pageTitle=Yii::app()->name . ' - Reporte';
?>

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

<div id="categorias">
	<table class="table">
		<tbody>
			<tr>
				<td>
					<font color="Green" size="4px">Seleccione el Año :</font>
				</td>
				<td>
					<select id="selectAnio" name="selectAnio" class="form-control">
						<?php 
							for ( $i=date('Y'); $i >= $inicio ; $i--) { ?>
								<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
						<?php }?>
					</select>
				<td>

					<font color="Green" size="4px">Seleccione el tipo :</font>
				</td>
				<td>
					<select id="selectTipo" name="selectTipo" class="form-control">
						<option value="1">Grafica Lineal</option>
						<option value="2">Grafica De Barras</option>
						<option value="3">Grafica De Radar</option>
					</select>
				</td>
			</tr>
		</tbody>
	</table>
	<div class="checkbox" style="padding-left:25px;">
	  <label>
	    <input type="checkbox" id="checkboxResuelto">
	    Mostrar reportes resueltos.
	  </label>
	  <font color="Green" size="2px"><label id="eficiencia"></label></font>
	  <font color="Blue" size="2px"><label id="recibidos"></label></font>
	  <font color="Red" size="2px"><label id="solucionados"></label></font>
	</div>
	<canvas id="myChart" width="790" height="400"></canvas>
	<br><br>
	<button type="button" onclick="reporteReportes();" class="btn btn-success">Exportar a Excel</button>
</div>



<script type="text/javascript">
	function reporteReportes()
	{
		anio = $('#selectAnio').val();
		window.location.href = '/msicdi/site/excelReportes?cr='+anio;
	}
	solicitudAjaxChart(false);
	$("#selectAnio, #selectTipo").change(function() 
	{
  		solicitudAjaxChart(true);
	});
	$('#checkboxResuelto').change(function()
	{
		//document.writeln(anio);
		solicitudAjaxChart(true);
    });
</script>