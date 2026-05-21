<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />	
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-2.1.1.min.js" ></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/APP.js" ></script>
</head>
<br/><br/><br/>
<div id="filtro" >
	<div class="input-group" > 
		<span class="input-group-addon">B&uacute;squeda: </span>
		<input type="text" id='criterio' class="form-control" onkeyup="solicitudAjax();" placeholder="NNI / Serie / Ubicación / Descripción / Usuarios / Marca">
	</div>
	<div align="right" id="cdiv">
	<select id="limite" onchange="solicitudAjax();"  name="limite">
		<?php 
			for ($i=10; $i <= 100; $i+=10) { 
				echo "<option value=\"{$i}\">{$i}</option>";
			}
	 	?>
	</select>	
	<script type="text/javascript">
		solicitudAjax();
	</script>	
	</div>
</div>

<br/><br/><br/>
<div id='logger' style="border-left: 2px rgb(103,159,202) solid; border-right: 2px rgb(88,146,197) solid;">
</div>
<?php
	$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
	    'id'=>'datos',
	    'options'=>array(
				        'title'=>'Información General', //titulo del modal
				        'autoOpen'  => false,
                        'modal'     => true,
                        'width'     => 1050,
                        'height'    => 600,
                        'draggable' => false,
                        'resizable' => false,
                        'position'  => 'center',
				        'overlay'=>array('backgroundColor'=>'#000',//color de fondo al abrir el modal
				        				 'opacity'=>'0.5'
				        				),
				        'close'     => 'js:function(){$("body").removeClass("modal-open");  $("input").prop("disabled", false);}',
						'buttons'=>array(
						'Editar'=>'js:function(){editar();}',	// habilitar campos para editar
						'Guardar'=>'js:function(){guardarC();}',// boton que actualizara los datos
						'Cancel'=>'js:function(){javascript:location.reload();}',// cancela toda operación & recarga la pagina de busuqeda
						),
				    ),
	));
	     include("datos.php");//Contenido del modal -- 
		$this->endWidget('zii.widgets.jui.CJuiDialog');
?>