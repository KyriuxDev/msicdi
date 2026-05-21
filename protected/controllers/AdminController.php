<?php
	/**
	 * Controlador de Administrador,
	 * 
	 * El controlador de Administrador se encarga de mostrar la información de inventario, tomando en cuenta los niveles de acceso.
	 * 
	 * @author González Santiago Héctor Florencio
	 * @copyright Copyright (c) 2015, González Héctor <hector@devoaxaca.com>
	 * @version 1.0.1
	 * @package protected.controllers
	 * @category Controlador
	 */

	Class AdminController extends Controller{

        public function actionGetReferencia(){
            $criterio = strtolower(trim($_POST['criterio']));
            $criterio = str_replace("'","",$criterio);
            $query = "SELECT * from cdi_cat_inmuebles where Referencia like '%{$criterio}%' or ClaveMunicipio like '%{$criterio}%' or IdInmueble like '%{$criterio}%'";
            $query .= " or ClaveAdscripcion like '%{$criterio}%' or SegmentoIP01 like '%{$criterio}%' or SegmentoIP02 like '%{$criterio}%' or CodigoVPN like '%{$criterio}%'";
            $query .= " or UI like '%{$criterio}%' or CC like '%{$criterio}%' or Direccion like '%{$criterio}%' or Numero like '%{$criterio}%'";
            $query .= " limit 50";
            $db = Yii::app()->db->createCommand($query)->queryAll();
            $resp = array();
            foreach($db as $r)
             	array_push($resp, $r);
            header("Content-type: application/json");
            echo CJSON::encode($resp);
        }

        public function actionGetSO(){
            $criterio = strtolower(trim($_POST['criterio']));
            $criterio = str_replace("'","",$criterio);
            $query = "SELECT * from cdi_cat_so where ClaveSO like '%{$criterio}%' or IdSO like '%{$criterio}%' or DescSO like '%{$criterio}%'";
            $query .= " limit 50";
            $db = Yii::app()->db->createCommand($query)->queryAll();
            $resp = array();
            foreach($db as $r)
             	array_push($resp, $r);
            header("Content-type: application/json");
            echo CJSON::encode($resp);
        }

        public function actionGetCC(){
            $criterio = strtolower(trim($_POST['criterio']));
            $criterio = str_replace("'","",$criterio);
            $query = "SELECT * from cdi_cat_cc where CC like '%{$criterio}%' or IdCC like '%{$criterio}%' or Descripcion like '%{$criterio}%'";
            $query .= " limit 50";
            $db = Yii::app()->db->createCommand($query)->queryAll();
            $resp = array();
            foreach($db as $r)
             	array_push($resp, $r);
            header("Content-type: application/json");
            echo CJSON::encode($resp);
        }

        public function actionGetStat(){
            $criterio = strtolower(trim($_POST['criterio']));
            $criterio = str_replace("'","",$criterio);
            $query = "SELECT * from cdi_cat_status where ClaveStatus like '%{$criterio}%' or IdStatus like '%{$criterio}%' or Status like '%{$criterio}%'";
            $query .= " limit 50";
            $db = Yii::app()->db->createCommand($query)->queryAll();
            $resp = array();
            foreach($db as $r)
             	array_push($resp, $r);
            header("Content-type: application/json");
            echo CJSON::encode($resp);
        }

         public function actionGetReg(){
            $criterio = strtolower(trim($_POST['criterio']));
            $criterio = str_replace("'","",$criterio);
            $query = "SELECT * from cdi_cat_regimen where ClaveRegimen like '%{$criterio}%' or IdRegimen like '%{$criterio}%' or Regimen like '%{$criterio}%'";
            $query .= " limit 50";
            $db = Yii::app()->db->createCommand($query)->queryAll();
            $resp = array();
            foreach($db as $r)
             	array_push($resp, $r);
            header("Content-type: application/json");
            echo CJSON::encode($resp);
        }

        public function actionGetUi(){
            $criterio = strtolower(trim($_POST['criterio']));
            $criterio = str_replace("'","",$criterio);
            $query = "SELECT * from cdi_cat_ui where UI like '%{$criterio}%' or ClaveAdscripcion like '%{$criterio}%' or Id_Ui like '%{$criterio}%'";
            $query .= " limit 50";
            $db = Yii::app()->db->createCommand($query)->queryAll();
            $resp = array();
            foreach($db as $r)
             	array_push($resp, $r);
            header("Content-type: application/json");
            echo CJSON::encode($resp);
        }

        public function actionGetFondo(){
            $criterio = strtolower(trim($_POST['criterio']));
            $criterio = str_replace("'","",$criterio);
            $query = "SELECT * from cdi_cat_fondo where ClaveFondo like '%{$criterio}%' or IDFondo like '%{$criterio}%' or DescFondo like '%{$criterio}%'";
            $query .= " limit 50";
            $db = Yii::app()->db->createCommand($query)->queryAll();
            $resp = array();
            foreach($db as $r)
             	array_push($resp, $r);
            header("Content-type: application/json");
            echo CJSON::encode($resp);
        }

		public function actionGetMatr(){
            $criterio = strtolower(trim($_POST['criterio']));
            $criterio = str_replace("'","",$criterio);
            $query = "SELECT * from cdi_cat_personal where Matricula like '%{$criterio}%' or Nombres like '%{$criterio}%' or ApPaterno like '%{$criterio}%' or ApMaterno like '%{$criterio}%'";
            $query .= " or ClaveAdscripcion like '%{$criterio}%' or ClaveCategoria like '%{$criterio}%'";
            $query .= " limit 50";
            $db = Yii::app()->db->createCommand($query)->queryAll();
            $resp = array();
            foreach($db as $r)
             	array_push($resp, $r);
            header("Content-type: application/json");
            echo CJSON::encode($resp);
        }

        public function actionGetHard(){
            $criterio = strtolower(trim($_POST['criterio']));
            $criterio = str_replace("'","",$criterio);
            $query = "SELECT * from cdi_cat_hw where id_hw like '%{$criterio}%' or Descripcion like '%{$criterio}%' or Marca like '%{$criterio}%' or Modelo like '%{$criterio}%'";
            $query .= " limit 50";
            $db = Yii::app()->db->createCommand($query)->queryAll();
            $resp = array();
            foreach($db as $r)
             	array_push($resp, $r);
            header("Content-type: application/json");
            echo CJSON::encode($resp);
        }

		/**
		 * [actionInventario Muestra la vista de inventario]
		 * @since 1.0.1 Se introdujo este elemento
		 */
		public function actionInventario(){
			if(Yii::app()->user->isGuest){
				$this->redirect(Yii::app()->user->returnUrl);
			}else{
				$this->render('inventario');
			}
		}

        public function actionReporteInv(){
            if(Yii::app()->user->isGuest){
                $this->redirect(Yii::app()->user->returnUrl);
            }else{
                $query = "show columns from cdi_inventario";
                $res = Yii::app()->db->createCommand($query)->queryAll();
                $columnas = array();
                foreach($res as $r){
                    $t = array();
                    array_push($t,$r['Field']);
                    array_push($t,$r['Key']);
                    array_push($columnas,$t);
                }
                $this->render('rep',compact('columnas'));
            }
        }
	}