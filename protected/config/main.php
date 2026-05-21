<?php

// uncomment the following to define a path alias
 Yii::setPathOfAlias('local','/Applications/MAMP/htdocs/IMMSACTUAL');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Portal IMSS',
	'defaultController'=>'inicio',
	'charset'=>'UTF-8',



	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123456',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	// application components
			'components'=>array(

			  'ePdf' => array(
		        'class'         => 'ext.yiipdf.EYiiPdf',
		        	'params'        => array(
		           	 'mpdf'     => array(
		                'librarySourcePath' => 'application.vendor.mpdf.*',
		                'constants'         => array(
		                    '_MPDF_TEMP_PATH' => Yii::getPathOfAlias('application.runtime'),
		                ),
		                'class'=>'mpdf', 
		                 'defaultParams' => array(
		                 	'encoding'    => 'UTF-8',
		                 	)
		            ),
        ),
    ),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'urlSuffix'=>'.html',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			//'connectionString' => 'mysql:host=11.1.21.5:8500;dbname=cdi_imss',
			'connectionString' => 'mysql:host=localhost;dbname=cdi_imss',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'admin',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'inicio/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				
				array(
					'class'=>'CWebLogRoute',
				),
				
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'hector@devoaxaca.com',
	),
);