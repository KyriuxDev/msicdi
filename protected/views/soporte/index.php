<?php
	$this->pageTitle=Yii::app()->name . ' - Soporte';
?>

<table id="tabla-reporte">
	<tbody>
		<tr>
			<td>
				<div id="td-reporte">
					<table style="width:100%;">
						<tbody>
							<tr>
								<td> </br><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/nuevoticket.png"> </td>
								<td>
									<div style="text-align:left">
										<table>
											<tr>
												<td>
													</br>
													<a href="<?php echo Yii::app()->request->baseUrl; ?>/soporte/reportar">Solicitud de servicio.</a>
												</td>
											</tr>
											<tr>
												<td>
													</br>
												Solicitar servicio al equipo de Soporte.
												</td>
											</tr>
										</table>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</td>
			<td>
				<div id="td-reporte">
					<table style="width:100%;">
						<tbody>
							<tr>
								<td> </br><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/buscarticket.png"> </td>
								<td>
									<div style="text-align:left">
										<table>
											<tr>
												<td>
													</br>
													<a href="<?php echo Yii::app()->request->baseUrl; ?>/soporte/rastrear">Rastrear Reporte.</a>
												</td>
											</tr>
											<tr>
												<td>
													</br>
													Ver estado de reportes enviados.
												</td>
											</tr>
										</table>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</td>
		</tr>
	</tbody>
</table>
<br/><br/><br/>
<?php if ( Yii::app()->user->isAdministrador() || Yii::app()->user->isCoAdmin() ): ?>
	<div class="centrado">
		<a class="btn btn-default pull-center" href="<?php echo Yii::app()->request->baseUrl; ?>/soporte/Administrar" role="button">Ir Al Panel De Administración</a>
	</div>
<?php endif ?>
<br/><br/>