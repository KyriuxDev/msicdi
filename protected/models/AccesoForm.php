<?php
    /**
     * AccesoForm Modelo para la autentificación de usuarios
     *
     * Esta es una clase modelo que sirve para la autentificación de usuarios, a partir de un usuario y una contraseña proporcionados,
     * estableciendo reglas y mensaje de errores para feedback del usuario que intenta loguearse
     * @copyright Copyright (c) 2015, González Héctor <hector@devoaxaca.com>
     * @version 1.0.1
     * @package protected.models
     * @category Modelo
     */
class AccesoForm extends CFormModel
{
	/**
	 * @var  String la matricual del suario que se ha identificado
	 */
	public $matricula;
	/**
	 * @var  String la contraseña que el usuario proporciona para poder identificarse
	 */
	public $clave;
	/**
	 * @var  Boolean si el usuario desea ser recordado por el navegador y mantener abierta la sesión
	 */
	public $recordarme;
	/**
	 * @var  IdentidadUsuario genera el modelo de usuario para ser validado
	 */
	private $_identidad;
	/**
	 * [rules Declara las reglas de validacion, se establece que la matricula y la clave son requeridas y la clave debe ser verificada]
	 * @return [Array] [Reglas de validación]
	 */
	public function rules()
	{
		return array(
			// Usuario y clave requeridos
			array('matricula, clave', 'required', 'message'=>'Ingrese Un Valor Para, {attribute}.'),
			// Recordarme necesita un boleano
			array('recordarme', 'boolean'),
			// La clave debe ser verificada
			array('clave', 'verificar'),
		);
	}
	/**
	 * [attributeLabels Declaracion de etiquetas]
	 * @return [Array] [Arreglo de etiquetas que se mostrarán en la vista]
	 */
	public function attributeLabels()
	{
		return array(
			'recordarme'=>'Recordarme',
		);
	}
	/**
	 * Verifica la clave
	 * Funcion Authenticate declarada en las reglas para verificar la contraseña
	 */
	/**
	 * [verificar Verifica que el usuario y la cntraseña proporcionados por el usuario sean correctos]
	 * @param  [String] $attribute [Atributo]
	 * @param  [String] $params    [Parametros adicionales]
	 */
	public function verificar($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identidad=new IdentidadUsuario($this->matricula,$this->clave);
			if(!$this->_identidad->authenticate())
				$this->addError('clave','Datos Incorrectos.');
		}
	}
	/**
	 * [acceso Loguea el usuario con una matricula y una clave proporcionadas]
	 * @return [Boolean] [Si el usuario ha sido verificado o no]
	 */
	public function acceso()
	{
		if($this->_identidad===null)
		{
			$this->_identidad=new  IdentidadUsuario($this->username,$this->password);
			$this->_identidad->authenticate();
		}
		if($this->_identidad->errorCode===IdentidadUsuario::ERROR_NONE)
		{
			$duration=$this->recordarme ? 3600*24*30 : 0; // 30 days
			//$duration = 3600 * 24 * 30 : 0;
			Yii::app()->user->login($this->_identidad,$duration);
			return true;
		}
		else
			return false;
	}
}
