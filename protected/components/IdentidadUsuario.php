<?php 
	/**
	 * IdentidadUsuario es una instancia de la clase CUserIdentity
	 *
	 * IdentidadUsuario es una clase base para la representación de identidades que se autentican basandose  en un nombre de usuario y una contraseña.
	 * Las clases derivadas deben implementar la autenticación con el esquema de autenticación real @example  nombre de usuario y contraseña verificados contra una tabla DB.
 	 * @author González Santiago Héctor Florencio
	 * @copyright Copyright (c) 2015, González Héctor <hector@devoaxaca.com>
	 * @version 1.0.1
	 * @package protected.component
	 * @category Componente
 	 */
class IdentidadUsuario extends CUserIdentity

{
	/**
	 * @var  String Matrícula del usuario que se ha identificado de manera correcta
	 */
	private $_matricula;
	/**
	 * [authenticate Verifica las credenciales que el usuario ha proporcionado al momento de identificarse]
	 * @return [Array] [Arreglo de los errores que hayan surgido al momento de la utentificación]
	 */
	public function authenticate()
	{
		//Busca los datos correspondientes a la matricula ingresada
		$registro = User::model()->findByAttributes(array('Matricula'=>$this->username));
		if($registro == null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if( $registro->Password !== sha1($this->password) )
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{
			$this->_matricula=$registro->Matricula;
            $this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}

	/**
	 * [getMatricula Obtiene la matrícula del usuario que se ha identificado]
	 * @return [String] [Matrícula del usuario identificado]
	 */
	public function getMatricula()
	{
		return $this->_matricula;
	}

}