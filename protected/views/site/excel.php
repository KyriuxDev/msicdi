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
		<tr bgcolor="#adff2f">
			<?php foreach ($columnas as $k): ?>
				<td><?php echo $k[0]; ?></td>
			<?php endforeach ?>	
		</tr>
		<?php foreach ($db as $d): ?>
			<tr>
				<?php foreach ($columnas as $k): ?>
					<td>
						<?php echo $d[$k[0]]; ?>
					</td>
				<?php endforeach ?>
			</tr>
		<?php endforeach ?>
	</table>
<?php endif ?>