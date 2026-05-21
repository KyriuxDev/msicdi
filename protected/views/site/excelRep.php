<style>
	table{
		font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	    border-collapse: collapse;
	}
	table, th, td {
	    border: 1px solid black;
	}
	td,th{
		text-align: left;
		padding: 15px;
		margin: 0;
		width: 100%;
	}
</style>
<?php if ( isset($db) ): ?>
	<table>
		<tr bgcolor="#9c9c9c">
			<td>Número de rastreo</td>
			<td>Matrícula</td>
			<td>Reportador</td>
			<td>Número de serie</td>
			<td>Descripción de la falla</td>
			<td>Fecha de reporte</td>
			<td>Estado Actual</td>
			<td>Ultimo Cambio Realizado</td>
			<td>Encargado de Soporte</td>
			<td>Origen</td>
			<td>Area</td>
			<td>IP</td>
		</tr>
		<?php foreach ($db as $k): ?>
			<tr>
				<td><?php echo $k['NRastreo']; ?></td>
				<td><?php echo $k['Matricula']; ?></td>
				<td><?php echo $k['nombreReportador']; ?></td>
				<td><?php echo $k['nSerie']; ?></td>
				<td><?php echo $k['descripcionFalla']; ?></td>
				<td><?php echo $k['fechaReporte']; ?></td>
				<td><?php echo $k['status']; ?></td>
				<td><?php echo $k['ultimoCambio']; ?></td>
				<td><?php echo $k['soporte']; ?></td>
				<td><?php echo $k['ipOrigen']; ?></td>
				<td><?php echo $k['departamento']; ?></td>
				<td><?php echo $k['ipEquipo']; ?></td>

			
			</tr>	
		<?php endforeach ?>
	</table>
<?php endif ?>