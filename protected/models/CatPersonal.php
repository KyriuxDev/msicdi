<?php
    /**
     * CatPersonal Modelo para la obtencion de datos de la tabla personal
     *
     * Esta es una clase modelo que sirve para poder obtener todos los datos que se encuentran almacendados en
     * la base de datos, de la tabla cdi_cat_personal
     * @copyright Copyright (c) 2015, González Héctor <hector@devoaxaca.com>
     * @version 1.0.1
     * @package protected.models
     * @category Modelo
	 *
	 * Las siguientes propiedades son elementos de la tabla 'cdi_cat_personal':
	 * @property string $Matricula
	 * @property string $Nombres
	 * @property string $ApPaterno
	 * @property string $ApMaterno
	 * @property string $ClaveAdscripcion
	 * @property string $ClaveCategoria
	 * @property string $correo
	 *
	 * Las siguientes propiedades son modelos de relaciones disponibles de la tabla 'cdi_cat_personal':
	 * @property CatExtensiones[] $catExtensiones
	 * @property CatAdscripcion $claveAdscripcion
	 * @property CatCategoria $claveCategoria
	 * @property Inventario[] $inventarios
	 * @property Prestamos[] $prestamoses
	 * @property Reporte[] $reportes
	 * @property Usuarios[] $usuarioses
	 */
class CatPersonal extends CActiveRecord
{
	/**
	 * [tableName Obtiene el nombre de la tabla a la cual hace referencia el modelo]
	 * @return [String] [Nombre de la tabla]
	 */
	public function tableName()
	{
		return 'cdi_cat_personal';
	}
	/**
	 * [rules Establece las reglas de búsqueda]
	 * @return [Array] [Arreglo que contiene las reglas de búsqueda]
	 */
	public function rules()
	{
		return array(
			array('Matricula, Nombres, ApPaterno, ApMaterno, ClaveAdscripcion, ClaveCategoria', 'required'),
			array('Matricula, ClaveCategoria', 'length', 'max'=>10),
			array('Nombres, ApPaterno, ApMaterno', 'length', 'max'=>50),
			array('ClaveAdscripcion', 'length', 'max'=>12),
			array('correo', 'length', 'max'=>30),
			/**
			 * @todo Reglas de búsqueda, los campos que no se verán, deben eliminarse
			 */ 
			array('Matricula, Nombres, ApPaterno, ApMaterno, ClaveAdscripcion, ClaveCategoria, correo', 'safe', 'on'=>'search'),
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
			'catExtensiones' => array(self::HAS_MANY, 'CatExtensiones', 'Matricula'),
			'claveAdscripcion' => array(self::BELONGS_TO, 'CatAdscripcion', 'ClaveAdscripcion'),
			'claveCategoria' => array(self::BELONGS_TO, 'CatCategoria', 'ClaveCategoria'),
			'inventarios' => array(self::HAS_MANY, 'Inventario', 'Matricula'),
			'prestamoses' => array(self::HAS_MANY, 'Prestamos', 'Matricula'),
			'reportes' => array(self::HAS_MANY, 'Reporte', 'Matricula'),
			'usuarioses' => array(self::HAS_MANY, 'Usuarios', 'Matricula'),
		);
	}
	/**
	 * [attributeLabels Establece las etiquetas para las incersiones]
	 * @return [Array] [Etiquetas para la inserciones]
	 */
	public function attributeLabels()
	{
		return array(
			'Matricula' => 'Matricula',
			'Nombres' => 'Nombres',
			'ApPaterno' => 'Ap Paterno',
			'ApMaterno' => 'Ap Materno',
			'ClaveAdscripcion' => 'Clave Adscripcion',
			'ClaveCategoria' => 'Clave Categoria',
			'correo' => 'Correo',
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
		$criteria->compare('Matricula',$this->Matricula,true);
		$criteria->compare('Nombres',$this->Nombres,true);
		$criteria->compare('ApPaterno',$this->ApPaterno,true);
		$criteria->compare('ApMaterno',$this->ApMaterno,true);
		$criteria->compare('ClaveAdscripcion',$this->ClaveAdscripcion,true);
		$criteria->compare('ClaveCategoria',$this->ClaveCategoria,true);
		$criteria->compare('correo',$this->correo,true);
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
