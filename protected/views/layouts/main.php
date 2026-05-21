<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.bmp" type="image/vnd.microsoft.icon">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/slider.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/fileinput.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/pnotify.custom.min.css" />
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-2.1.1.min.js" ></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/APP.js" ></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js" ></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/Chart.min.js" ></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/placeholders.jquery.min.js" ></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/fileinput.min.js" ></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/fileinput_locale_es.js" ></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/placeholders.jquery.min.js" ></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/pnotify.custom.min.js" ></script>
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body >
<?php error_reporting(E_ALL); ?>
<div class="container" id="page">
	<div id="header">
		<div id="logo"> <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo_imss_0.png" width="65px"></div>
		<div id="Leyenda" align="right">
			INSTITUTO MEXICANO DEL SEGURO SOCIAL<br/>
			COORDINACIÓN DELEGACIONAL DE INFORMATICA OAXACA<br/>
			SISTEMA DE REPORTES DE FALLAS Y CONTROL DE INVENTARIO DE CÓMPUTO<br/><br/>
		</div>
	</div>
	<div class="mainmenu">
    <?php $this->widget('application.extensions.mbmenu.MbMenu',array( 
            'items'=>array( 
                array('label'=>'Inicio', 'url'=>array('/inicio')), 
                array('label'=>'Informacion', 
                  'items'=>array( 
	                    array('label'=>'Catalogo', 
	                      'items'=>array( 
	                        array('label'=>'Municipios de Oaxaca', 'url'=>array('#')), 
	                        array('label'=>'Sub 2', 'url'=>array('#')), // 2
	                        array('label'=>'Sub 2', 'url'=>array('#')), // 3
	                        array('label'=>'Sub 2', 'url'=>array('#')), // 4
	                        array('label'=>'Sub sub 2', 'url'=>array('#')), // 5
	                        array('label'=>'Sub sub 2', 'url'=>array('#')), // 6
	                      ), //3er nivel - Dentro de catalogo
	                    ), //2do nivel - Catalogo
                  ),//primer nivel   INFORMACIÓN 
                'visible' => false),
                array('label' => 'Levantar Reporte','url' => array('/soporte/index'), 'visible' => Yii::app()->user->isGuest),

                array('label'=>'Soporte',
                  'items'=>array( 
	                    array('label'=>'Página de Soporte', 'url'=>array('/soporte/index') ),
	                    array('label'=>'Administrar Reportes', 'url'=>array('/soporte/administrar'), 'visible' => (Yii::app()->user->isAdministrador() || Yii::app()->user->isCoAdmin())),
                        array('label'=>'Gerardo','url'=>array('/soporte/gerardo'), 'visible'=> (Yii::app()->user->nombreCorto=='ZARATE GERARDO')),
                  ),
                  'visible' => !Yii::app()->user->isGuest,
                ),
                //Avisos de Bienes se queda público
                array('label'=>'Avisos Bienes', 'url'=>'http://11.1.21.171/bienes','linkOptions' => array('target'=>'_blank')),
				
                array('label'=>'Monitores', //en sesión
                  'items'=>array( 
	                    array('label'=>'Monitor SIMF', 'url'=>'http://11.1.21.5/monitor/monitorsimf.php','linkOptions' => array('target'=>'_blank'),  'visible' => (Yii::app()->user->isAdministrador() || Yii::app()->user->isCoAdmin())),
	                    array('label'=>'Monitor Impresoras', 'url'=>'http://11.1.21.5/monitor/monitorimpr.php','linkOptions' => array('target'=>'_blank'),  'visible' => (Yii::app()->user->isAdministrador() || Yii::app()->user->isCoAdmin())),
                        array('label'=>'Monitor CIH', 'url'=>'http://11.1.21.5/monitor/monitorcih.php','linkOptions' => array('target'=>'_blank'),  'visible' => (Yii::app()->user->isAdministrador() || Yii::app()->user->isCoAdmin())),
                        array('label'=>'Monitor Biométricos', 'url'=>'http://11.1.21.5/monitor/monitorbiome.php','linkOptions' => array('target'=>'_blank'),  'visible' => (Yii::app()->user->isAdministrador() || Yii::app()->user->isCoAdmin())),
                  ),
                  'visible' => !Yii::app()->user->isGuest, //revisar si se quita para que se vea hasta que inicien sesión o solo con las líneas de arriba y ya no se pone esta linea
                ),
                //hasta acá se modificó para meter los monitores y lo de bienes

		//modificando para poner las incidicencias de CDI
		array('label'=>'Incidencias CDI','url'=>'http://11.1.21.5/msicdi/incidenciascdi','linkOptions' => array('target'=>'_blank'), 'visible'=>!Yii::app()->user->isGuest),
		//termina área del botón para incidencias cdi

                array('label'=>'Administrar',
                    'items'=>array(
                        array('label'=>'Inventario','url'=>array('/admin/inventario'), 'visible'=>!Yii::app()->user->isGuest),
                        array('label'=>'Reporte Inventario','url'=>array('/admin/reporteinv'), 'visible'=>!Yii::app()->user->isGuest))
                ),
                array('label'=>'CCT 2013-2015', 'url'=>array('#'),'visible' => false),
				array('label'=>'MAAGTIC-SI', 'url'=>array('#'),'visible' => false),
				array('label'=>'Acerca de', 'url'=>array('/site/acerca')),
				array('label'=>'Desarrollador', 'items'=>array(array('label'=>'Consultar API','url'=>'/msicdi/api'),), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Entrar', 'url'=>array('/inicio/acceso'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Salir ('.Yii::app()->user->nombreCorto.')', 'url'=>array('/inicio/salir'), 'visible'=>!Yii::app()->user->isGuest,'htmlOptions' => array('id' => 'lolen','onclick' => 'onOverMenu();'))
            ), 
    )); ?>
	</div>	<!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
			'homeLink'=>CHtml::link('Inicio', Yii::app()->homeUrl), 
		)); ?><!-- breadcrumbs -->	
	<?php endif?>	

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
	<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/pie_pagina.png" width="100%"><br/><br/>
		Copyright &copy; <?php echo date('Y'); ?><br/>
		Algunos derechos reservados.<br/>
	</div><!-- footer -->

</div><!-- page -->
<input id="usuarioLogueado" type="hidden" value="<?php echo Yii::app()->user->name; ?>"/>
</body>
</html>


<script type="text/javascript">

	$(document).ready(function(){
		if( $('#usuarioLogueado').val() != 'Guest' ){
			obtenerNotificaciones();
			window.setInterval(function(){
			  obtenerNotificaciones();
			}, 5000);
		}
	});


</script>


<!--Start of Tawk.to Script
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/58e50935f7bbaa72709c4592/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
End of Tawk.to Script-->