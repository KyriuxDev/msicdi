	<div class="container">
	  <ul class="nav nav-tabs nav-justified" role="tablist">
	    <li id="agrHW" class="active"><a href="javascript:insertaHW();">Agregar Nuevo Hardware</a></li>
	    <li id="edHW"><a href="javascript:editaHW();">Editar Hardware Existente</a></li>       
	  </ul>
	</div>
	<br><br><br>
<div id="insertHW" style="display:none">
	<table class="table">

		<tr>
			<td style="width:120px !important;"><strong>Nombre de tipo:</strong></td>
			<td>
				<input class="form-control" type="text" id="tipoNuevo" placeholder="Nombre de tipo">
			</td>
		</tr>
		<tr>
			<td><strong>Marca</strong></td>
			<td>
				<input class="form-control" type="text" id="marcaNueva" placeholder="Marca">
			</td>
		</tr>
		<tr>
			<td><strong>Modelo</strong></td>
			<td>
				<input class="form-control" type="text" id="marcaNueva" placeholder="Marca">
			</td>
		</tr>
	</table>
	<button class="btn btn-success" type="button" onclick="insertandoHW();">
	 	Agregar
	</button>

</div>

<div id="editarHW" style="display:none" >
	<table class="table">
		<tr class="success">
			<th>Tipo</th>
			<th>Marca</th>
			<th>Modelo</th>
		</tr>
		<tr>
			<td>
				<select class="form-control" id="tipoEd" onchange="tipo2();"></select>
			</td>
			<td>
				<select class="form-control" id="marcaEd" onchange="marca2();" ></select>
			</td>
			<td>
				<select class="form-control" id="modeloEd" onchange="onloadHW();"></select>
			</td>
		</tr>
	</table>
	<table class="table">
		<tr class="info">
			<th>Nuevo Valor (Tipo)</th>
			<th>Nuevo Valor (Marca)</th>
			<th>Nuevo Valor (Modelo)</th>
		</tr>
		<tr>
			<td>
				<input class="form-control" type="text" id="actualizaTipo" placeholder="Tipo"/>
			</td>
			<td>
				<input class="form-control" type="text" id="actualizaMarca" placeholder="Marca"/>
			</td>
			<td>
				<input class="form-control" type="text" id="actualizaModelo" placeholder="Modelo"/><br>
			</td>
		</tr>
	</table>
	<input  type="text" id="actualizaId" placeholder="Id" readonly="true" style="display:none" />
	<button class="btn btn-success" type="button" onclick="actualizandoHW();">
	 	Actualizar
	</button>

</div>
<script type="text/javascript">
	insertaHW();
</script>