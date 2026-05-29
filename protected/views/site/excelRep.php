<style>
	table{
		font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	    border-collapse: collapse;
	}
	table, th, td {
	    border: 1px solid black;
	}
	td, th {
		text-align: left;
		padding: 15px;
		margin: 0;
		width: 100%;
	}
</style>
<?php if ( isset($db) ): ?>
	<?php
		$totalReportes = count($db);
		$totalHelix    = 0;
		foreach ($db as $k) {
			if (!empty($k['codigoHelix'])) $totalHelix++;
		}
		$porcentaje = $totalReportes > 0 ? round(($totalHelix / $totalReportes) * 100, 1) : 0;
	?>

	<!-- ── Tabla 1: Resumen Helix (separada, no interfiere con filtros) ── -->
	<table>
		<tr bgcolor="#9c9c9c">
			<td>Total de reportes</td>
			<td>En Helix</td>
			<td>Sin Helix</td>
			<td>Cobertura Helix</td>
		</tr>
		<tr>
			<td><?php echo $totalReportes; ?></td>
			<td><?php echo $totalHelix; ?></td>
			<td><?php echo ($totalReportes - $totalHelix); ?></td>
			<td><?php echo $porcentaje; ?>%</td>
		</tr>
	</table>

	<!-- Fila en blanco de separación -->
	<br/>

	<!-- ── Tabla 2: Datos (el usuario filtra aquí sin afectar el resumen) ── -->
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
			<td>Código Helix</td>
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
				<td><?php echo !empty($k['codigoHelix']) ? $k['codigoHelix'] : ''; ?></td>
			</tr>
		<?php endforeach ?>
	</table>
<?php endif ?>