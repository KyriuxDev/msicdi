
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


<?php if ( isset($_GET['state']) ): ?>
	<?php if ( $_GET['state'] ): ?>
		<div id="mensaje-correcto">
			<table>
				<tbody>
					<tr>
						<td><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/suceso.png"></td>
						<td><strong>&nbsp&nbspSatisfactorio:&nbsp&nbsp&nbsp&nbsp</strong></td>
						<td>Accion realizada con éxito!.</td>
					</tr>
				</tbody>
			</table>
		</div>
	<?php else: ?>
		<div id="mensaje-error">
			<table>
				<tbody>
					<tr>
						<td><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/alert.png"></td>
						<td><strong>&nbsp&nbspAdvertencia:&nbsp&nbsp&nbsp&nbsp</strong></td>
						<td>OOOPS algo salio mal, Intentalo de nuevo más tarde..</td>
					</tr>
				</tbody>
			</table>
		</div>
	<?php endif ?>
<?php endif ?>


<div id="categorias">
	<font color="green" size="4px">Gestionar Categorias [<a href="javascript:abCategoria();">?</a>]</font>
	</br></br>
	<table class="table table-striped table-bordered">
		<tbody>
		<tr>
			<th>ID</th>
			<th>Categoría</th>
			<th>Visibilidad</th>
		</tr>
		<?php foreach($models as $model): ?>
			<tr>
				<td><?php echo $model['idStatus']; ?></td>
				<td><?php echo $model['Status']; ?></td>
				<td>
				    &nbsp&nbsp&nbsp&nbsp&nbsp
					<input type="radio" onchange="actualizarVisibilidad(this.name);" onclick="radioClick()"  name="<?php echo $model['idStatus']; ?>_radio" <?php if($model['visibilidad']=='Admin') echo "checked"; ?> value="Admin" /> Administrador &nbsp&nbsp&nbsp&nbsp&nbsp
					<input type="radio" onchange="actualizarVisibilidad(this.name);"  onclick="radioClick()" name="<?php echo $model['idStatus']; ?>_radio" <?php if($model['visibilidad']=='Todos') echo "checked"; ?> value="Todos" /> Todos 

				</td>
			</tr>  
		<?php endforeach; ?>
		</tbody>
	</table>
	<?php 
		$this->widget('CLinkPager', array(
	    'pages' => $paginas, 'header' => 'Ir a la Pagina: ','prevPageLabel'=>'< Anterior','nextPageLabel'=>'Siguiente >','firstPageLabel'=>'Primera Pagina','maxButtonCount'=>10,)
		) 
	?>
	<div id="categoria">
		<font color="green" size="3px">>> Agregar Nueva Categoría</font>
		</br></br></br></br>
		<div style="width:50%;">
			<form action="<?php echo Yii::app()->request->baseUrl; ?>/site/agregarCategoria.html" method="post"> 
				<div class="form-group">
					<font size="3px" style="padding-bottom:-20px;">Nombre de categoriía (Máximo 30 caracteres)</font>
					<input type="text" maxlength="30" class="form-control"  name="categoria" id="categoria" placeholder="Nombre de categoría">
				</div>
				<button type="submit" class="btn btn-success">Agregar Categoría</button>
			</form>
		</div>
	</div>

	<div id="categoria">
		<font color="green" size="3px">>> Renombrar Categoría</font>
		</br></br></br></br>
		<div style="width:50%;">
			<form method="post" action="<?php echo Yii::app()->request->baseUrl; ?>/site/renombrarCategoria.html">
				<table style="width:100%">
					<tbody>
						<tr>
							<td style="width:35%">
								<font size="3px">Nombre Anterior:</font>
							</td>
							<td>
								<select id="nAnt" name="nAnt" class="form-control">
		    								<?php foreach($res as $model): ?>
		    									<option value="<?php echo $model['idStatus']; ?>"><?php echo $model['Status']; ?></option>
											<?php endforeach; ?>
								</select>	
							</td>
							<tr>
								<td>
									<font size="3px">Nuevo Nombre :</font>
								</td>
								<td>
									<input type="text" maxlength="30" class="form-control"  name="_categoria" id="_categoria" placeholder="Nuevo Nombre de categoría">
								</td>
							</tr>
						</tr>
					</tbody>
				</table>
				</br>
				<button type="submit" class="btn btn-success">Cambiar Nombre</button>
			</form>
		</div>	
	</div>
</div>




































