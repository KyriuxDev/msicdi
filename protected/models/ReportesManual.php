<?php

	/**
     * ReportesManual Modelo para la obtencion de datos de la tabla cdi_reportes_manual
     *
     * Esta es una clase modelo que sirve para poder obtener todos los datos que se encuentran almacendados en
     * la base de datos, de la tabla cdi_reportes_manual
     * @copyright Copyright (c) 2015, González Héctor <hector@devoaxaca.com>
     * @version 1.0.1
     * @package protected.models
     * @category Modelo
	 *
	 * Las siguientes propiedades son elementos de la tabla 'cdi_cat_personal':
	 * @property integer $id
	 * @property string $NRastreo
	 * @property string $Matricula
	 * @property string $nombreReportador
	 * @property string $eMail
	 * @property string $nSerie
	 * @property string $descripcionFalla
	 * @property string $fechaReporte
	 * @property string $status
	 * @property string $ultimoCambio
	 * @property string $tiempoTranscurrido
	 * @property string $soporte
	 * @property string $historial
	 * @property string $ipOrigen
	 * @property string $Telefono
	 */
class ReportesManual extends CActiveRecord
{
	/**
	 * [tableName Obtiene el nombre de la tabla a la cual hace referencia el modelo]
	 * @return [String] [Nombre de la tabla]
	 */
	public function tableName()
	{
		return 'cdi_reportes_manual';
	}
	/**
	 * [rules Establece las reglas de búsqueda]
	 * @return [Array] [Arreglo que contiene las reglas de búsqueda]
	 */
	public function rules()
	{
		return array(
			array('NRastreo, eMail, nSerie, descripcionFalla, fechaReporte, status, tiempoTranscurrido, soporte, historial, ipOrigen, Telefono', 'required'),
			array('NRastreo, Telefono', 'length', 'max'=>15),
			array('Matricula', 'length', 'max'=>10),
			array('nombreReportador', 'length', 'max'=>50),
			array('eMail', 'length', 'max'=>200),
			array('nSerie', 'length', 'max'=>25),
			array('status, ipOrigen', 'length', 'max'=>20),
			array('soporte', 'length', 'max'=>40),
			array('ultimoCambio', 'safe'),
			/**
			 * @todo Reglas de búsqueda, los campos que no se verán, deben eliminarse
			 */ 
			array('id, NRastreo, Matricula, nombreReportador, eMail, nSerie, descripcionFalla, fechaReporte, status, ultimoCambio, tiempoTranscurrido, soporte, historial, ipOrigen, Telefono', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'NRastreo' => 'Nrastreo',
			'Matricula' => 'Matricula',
			'nombreReportador' => 'Nombre Reportador',
			'eMail' => 'E Mail',
			'nSerie' => 'N Serie',
			'descripcionFalla' => 'Descripcion Falla',
			'fechaReporte' => 'Fecha Reporte',
			'status' => 'Status',
			'ultimoCambio' => 'Ultimo Cambio',
			'tiempoTranscurrido' => 'Tiempo Transcurrido',
			'soporte' => 'Soporte',
			'historial' => 'Historial',
			'ipOrigen' => 'Ip Origen',
			'Telefono' => 'Telefono',
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
		$criteria->compare('id',$this->id);
		$criteria->compare('NRastreo',$this->NRastreo,true);
		$criteria->compare('Matricula',$this->Matricula,true);
		$criteria->compare('nombreReportador',$this->nombreReportador,true);
		$criteria->compare('eMail',$this->eMail,true);
		$criteria->compare('nSerie',$this->nSerie,true);
		$criteria->compare('descripcionFalla',$this->descripcionFalla,true);
		$criteria->compare('fechaReporte',$this->fechaReporte,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('ultimoCambio',$this->ultimoCambio,true);
		$criteria->compare('tiempoTranscurrido',$this->tiempoTranscurrido,true);
		$criteria->compare('soporte',$this->soporte,true);
		$criteria->compare('historial',$this->historial,true);
		$criteria->compare('ipOrigen',$this->ipOrigen,true);
		$criteria->compare('Telefono',$this->Telefono,true);
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
