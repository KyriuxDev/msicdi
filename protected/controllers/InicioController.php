<?php
	/**
	 * Controlador de Inicio,
	 * 
	 * El controlador de Inicio se encarga de el manejo de sesiones de usuarios, acción de acceso y salida.
	 * 
	 * @author González Santiago Héctor Florencio
	 * @copyright Copyright (c) 2015, González Héctor <hector@devoaxaca.com>
	 * @version 1.0.1
	 * @package protected.controllers
	 * @category Controlador
	 */
Class InicioController extends Controller{
	/**
	 * [actionIndex Muestra la vista principal de la pagina]
	 * @since 1.0.1 Se introdujo este elemento
	 */
	public function actionIndex()
	{
		$this->render('index');
	}
	/**
	 * [actionAcceso Maneja y valida las sesiones de inicio del usuario]
	 * @since 1.0.1 Se introdujo este elemento
	 */
	public function actionAcceso()
	{
		$modelo = new AccesoForm;
		// Si existe una peticion de validacion Ajasx.
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($modelo);
			Yii::app()->end();
		}
		// Obtiene los valores de los inputs
		if(isset($_POST['AccesoForm']))
		{
			$modelo->attributes=$_POST['AccesoForm'];
			// Valida las entradas del usuario y redirige a la pagina anterior si es valida
			if($modelo->validate() && $modelo->acceso())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// Muestra el form de inicio.
		if (Yii::app()->user->isGuest)
			$this->render('acceso',array('modelo'=>$modelo));
		else
			$this->redirect(Yii::app()->user->returnUrl);
	}

	/**
	 * [actionSalir Destruye la sesión actual del usuario]
	 * @since 1.0.1 Se introdujo este elemento
	 */
	public function actionSalir()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	/**
	 * [actionError Muestra mensajes de error de logueo]
	 * @since 1.0.1 Se introdujo este elemento
	 */
	public function actionError(){
		if($error=Yii::app()->errorHandler->error){
			if(Yii::app()->request->isAjaxRequest)
				echo $error["message"];
			else
				$this->render('error',$error);
		}
	}
}
