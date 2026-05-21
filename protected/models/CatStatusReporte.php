<?php
	/**
     * CatPersonal Modelo para la obtencion de datos de la tabla "cdi_cat_statusreporte".
     *
     * Esta es una clase modelo que sirve para poder obtener todos los datos que se encuentran almacendados en
     * la base de datos, de la tabla "cdi_cat_statusreporte".
     * 
     * @copyright Copyright (c) 2015, González Héctor <hector@devoaxaca.com>
     * @version 1.0.1
     * @package protected.models
     * @category Modelo
	 *
	 * Las siguientes propiedades son elementos de la tabla 'cdi_cat_personal':
	 * @property integer $idStatus
	 * @property string $Status
	 */
class CatStatusReporte extends CActiveRecord
{
	/**
	 * [tableName Obtiene el nombre de la tabla a la cual hace referencia el modelo]
	 * @return [String] [Nombre de la tabla]
	 */
	public function tableName()
	{
		return 'cdi_cat_statusreporte';
	}
	/**
	 * [rules Establece las reglas de búsqueda]
	 * @return [Array] [Arreglo que contiene las reglas de búsqueda]
	 */
	public function rules()
	{
		return array(
			array('Status', 'required'),
			array('Status', 'length', 'max'=>30),
			/**
			 * @todo Reglas de búsqueda, los campos que no se verán, deben eliminarse
			 */ 
			array('idStatus, Status', 'safe', 'on'=>'search'),
		);
	}
	/**
	 * [relations Obtiene las relaciones que contiene la tabla actual]
	 * @return [Array] [Arreglo con las relaciones de la tabla]
	 */
	public function relations()
	{
		/**
		 * @todo  Ajustar las relaciones, para las relaciones generadas
		 */
		return array(
		);
	}

	/**
	 * [attributeLabels Establece las etiquetas para las incersiones]
	 * @return [Array] [Etiquetas para la inserciones]
	 */
	public function attributeLabels()
	{
		return array(
			'idStatus' => 'Id Status',
			'Status' => 'Status',
		);
	}
	/**
	 * [search Obtiene una lista de modelos basados en las condiciones actuales de busqueda/filtro]
	 * @return [CActiveDataProvider] [CActiveDataProvider que contiene losmodelos basados en las condiciones de búsqueda]
	 */
	public function search()
	{
		/**
		 * @todo Modificar los siguientes códigos para eliminar los atributos que no puedan ser buscados.
		 */
		$criteria=new CDbCriteria;
		$criteria->compare('idStatus',$this->idStatus);
		$criteria->compare('Status',$this->Status,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	/**
	 * [model Obtiene le modelo estatico de la clase AR especificada]
	 * @param  [string] $className [Nombre de la clase ActiveRecord]
	 * @return [CatPersonal]            [Clase estatica modelo de CatPersonal]
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
