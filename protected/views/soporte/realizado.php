<?php
	$this->pageTitle=Yii::app()->name . ' - Reporte';
?>
<div id="div-exitoso">
	<table id="tabla-suceso">
		<tbody>
			<tr>
				<td>
					<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/suceso.png">
				</td>
				<td>
					<h5>&nbsp&nbsp&nbsp<strong>Exitoso:</strong> Su reporte ha sido enviado.</h5>
				</td>
			</tr>
			<tr>
				<td>
				</td>
				<td>
					<h5>Su reporte ha sido enviado a la cordinación de Informatica.! Número de Seguimiento: <strong><?php echo $idSeguimiento; ?></strong></h5>
					<h5><font color="red">Por favor guarde el número de seguimiento para cualquier aclaración.</font></h5>
				</td>
			</tr>
			<tr>
				<td>
				</td>
				<td>
					<h5><a href="<?php echo Yii::app()->request->baseUrl; ?>/soporte/rastreo?codigo=<?php echo $idSeguimiento; ?>">Ver Seguimiento.</a></h5>
				</td>
			</tr>
		</tbody>
	</table>

</div>