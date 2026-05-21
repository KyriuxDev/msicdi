    <link rel="stylesheet" type="text/css" href="/msicdi/css/Noti/style_light.css">
    <script type="text/javascript" src="/msicdi/js/Noti/jquery.min.js"></script>
    <script src="/msicdi/js/Noti/jquery-ui-1.8.14.custom.min.js" type="text/javascript"></script>
    <script src="/msicdi/js/Noti/ttw-notification-menu.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="/msicdi/css/Noti/style.css">
    <link rel="stylesheet" type="text/css" href="/msicdi/css/Noti/uniform.css">
    <script type="text/javascript" src="/msicdi/js/Noti/jquery.tools.js"></script>
    <script type="text/javascript" src="/msicdi/js/Noti/jquery.uniform.min.js"></script>
    <script type="text/javascript" src="/msicdi/js/Noti/main.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/trunk8.js"></script>
    <?php
	/**	
	 * [statusCase Obtiene el color que corresponde a cada estado en concreto]
	 * @param  [String] $caso [El estado del reporte]
	 * @return [String]       [El color que le corresponde al reporte]
	 * @since 1.0.1 Se introdujo este elemento
	 * @author González Santiago Héctor Florencio
     * @copyright Copyright (c) 2015, González Héctor <hector@devoaxaca.com>
     * @version 1.0.1
     * @package protected.views.function
     * @category Función
	 */
	function statusCase($caso){
		$color = "black";
		switch ($caso) {
			case 'Nuevo':
				$color = "Red";
				break;
		case 'Proceso':
				$color = "Orange";
				break;
		case 'Resuelto':
				$color = "Green";
				break;
			default:
				$color = "Black";
				break;
		}
		return'<font color="'.$color.'">'.$caso.'</font>';
	}
	/**
	 * [isActivado Verifica que un elemento se encuentre dentro de un arreglo dado]
	 * @param  [String]  $busqueda [Elemento que se buscará en el Arreglo]
	 * @param  [Array]  $donde    [Arreglo en el cuál se buscará el elemento]
	 * @return boolean           [Si el arreglo se encuentra en el arreglo]
	 * @since 1.0.1 Se introdujo este elemento
	 * @author González Santiago Héctor Florencio
     * @copyright Copyright (c) 2015, González Héctor <hector@devoaxaca.com>
     * @version 1.0.1
     * @package protected.views.function
     * @category Función
	 */
	function isActivado($busqueda,$donde){
		return in_array($busqueda, $donde);
	}
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
			<td>&nbsp&nbsp&nbsp&nbsp&nbsp</td>
			<td>
	    		<li id="notiNuevos" class="notification-menu-item first-item"><a><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/inbox.png"></a></li> 
			</td>
			<td>&nbsp&nbsp&nbsp&nbsp</td>
			<td>
	    		<li id="notiAbiertos" class="notification-menu-item first-item"><a href="javascript:notificaciones();"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/proceso.png"></a></li>
			</td>
			<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
			<td>
	    		<li id="notiMensajes" class="notification-menu-item first-item"><a href="javascript:notificaciones();"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/mensaje.png"></a></li>
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
					<a href="<?php echo Yii::app()->request->baseUrl; ?>/soporte/categorias.html"><font color="white">Categorias</font></a>
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
			<td>&nbsp&nbsp&nbsp&nbsp&nbsp</td>
			<td>
	    		<li  class="notification-menu-item"><font color="white">Nuevos</font></li>
			</td>
			<td>&nbsp&nbsp&nbsp&nbsp</td>
			<td>
	    		<li  class="notification-menu-item"><font color="white">Abiertos</font></li>
			</td>
			<td>&nbsp&nbsp&nbsp&nbsp</td>
			<td>
	    		<li  class="notification-menu-item"><font color="white">Mensajes</font></li>
			</td>
		</tr>
	</table>
</div>


<div id="div-centrado">
	<h4>Reportes</h4>
</div>
<div id="div-derecha">
	<a href="<?php echo Yii::app()->request->baseUrl; ?>/soporte/reportar">+ Agregar Nuevo Reporte.</a>
</div>
<?php if (sizeof($models) == 0): ?>
	<div id="mensaje-error">
		<table>
			<tbody>
				<tr>
					<td><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/alert.png"></td>
					<td><strong>&nbsp&nbspAdvertencia:&nbsp&nbsp&nbsp&nbsp</strong></td>
					<td>No se han encontrado coincidencias, Intente hacer una búsqueda general.</td>
				</tr>
			</tbody>
		</table>
	</div>
<?php endif ?>
<div id="reportes-admin">
	<table class="table table-striped table-bordered">
		<tbody>
		<tr>
			<th>Número Seguimiento</th>
			<th>Usuario</th>
			<th>Encargado</th>
			<th>Estado</th>
			<th>Falla</th>
		</tr>
		<?php foreach($models as $model): ?>
			<tr>
				<td><a href="<?php echo Yii::app()->request->baseUrl; ?>/soporte/rastreo?codigo=<?php echo $model['NRastreo']; ?>"><?php echo $model['NRastreo']; ?></a></td>
				<td><?php echo $model['nombreReportador'];?></td>

				<td><?php echo $model['soporte']; ?></td>

				<td><?php echo statusCase($model['status']); ?></td>
				<td class="span6"><div class="fallaWrapper"><?php echo $model['descripcionFalla']; ?></div></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>

	<?php
		$this->widget('CLinkPager', array(
	    'pages' => $paginas, 'header' => 'Ir a la Pagina: ','prevPageLabel'=>'< Anterior','nextPageLabel'=>'Siguiente >','firstPageLabel'=>'Primera Pagina','maxButtonCount'=>10,)
		)
	?>
</div>

<div id="div-filtro">
	<font size="4" color="green">>> Mostrar Reportes.</font></br></br>
	<form role="form"   id="formFiltro" name="formFiltro" action="<?php echo Yii::app()->request->baseUrl; ?>/soporte/administrar.html" onsubmit="return limpiaFormFiltrado()" method="post">
		<table class="table">
			<tbody>
				<?php for ( $i = 0; $i < sizeof( $filtros ); $i+=5 ) {?>
					<tr>
						<?php 
							if ( sizeof( $filtros ) < ( $i +5) )
								$tope = sizeof( $filtros );
							else
								$tope = $i+5;
							for ( $j = $i ; $j < $tope ; $j++) { 
								?>
								<td style="vertical-align:middle !important">					
									<div class="checkbox">
									  <label>
									    <input type="checkbox" <?php if(  in_array( $filtros[$j]['stat'], $filtrCompact ) ) echo "checked"; ?> name="<?php echo $filtros[$j]['stat'] ?>" id="<?php echo $filtros[$j]['stat'] ?>">
									    <?php echo $filtros[$j]['stat'] ?>
									  	</label>
									</div>
							 	</td>
								<?php 
							}
						?>
					</tr>
				<?php } ?>
				<tr>
					<td style="vertical-align:middle !important">
						<div class="checkbox">
							<label>
							<input type="checkbox" <?php if($chkTodos) echo 'checked'; ?> name="chkMostratTodos" id="chkMostratTodos">
							Mostrar todos.
							</label>
						</div>
					</td>
					<td style="vertical-align:middle !important">
						Encargado :
					</td>
					<td colspan="3" >
						<select id="filtrSoporte" name="filtrSoporte" class="form-control">
							<option value="nada">Seleccione un encargado ...</option>
		    				<?php foreach ($soportes as $sop): ?>
		    					<option value="<?php echo $sop['nom'];  ?>"><?php echo $sop['matr'].' - '.$sop['nom']; ?></option>
		    				<?php endforeach ?>
						</select>	
					</td>
				</tr>
			</tbody>
		</table>
		<input type="hidden" id="hPage" value="1" name="hPage" />
		<a href="javascript:menajiando();"><font color="Red">Avanzadas:  </font><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/unlock.png"></a></br></br></br>
		<div class="<?php echo ($avanzada)?'div-normal':'div-temporal';?>" id="divAvanzados">
			<div class="form-group">
				<input type="text" class="form-control" name="nSegAvanz" id="nSegAvanz"  value="<?php echo $crAva; ?>" placeholder="Número de seguimiento / Matrícula / Número de Serie / Nombre">
			</div>
			<input type="checkbox" <?php if($chkTodo) echo 'checked'; ?> id="BusquedaTodos" name="BusquedaTodos">&nbsp&nbsp<font color="Green">Realizar Búsqueda Completa.</font></br></br>
			<li class="smaller">La búsqueda Normal puede encontrar solo los reportes que esten asignados a usted.</li>
			<li class="smaller">La búsqueda Completa puede encontrar los reportes aun cuando estos no esten asignados a usted.</li>
			<li class="smaller">Cuando se usa la búsqueda Completa los filtros anteriores se ignoran.</li>
		</div>
		<button type="submit" class="btn btn-success">Buscar Reportes</button>
	</form>
	</br>
</div>


<script type="text/javascript">
	function menajiando(){
		val = $("#divAvanzados").attr('class');
		if( val == 'div-temporal'){
			$( "#divAvanzados" ).removeClass( "div-temporal" ).addClass( "div-normal" );
		}
		else{
			$( "#divAvanzados" ).removeClass( "div-normal" ).addClass( "div-temporal" );
			$( "#nSegAvanz" ).val("");
			$( "#BusquedaTodos" ).prop( "checked", false );
		}
	}

	$('ul.yiiPager > li > a').click(function(ev){
		hr = $(this).attr('href');
		res = hr.split("page=");
		if(res.length>1)
			$('#hPage').val(res[1]);
		else
			$('#hPage').val("1");
		ev.preventDefault();
		document.formFiltro.submit();
	});

	var notifications = new $.ttwNotificationMenu({});

	$(function() {
	   	notifications.initMenu({
	        nuevos:'#notiNuevos',
	        abiertos:'#notiAbiertos',
	        mensajes: '#notiMensajes'
	    });
	    obtenerNotificacionesMenu();
	});

	function obtenerNotificacionesMenu(){
	         $.ajax({
	            url: '/msicdi/site/GetNotificacionesMenu.html', type: 'post', 
	            success: getMensajesMenu,
	            error: function(e){
	                console.log('No se pueden obtener actualizaciones');
	            }
	        }); 
	}

	function getMensajesMenu(resp1){
		$.ajax({
	            url: '/msicdi/site/GetMensajesMenu.html', type: 'post', 
	            success: function(resp2){ mostrarNotificacionesMenu(resp1,resp2) },
	            error: function(e){
	                console.log('No se pueden obtener actualizaciones');
	            }
	        }); 
	}

	function mostrarNotificacionesMenu(resp,resp2){
	    for ( i = 0 ; i < resp.length; i++) {
	    	options = {
	                category: obtenerTipo(resp[i]['S']),
	                message: ((obtenerTipo(resp[i]['S']) == 'nuevos')?'Se te ha asignado ':"Tienes pendiente ")+"el reporte : "+resp[i]['R']+"."
	        };
	        notifications.createNotification(options);
	    };

	    resp2.forEach(function(entry){
	    	options = {
	                category: 'mensajes',
	                message: 'Nuevo mensaje en:'+entry['respuestaPara']+"."
	        };
	        notifications.createNotification(options);
	    })
	    //notifications.createNotification(options);
	}

	function obtenerTipo(tipo){
		if(tipo == 'Nuevo'){
			return 'nuevos'
		}else
			if( tipo == 'Proceso' || tipo=='Espera' )
				return 'abiertos'
			else
				return 'ninguno'
	}

    $('.fallaWrapper').trunk8({lines:3,fill: '&hellip; <a id="read-more" href="#">Ver Más</a>'});

    $('#read-more').live('click', function (event) {
        $(this).parent().trunk8('revert').append(' <a id="read-less" href="#">Ver Menos</a>');

        return false;
    });

    $('#read-less').live('click', function (event) {
        $(this).parent().trunk8();
        return false;
    });
</script>











