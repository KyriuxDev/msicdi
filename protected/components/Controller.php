<?php
	/**
	 * Controller es la base customizada de las clases
	 *
	 * Todas las clases controlador de esta aplicación deben extender a esta clase base
 	 * @author González Santiago Héctor Florencio
	 * @copyright Copyright (c) 2015, González Héctor <hector@devoaxaca.com>
	 * @version 1.0.1
	 * @package protected.component
	 * @category Componente
 	 */
class Controller extends CController
{
	/**
	 * @var  String el layout para el controlador y vista. Default es:  '//layouts/column1',
	 * lo cual significa que se ussa un layout de una sola columna @see 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array de elementos del menú. Esta propiedad será asignada  a {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array breadcrumbs de la pagina actual. El valor de esta propiedad será
	 * asignado a {@link CBreadcrumbs::links}. Por favor vea {@link CBreadcrumbs::links}
	 * para mas detalles de como especificar estas propiedades
	 */
	public $breadcrumbs=array();
}