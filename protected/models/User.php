<?php
    /**
     * User Modelo para la obtencion de datos de la tabla cdi_usuarios
     *
     * Esta es una clase modelo que sirve para poder obtener todos los datos que se encuentran almacendados en
     * la base de datos, de la tabla cdi_usuarios
     * @copyright Copyright (c) 2015, González Héctor <hector@devoaxaca.com>
     * @version 1.0.1
     * @package protected.models
     * @category Modelo
	 *
	 * Las siguientes propiedades son elementos de la tabla 'cdi_cat_personal':
	 * @property string $idusuario
	 * @property string $Matricula
	 * @property string $Password
	 * @property string $MobilePIN
	 * @property string $Email
	 * @property string $PasswordQuestion
	 * @property string $PasswordAnswer
	 * @property integer $IsApproved
	 * @property integer $IsLockedOut
	 * @property string $CreateDate
	 * @property string $LastLoginDate
	 * @property string $LastPasswordChangedDate
	 * @property string $LastLockoutDate
	 * @property integer $FailedPasswordAttemptCount
	 * @property string $Comment
	 * @property string $Rol
	 * @property string $Perfil
	 *
	 * Las siguientes propiedades son modelos de relaciones disponibles de la tabla 'cdi_cat_personal':
	 * @property CarStatusrep[] $carStatusreps
 	 * @property CatPersonal $matricula
	 */
class User extends CActiveRecord
{
	/**
	 * [tableName Obtiene el nombre de la tabla a la cual hace referencia el modelo]
	 * @return [String] [Nombre de la tabla]
	 */
	public function tableName()
	{
		return 'cdi_usuarios';
	}
	/**
	 * [rules Establece las reglas de búsqueda]
	 * @return [Array] [Arreglo que contiene las reglas de búsqueda]
	 */
	public function rules()
	{
		return array(
			array('Matricula, Password, MobilePIN, Email, PasswordQuestion, PasswordAnswer, IsApproved, IsLockedOut, CreateDate, LastLoginDate, LastPasswordChangedDate, LastLockoutDate, FailedPasswordAttemptCount, Comment', 'required'),
			array('IsApproved, IsLockedOut, FailedPasswordAttemptCount', 'numerical', 'integerOnly'=>true),
			array('Matricula', 'length', 'max'=>10),
			array('Password, PasswordAnswer', 'length', 'max'=>128),
			array('MobilePIN', 'length', 'max'=>16),
			array('Email, PasswordQuestion', 'length', 'max'=>256),
			array('Rol', 'length', 'max'=>20),
			array('Perfil', 'safe'),
			/**
			 * @todo Reglas de búsqueda, los campos que no se verán, deben eliminarse
			 */ 
			array('idusuario, Matricula, Password, MobilePIN, Email, PasswordQuestion, PasswordAnswer, IsApproved, IsLockedOut, CreateDate, LastLoginDate, LastPasswordChangedDate, LastLockoutDate, FailedPasswordAttemptCount, Comment, Rol, Perfil', 'safe', 'on'=>'search'),
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
			'carStatusreps' => array(self::HAS_MANY, 'CarStatusrep', 'idusuario'),
			'matricula' => array(self::BELONGS_TO, 'CatPersonal', 'Matricula'),
		);
	}
	/**
	 * [attributeLabels Establece las etiquetas para las incersiones]
	 * @return [Array] [Etiquetas para la inserciones]
	 */
	public function attributeLabels()
	{
		return array(
			'idusuario' => 'Idusuario',
			'Matricula' => 'Matricula',
			'Password' => 'Password',
			'MobilePIN' => 'Mobile Pin',
			'Email' => 'Email',
			'PasswordQuestion' => 'Password Question',
			'PasswordAnswer' => 'Password Answer',
			'IsApproved' => 'Is Approved',
			'IsLockedOut' => 'Is Locked Out',
			'CreateDate' => 'Create Date',
			'LastLoginDate' => 'Last Login Date',
			'LastPasswordChangedDate' => 'Last Password Changed Date',
			'LastLockoutDate' => 'Last Lockout Date',
			'FailedPasswordAttemptCount' => 'Failed Password Attempt Count',
			'Comment' => 'Comment',
			'Rol' => 'Rol',
			'Perfil' => 'Perfil',
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
		$criteria->compare('idusuario',$this->idusuario,true);
		$criteria->compare('Matricula',$this->Matricula,true);
		$criteria->compare('Password',$this->Password,true);
		$criteria->compare('MobilePIN',$this->MobilePIN,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('PasswordQuestion',$this->PasswordQuestion,true);
		$criteria->compare('PasswordAnswer',$this->PasswordAnswer,true);
		$criteria->compare('IsApproved',$this->IsApproved);
		$criteria->compare('IsLockedOut',$this->IsLockedOut);
		$criteria->compare('CreateDate',$this->CreateDate,true);
		$criteria->compare('LastLoginDate',$this->LastLoginDate,true);
		$criteria->compare('LastPasswordChangedDate',$this->LastPasswordChangedDate,true);
		$criteria->compare('LastLockoutDate',$this->LastLockoutDate,true);
		$criteria->compare('FailedPasswordAttemptCount',$this->FailedPasswordAttemptCount);
		$criteria->compare('Comment',$this->Comment,true);
		$criteria->compare('Rol',$this->Rol,true);
		$criteria->compare('Perfil',$this->Perfil,true);

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
