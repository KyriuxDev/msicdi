 <?php
	$this->pageTitle=Yii::app()->name . ' - Reporte';
?>

<?php 
	if (isset($_GET['st'])) {
?>
<div id="mensaje-error">
	<table>
		<tbody>
			<tr>
				<td><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/alert.png"></td>
				<td><strong>&nbsp&nbspAdvertencia:&nbsp&nbsp&nbsp&nbsp</strong></td>
				<td>El número de rastreo introducido es incorrecto, por favor vuelva a intentarlo.</td>
			</tr>
		</tbody>
	</table>
</div>
<?php
	}
?>
<div id="rastreo-box">
	<table>
		<tbody>
			<tr>
				<td>
					<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/buscarticket.png">
				</td>
				<td>
					<h4>Ver estado Actual del reporte.</h4>
				</td>
			</tr>
		</tbody>
	</table>
	<div id="rastreo-interior">
		<div class="form-group">
		    <h5><label for="codigoRastreo">Código de Rastreo:</label></h5>
		    <input type="email" class="form-control" name="codigoRastreo" id="codigoRastreo" placeholder="Introduzca El Código."></br></br>
		    <button type="button" class="btn btn-success" onclick="btnRastrear();">Ver Estado.</button>
	  </div>
	</div>
</div>