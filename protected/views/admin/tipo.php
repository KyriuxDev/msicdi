<table style="width:100%">
	<tr>
		<div id="dCriterio">
			<h3>Criterio</h3>
		</div>
	</tr>
	<tr>
		<td>
			<select id="selectFTipo" name="selectFTipo" onchange="onCambioS(this);" class="form-control">
                <option value="EQUAL">=</option>
                <option value="DIF">!= </option>
                <option value="LIKE">LIKE</option>
                <option value="LIKE..">LIKE %...%</option>
                <option value="NLIKE">NOT LIKE</option>
            </select>
		</td>
	</tr>
	<tr>
		<td>
			<div class="form-group">
				<table >
					<tr>
						<td width="100%">
							<input type="text" class="form-control" id="inptCriterio" name="inptCriterio" placeholder="Criterio de búsqueda">
						</td>
						<td>
							<div id="divForaneos">
								
							</div>
						</td>
					</tr>
				</table>
        	</div>
		</td>
	</tr>
	<tr>
		<td>
			<div id="dDescrip" style="color: red;">
				<h5>Obtiene todos los valores que contengan el mismo valor de búsqueda que se defina.</h5>
			</div>
		</td>
	</tr>
</table>

<script type="text/javascript">
	function onCambioS (elemento) {
		hmtl = "";
		switch(elemento.value){
			case 'EQUAL': hmtl = '<h5>Obtiene todos los valores que contengan el mismo valor de búsqueda que se defina.</h5>';
				break;
			case 'DIF': hmtl= '<h5>Obtiene todos los valores que contengan un valor totalmente diferente al de búsqueda que se defina.</h5>';
				break;
			case 'LIKE': hmtl = '<h5>Obtiene todos los valores que contengan el valor de búsqueda establecido, haciendo uso de los comodínes %</h5>';
				break;
			case 'LIKE..': hmtl = '<h5>Obtiene todos los valores que contengan en algúna parte de su valor el criterio de búsqueda definido</h5>';
				break;
			case 'NLIKE': hmtl = '<h5>Obtiene todos los valores que NO contengan el valor de búsqueda establecido, haciendo uso de los comodínes %</h5>';
				break;
		}
		$('#dDescrip').html(hmtl);
	}
</script>	