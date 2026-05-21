<div id="contentDatos">
	<table style="margin-bottom: -5px !important;" class="table">
		<tr class="success">
			<th style="width:200px !important;">Tipo</th>
			<th>Marca</th>
			<th>Modelo</th>
		</tr>
		<tr valign="center">
			<td>
				<select style="width:100%; margin-top: -0.5px !important;" class="form-control" id="tipoM" disabled="true" onchange="selectedTipo();"  style="width:200px;" ></select>
			</td>
			<td>
				<select  style="width:100%; margin-top: -0.5px !important;" class="form-control" id="marca" disabled="true" style="width:200px;" onchange="selectedMarca();" title="Doble Click para seleccionar" ></select>
			</td>
			<td>
				<select style="width:100%; margin-top: -0.5px !important;" class="form-control" id="model" disabled="true"  style="width:200px;"></select>
			</td>
		</tr>
	</table>
	<table style="margin-bottom: -5px !important;" class="table">
		<tr class="success">
			<th style="width:200px !important;">Serie</th>
			<th>Serie Monitor</th>
			<th>Status</th>
		</tr>
		<tr valign="center">
			<td>
				<input class="form-control" type="text" id="serie" placeholder="Serie" disabled="true" size="22"/>
			</td>
			<td>
				<input class="form-control" type="text" id="serieMonitor" placeholder="Serie Monitor" disabled="true" size="22"/>
			</td>
			<td>
				<select style="width:100%; margin-top: -0.5px !important;" class="form-control" id="status" disabled="true"style="width:200px;"></select>
			</td>
		</tr>
	</table>
	<table style="margin-bottom: -5px !important;" class="table">
		<tr class="success">
			<th style="width:200px !important;">PREI</th>
			<th>Unidad</th>
			<th>Departamento</th>
		</tr>
		<tr valign="center">
			<td>
				<input class="form-control"  type="text" id="prei" placeholder="PREI" disabled="true" size="22" readonly="true" /></td>
			</td>
			<td>
				<select style="width:100%; margin-top: -0.5px !important;" class="form-control" disabled="true" id="unidad" style="width:340px;" onchange="cargaUI(); cargaDepto();" ></select>
			</td>
			<td>
				<select style="width:100%; margin-top: -0.5px !important;" class="form-control" disabled="true" id="depto" style="width:330px;" ondblclick="cargaDP();" title="Doble click para seleccionar"></select>
			</td>
		</tr>
	</table>
	<table class="table">
		<tr class="success">
			<th style="width:200px !important;">NNI</th>
			<th>Editar</th>
		</tr>
		<tr valign="center">
			<td>
				<input class="form-control" type="text" id="nni" placeholder="NNI" disabled="true" readonly="true" size="20"/>
			</td>
			<td>
				<a href="#" style="display:none" id="editHW"> 
					<img width="20px" height="20px" onclick="actualizaHW();" src="<?php echo Yii::app()->request->baseUrl; ?>/images/edit.png">
				</a> 
			</td>
		</tr>
	</table>
	<!--hr></hr-->

	<!--<div id="botones">
		<input type="button" value="Informacion de la unidad" onclick="showUnidad();">
		<input type="button" value="Direccion de la unidad" onclick="showDireccion();">
		<input type="button" value="Informacion del equipo" onclick="showEquipo();">
		<input type="button" value="Informacion adicional" onclick="showAdicional();">
	</div>-->
	<div class="container">                
	  <ul class="nav nav-tabs nav-justified" role="tablist">
	    <li id="uni" class="active"><a href="javascript:showUnidad();">Información de Unidad</a></li>
	    <li id="dire"><a href="javascript:showDireccion();">Dirección de la Unidad</a></li>
	    <li id="equi"><a href="javascript:showEquipo();">Información del Equipo</a></li>
	    <li id="info"><a href="javascript:showAdicional();">Información Adicional</a></li>        
	  </ul>
	</div>
	<br>
	<div id="INFOunidad" >
		<?php include_once("unidad.php");?>
	</div>
	<div id="DIRunidad" style="display:none;" >
		<?php include_once("dir.php");?>
	</div>
	<div id="INFOequipo" style="display:none;" >
		<?php include_once("equipo.php");?>
	</div>
	<div id="INFOadicional" style="display:none;" >
		<?php include_once("adicional.php");?>
	</div>
</div>
<?php
	$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
	    'id'=>'datos3',
	    'options'=>array(
				        'title'=>'Hardware', //titulo del modal
				        'autoOpen'=>false,
				        'closeOnEscape' => false, 
				        'modal'=>true,
				        'width'=>1000,
				        'height'=>500,
				        'resizable'=>false,
				        'draggable' => false,
				        'overlay'=>array('backgroundColor'=>'#000',//color de fondo al abrir el modal
				        				 'opacity'=>'0.5'
				        				),
						'buttons'=>array(
						'Guardar'=>'js:function(){guardarC();}',// boton que actualizara los datos
						'Cancel'=>'js:function(){$(this).dialog("close");}',// cancela toda operación & recarga la pagina de busuqeda
						),
				    ),
	));
	include("hw.php");
	$this->endWidget('zii.widgets.jui.CJuiDialog');
?>

<?php
	$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
	    'id'=>'datos2',
	    'options'=>array(
				        'title'=>'Sistemas Operativos', //titulo del modal
				        'autoOpen'=>false,
				        'closeOnEscape' => false, 
				        'modal'=>true,
				        'width'=>800,
				        'height'=>500,
				        'resizable'=>false,
				        'draggable' => false,
				        'overlay'=>array('backgroundColor'=>'#000',//color de fondo al abrir el modal
				        				 'opacity'=>'0.5'
				        				),
						'buttons'=>array(
						'Cancel'=>'js:function(){$(this).dialog("close");}',// cancela toda operación & recarga la pagina de busuqeda
						),
				    ),
	));
	     include("editSO.php");
		$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
