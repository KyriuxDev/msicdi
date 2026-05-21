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
				<a href="<?php echo Yii::app()->request->baseUrl; ?>/soporte/categorias.html"><font color="white">Categorías</font></a>
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
	<?php if ($_GET['state']): ?>
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
						<td>OOOPS algo salio mal, Inténtalo de nuevo más tarde..</td>
					</tr>
				</tbody>
			</table>
		</div>
	<?php endif ?>
<?php endif ?>
<div id="div-usuario-temp">
	<div id="filtro" >
		<div class="input-group" >
			<span class="input-group-addon">Búsqueda: </span>
			<input type="text" id='criterioUsuario' class="form-control" onkeyup="solicitudAjaxUsuarios();" placeholder=" Nombre(s) / Matrícula">
		</div>	
		<script type="text/javascript">
			solicitudAjaxUsuarios();
		</script>	
		</div>

	<div id='logger-usuarios' >
	</div>
	<button style="margin-left:42%; margin-top:20px; margin-bottom:20px;"  type="button" id='hideshow' value='hide/show' class="btn btn-info">Agregar Usuario</button>
</div>


<div id="div-oculto" style="display:none">	
	<div id="usuario-form">
		<form role="form"   id="formUsuario" name="formUsuario" action="<?php echo Yii::app()->request->baseUrl; ?>/site/AgregarUsuario" onsubmit="return validaFormUsuario()" method="post">
			<div class="form-group">
	      		<label for="name">Matrícula</label>
	    		  <input autocomplete="off" type="text" maxlength="10" class="form-control"  onblur="ajaxIsMatriculaValida();" name="matricula" id="matricula" placeholder="Ingrese Una Matrícula">
	    		  <div id="resMatr"></div>
	    		  <div id="divUsuarioCont">
	    		  </div>
	  		</div>
		   	<div class="form-group">
	      		<label for="name">Nombres (s)</label>
	    		  <input type="text" disabled maxlength="49" number class="form-control" required name="nombres" id="nombres" placeholder="Nombre (s)">
	  		</div>
		   	<div class="form-group">
	      		<label for="name">Apellido Paterno</label>
	    		  <input type="text" disabled number maxlength="49" class="form-control" required name="apPaterno" id="apPaterno" placeholder="Apellido Paterno">
	  		</div>
		   	<div class="form-group">
	      		<label for="name">Apellido Materno</label>
	    		  <input type="text" disabled number maxlength="49" class="form-control" required name="apMaterno" id="apMaterno" placeholder="Apellido Materno">
	  		</div>
	 	   	<div class="form-group">
	      		<label for="name">Contraseña</label>
	    		  <input type="password" autocomplete="off" class="form-control"  name="contra" id="contra" placeholder="Ingrese Una Contraseña">
	  		</div>
	  		<div class="form-group">
	  			<!--<table class="table">
	  				<tbody>
	  					<tr>
	  						<td>
	  							 <div class="form-group">
						      		<label for="name">Adscripcion</label>
						    		<input type="text" number class="form-control" readonly name="adscrip" id="adscrip" placeholder="Pulse El Siguiente Boton">
						  		</div>
	  						</td>
	  						<td>
	  							<div class="form-group">
						      		<label for="name">Categoria</label>
						    		<input type="text" number class="form-control"  readonly name="catego" id="catego" placeholder="Pulse El Siguiente Boton">
						  		</div>
	  						</td>
	  					</tr>
	  					<tr>
	  						<td>
	  							<button type="button" onclick="showDialogAdscripcion();" class="btn btn-info">Seleccionar ...</button>
	  						</td>
	  						<td>
	  							<button type="button" onclick="showDialogCategoria();" class="btn btn-info">Seleccionar ...</button>
	  						</td>
	  					</tr>
	  				</tbody>
	  			</table>-->
	      		<label for="name">Correo Electrónico</label>
	    		<input type="text" number maxlength="29" class="form-control" name="email" id="email" placeholder="Ingrese Un Correo Electrónico (Opcional)">
	  		</div>
	  		<div class="form-group">
	      		<label for="rol">Nivel De Acceso.</label>
	    		 <select id="rol" name="rol" class="form-control">
	    			<option value="user">Usuario Estándar</option>
					<option value="coadmin">Co Administrador</option>
					<option value="admin">Administrador</option>
				</select>
	  		</div>
	  		<div id="errMatrNV"></div>
	  		<div id="errContrNV"></div>
	  		</br></br>
	  		<div id="div-btn">
	  			<button type="button" id="btnCancelarAlta" class="btn btn-danger">Cancelar Alta de Usuario</button>
	  			<button type="reset" onclick="limpiaForm();" class="btn btn-primary">Limpiar Formulario</button>
	  			<button type="submit" class="btn btn-success">Agregar Usuario</button>
	  		</div>
			
		</form>
	</div>
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
				        'close'		=> 'js:function(){$("body").removeClass("modal-open");}',
				        'show' 		=> 'shake',
				        'hide' 		=> 'blind', 
						'buttons'	=> array(
							'Cancel'=>'js:function(){$(this).dialog("close");$("body").removeClass("modal-open");}',//
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
				        'close'		=> 'js:function(){$("body").removeClass("modal-open");}',
				        'show' 		=> 'shake',
				        'hide' 		=> 'blind', 
						'buttons'	=> array(
							'Cancel'=>'js:function(){$(this).dialog("close");$("body").removeClass("modal-open");}',//
						),

				    ),
	));
	    include("categoria.php");//Contenido del modal
		$this->endWidget('zii.widgets.jui.CJuiDialog');
?>


<?php
	$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
	    'id'=>'edicion',
	    'options'=>array(
				        'title'		=> '   Actualizar Informacion del Usuario', //titulo del modal
				        'autoOpen'	=> false,
				        'modal'		=> true,
				        'width'		=> 500,
				        'height'	=> 600,
				        'draggable' => false,
				        'resizable'	=> false,
				        'position' 	=> 'center',
				        'overlay' 	=> array(
				            'backgroundColor'	=> 'black',
				            'opacity'			=> 0.5,
				        ),
				        'close'		=> 'js:function(){$("body").removeClass("modal-open");open=false;}',
				        'show' 		=> 'shake',
				        'hide' 		=> 'blind', 
						'buttons'	=> array(
							'Guardar Cambios' => 'js:function(){$("#form-actualizar").submit();}',
							'Cancel'=>'js:function(){$(this).dialog("close");$("body").removeClass("modal-open");open=false;}',
						),

				    ),
	));
	    include("editar.php");//Contenido del modal
		$this->endWidget('zii.widgets.jui.CJuiDialog');
?>

<script type="text/javascript">

	$('#matricula').keydown(function (e) {
	  if (e.keyCode == 13) {
	    e.preventDefault();
	    ajaxIsMatriculaValida();
	    document.getElementById("contra").focus();
	  }
	});

	/*$('#nombres').keydown(function (e) {
	  if (e.keyCode == 13) {
	    e.preventDefault();
	    document.getElementById("apPaterno").focus();
	  }
	});

	$('#apPaterno').keydown(function (e) {
	  if (e.keyCode == 13) {
	    e.preventDefault();
	    document.getElementById("apMaterno").focus();
	  }
	});

	$('#apMaterno').keydown(function (e) {
	  if (e.keyCode == 13) {
	    e.preventDefault();
	    document.getElementById("contra").focus();
	  }
	});*/

	$('#contra').keydown(function (e) {
	  if (e.keyCode == 13) {
	    e.preventDefault();
	    document.getElementById("email").focus();
	  }
	});

	/*$(document).ready(function() {
	    $("#matricula").keydown(function(event) {
	    	// Permitir Solamente backspace and delete y tab
	    	if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9  ) {
	    		// Permitir, No Hacer Nada
	    	}
	    	else {
	    		// Si no es un numero, se elimina la accion
	    		if (event.keyCode < 48 || event.keyCode > 57 ) {
	    			event.preventDefault();	
	    		}	
	    	}
	    });
	});*/


	jQuery(document).ready(function(){

	jQuery('#btnCancelarAlta').live('click',function(event){
		$("#div-usuario-temp").css("display","block");
		$("#div-oculto").css("display","none");
	});
    jQuery('#hideshow').live('click', function(event) {     
    	$("#div-oculto").css("display","block");
    	$("#div-usuario-temp").css("display","none");
    	/*val = $('#div-oculto').css('display');
    	if( val == 'none'){
			$("#div-oculto").css("display","block");
			$(window).scrollTop($('#hideshow').position().top); 
			$('#hideshow').text('Cancelar Alta de Usuario');
			$("#hideshow").removeClass('btn-success').addClass('btn-danger');
			$("#div-usuario-temp").css("display","none");
    	}else{
			$("#div-oculto").css("display","none");
			$(window).scrollTop($('#logger-usuarios').position().top); 
			$('#hideshow').text('Agregar Usuario');
			$("#hideshow").removeClass('btn-danger').addClass('btn-success');
			
    	}*/
        
    });
});
</script>
