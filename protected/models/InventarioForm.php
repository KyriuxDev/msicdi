<?php
	/**
     * AccesoForm Modelo para la tabla cdi_cat_inventario
     *
     * @copyright Copyright (c) 2015, González Héctor <hector@devoaxaca.com>
     * @version 1.0.1
     * @package protected.models
     * @category Modelo
     */
	class InventarioForm extends CFormModel{
		/**
		 * @var  String nni del elemento del inventario
		 */
		public $nni;
		/**
		 * @var  String serie del elemento del inventario
		 */
		public $serie;
		/**
		 * @var  String prei del elemento del inventario
		 */
		public $prei;
		/**
		 * @var  String tipo del elemento del inventario
		 */
		public $tipo;
		/**
		 * @var  String SerieMonitor del elemento del inventario
		 */
		public $serieMon;
		/**
		 * @var  String unidad del elemento del inventario
		 */
		public $unidad;
		/**
		 * @var  String marca del elemento del inventario
		 */
		public $marca;
		/**
		 * @var  String status del elemento del inventario
		 */
		public $status;
		/**
		 * @var  String modelo del elemento del inventario
		 */
		public $modelo;
		/**
		 * @var  String departamento del elemento del inventario
		 */
		public $depto;
		/**
		 * [rules Declara las reglas de validacion, se establece que la matricula y la clave son requeridas y la clave debe ser verificada]
		 * @return [Array] [Reglas de validación]
		 */
		public function rules(){
			return array(
						array('nni','required'),
				);
		}
	}

?>