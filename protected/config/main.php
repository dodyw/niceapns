<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'NiceAPNS Manager',

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
			'password'=>'pass',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),

	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/

		// uncomment the following to use a MySQL database

		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=niceapns',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'root',
			'charset' => 'utf8',
		),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),


		// 'urlManager'=>array(
		//     'urlFormat'=>'path',
		//     'rules'=>array(
		//         array('api/create', 'pattern'=>'api/<model:\w+>', 'verb'=>'POST'),
		//         '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
		        
		        /*
		        'post/<id:\d+>/<title:.*?>'=>'post/view',
		        'posts/<tag:.*?>'=>'post/index',
		        //REST patterns
		        array('api/list', 'pattern'=>'api/<model:\w+>', 'verb'=>'GET'),
		        array('api/view', 'pattern'=>'api/<model:\w+>/<id:\d+>', 'verb'=>'GET'),
		        array('api/update', 'pattern'=>'api/<model:\w+>/<id:\d+>', 'verb'=>'PUT'),
		        array('api/delete', 'pattern'=>'api/<model:\w+>/<id:\d+>', 'verb'=>'DELETE'),
		        // Other controllers
		        '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
		        */
		//     ),
		// ),
		
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),


);