<div id="usuario-editar" >
		<form id="form-actualizar" onsubmit="return validarFormEdicion()" name="form-actualizar" role="form" action="<?php echo Yii::app()->request->baseUrl; ?>/site/ActualizarInfo" method="post">
			<input type="hidden" name="_matr" id="_matr" />
		   	<div class="form-group">
	      		<label for="name">Nombres (s)</label>
	    		  <input type="text" maxlength="49" number class="form-control" readonly required name="_nombres" id="_nombres" >
	  		</div>
		   	<div class="form-group">
	      		<label for="name">Apellido Paterno</label>
	    		  <input type="text" number maxlength="49" class="form-control" readonly required name="_apPaterno" id="_apPaterno">
	  		</div>
		   	<div class="form-group">
	      		<label for="name">Apellido Materno</label>
	    		  <input type="text" number maxlength="49" class="form-control" readonly required name="_apMaterno" id="_apMaterno">
	  		</div>
	 	   	<div class="form-group">
	      		<label for="name">Contraseña</label>
	    		  <input type="password"  class="form-control" required name="_contra" id="_contra">
	  		</div>
	  		<div class="form-group" >
	  			<table class="table">
	  				<tbody>
	  					<tr>
	  						<td>
	  							 <div class="form-group" style="display: none">
						      		<label for="name">Adscripcion</label>
						    		<input type="text" number class="form-control" readonly name="_adscrip" id="_adscrip">
						  		</div>
	  						</td>
	  						<td>
	  							<div class="form-group" style="display: none">
						      		<label for="name">Categoria</label>
						    		<input type="text" number class="form-control"  readonly name="_catego" id="_catego" >
						  		</div>
	  						</td>
	  					</tr>
	  					<tr>
	  						<td>
	  							<button style="display: none" type="button" onclick="showDialogAdscripcion();" class="btn btn-info">Seleccionar ...</button>
	  						</td>
	  						<td>
	  							<button style="display: none" type="button" onclick="showDialogCategoria();" class="btn btn-info">Seleccionar ...</button>
	  						</td>
	  					</tr>
	  				</tbody>
	  			</table>
	      		<label for="name">Correo Electronico</label>
	    		<input type="text" number maxlength="29" class="form-control" name="_email" id="_email">
	  		</div>
	  		<div class="form-group">
	      		<label for="rol">Nivel De Acceso.</label>
	    		 <select id="_rol" name="_rol" class="form-control">
				</select>
	  		</div>
	  		<div id="divErrContra">
	  			
	  		</div>
		</form>
	</div>