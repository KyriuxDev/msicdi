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
			<?php if ($isAdmin): ?>
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
			<?php endif ?>
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
			<?php if ($isAdmin): ?>
				<td>
					<a href="<?php echo Yii::app()->request->baseUrl; ?>/soporte/usuarios.html"><font color="white">Usuarios</font></a>
				</td>
				<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
				<td>
					<a href="<?php echo Yii::app()->request->baseUrl; ?>/soporte/categorias.html"><font color="white">Categorías</font></a>
				</td>
				<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
				<td>
					<a href="<?php echo Yii::app()->request->baseUrl; ?>/soporte/reportes.html"><font color="white">Resultados</font></a>
				</td>
			<?php endif ?>
			<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
			<td>
				<a href="<?php echo Yii::app()->request->baseUrl; ?>/soporte/perfil.html"><font color="white">Perfil</font></a>
			</td>
		</tr>
	</table>
</div>

<?php if ($models['Password'] == "613c9504bcef2ba34ea97febf9624dedbd068726" ): ?>
	<div id="mensaje-error">
		<table>
			<tbody>
				<tr>
					<td><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/alert.png"></td>
					<td><strong>&nbsp&nbspNota:&nbsp&nbsp&nbsp&nbsp</strong></td>
					<td>Por favor cambie su contraseña de acceso por una nueva contraseña.</td>
				</tr>
			</tbody>
		</table>
	</div>
<?php endif ?>

<?php if ( isset($_GET['state']) ): ?>
	<?php if ($_GET['state']): ?>
		<div id="mensaje-correcto">
			<table>
				<tbody>
					<tr>
						<td><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/suceso.png"></td>
						<td><strong>&nbsp&nbspSatisfactorio:&nbsp&nbsp&nbsp&nbsp</strong></td>
						<td>Informacion personal actualiza con éxito!.</td>
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
						<td>OOOPS algo salio mal, Inténtalo de nuevo más tarde..</td>
					</tr>
				</tbody>
			</table>
		</div>
	<?php endif ?>
<?php endif ?>

<div id="usuario-editar" >
		<form id="form-actualizar" name="form-actualizar" role="form" action="<?php echo Yii::app()->request->baseUrl; ?>/site/ActualizarPerfil.html" method="post">
			<input type="hidden" value="<?php echo Yii::app()->user->name; ?>" name="_matr" id="_matr" />
		   	<div class="form-group">
	      		<label for="name">Nombres (s)</label>
	    		  <input type="text" maxlength="49" value="<?php echo $models['nom']; ?>" class="form-control" readonly name="_nombres" id="_nombres">
	  		</div>
		   	<div class="form-group">
	      		<label for="name">Apellido Paterno</label>
	    		  <input type="text"  value="<?php echo $models['ap']; ?>" maxlength="49" class="form-control" readonly required name="_apPaterno" id="_apPaterno" >
	  		</div>
		   	<div class="form-group">
	      		<label for="name">Apellido Materno</label>
	    		  <input type="text"  value="<?php echo $models['am']; ?>" maxlength="49" class="form-control" readonly required name="_apMaterno" id="_apMaterno">
	  		</div>
	 	   	<div class="form-group">
	      		<label for="name">Contraseña</label>
	    		  <input type="password" value="sincambios" class="form-control" required name="_contra" id="_contra">
	  		</div>
	  		<div class="form-group">
	  			<table class="table">
	  				<tbody>
	  					<tr>
	  						<td>
	  							 <div class="form-group" style="display: none">
						      		<label for="name">Adscripción</label>
						      		<table>
						      			<tr>
						      				<td>
						      					<button type="button" onclick="showDialogAdscripcionPerfil();" class="btn btn-info">Seleccionar ...</button>
						      				</td>
						      				<td>
						      					<input type="text" value="<?php echo $models['cad']; ?>" class="form-control" readonly name="_adscrip" id="_adscrip" >
						      				</td>
						      			</tr>
						      		</table>
						  		</div>
	  						</td>
	  						<td>
	  							<div class="form-group" style="display: none">
	  								<label for="name">Categoría</label>
	  								<table>
	  									<tr>
	  										<td>
	  											<button type="button" onclick="showDialogCategoriaPerfil();" class="btn btn-info">Seleccionar ...</button>
	  										</td>
	  										<td>
	  											<input type="text" value="<?php echo $models['ccat']; ?>" class="form-control"  readonly name="_catego" id="_catego" >
	  										</td>
	  									</tr>
	  								</table>
						  		</div>
	  						</td>
	  					</tr>
	  					<!--<tr>
	  						<td>
	  							<button type="button" onclick="showDialogAdscripcionPerfil();" class="btn btn-info">Seleccionar ...</button>
	  						</td>
	  						<td>
	  							<button type="button" onclick="showDialogCategoriaPerfil();" class="btn btn-info">Seleccionar ...</button>
	  						</td>
	  					</tr>-->
	  				</tbody>
	  			</table>
	      		<label for="name">Correo Electrónico</label>
	    		<input type="text" value="<?php echo $models['correo']; ?>" maxlength="29" class="form-control" name="_email" id="_email" >
	  		</div>
	  		</br>
	  		<button type="submit" class="btn btn-success">Actualizar Información</button>
		</form>
	</div>



<?php
	$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
	    'id'=>'adscripcion',
	    'options'=>array(
				        'title'		=> '     Adscripcion - Haga Doble Click Sobre La Fila Para Seleccionar.', //titulo del modal
				        'autoOpen'	=> false,
				        'modal'		=> true,
				        'width'		=> 900,
				        'height'	=> 500,
				        'draggable' => false,
				        'resizable'	=> false,
				        'position' 	=> 'center',
				        'overlay' 	=> array(
				            'backgroundColor'	=> 'black',
				            'opacity'			=> 0.5,
				        ),
				        'close'		=> 'js:function(){$("body").removeClass("modal-open"); open=false;}',
				        'show' 		=> 'shake',
				        'hide' 		=> 'blind', 
						'buttons'	=> array(
							'Cancel'=>'js:function(){$(this).dialog("close");$("body").removeClass("modal-open"); open=false;}',//
						),

				    ),
	));
	    include("adscripcion.php");//Contenido del modal
		$this->endWidget('zii.widgets.jui.CJuiDialog');
?>

<?php
	$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
	    'id'=>'categoria',
	    'options'=>array(
				        'title'		=> '     Categoria - Haga Doble Click Sobre La Fila Para Seleccionar.', //titulo del modal
				        'autoOpen'	=> false,
				        'modal'		=> true,
				        'width'		=> 900,
				        'height'	=> 500,
				        'draggable' => false,
				        'resizable'	=> false,
				        'position' 	=> 'center',
				        'overlay' 	=> array(
				            'backgroundColor'	=> 'black',
				            'opacity'			=> 0.5,
				        ),
				        'close'		=> 'js:function(){$("body").removeClass("modal-open"); open=false;}',
				        'show' 		=> 'shake',
				        'hide' 		=> 'blind', 
						'buttons'	=> array(
							'Cancel'=>'js:function(){$(this).dialog("close");$("body").removeClass("modal-open"); open=false;}',//
						),

				    ),
	));
	    include("categoria.php");//Contenido del modal
		$this->endWidget('zii.widgets.jui.CJuiDialog');
?>