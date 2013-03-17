<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

require_once(dirname(__FILE__)."/init/param.php");

return array(
	'timeZone'=> 'Asia/Shanghai',
	/*
	*@Note
	*
	*DIRECTORY_SEPARATOR
	*Resolve the compatibility of the different operating platform
	*
	*/
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Honest Lies',
	'language'=>'zh_CN',
	/*
	*
	*'language'=>'zh_CN', is frist
	*
	*@Note How to use multi-language settings
	*
	*Normal
	*
	*Yii::t("{Contoller Name}.{Array Key}")
	*
	*Yii::t("campaign",'Year')
	*
	*(application.messages.{Which Language<temple>zh_TW</temple>}.{Which Controller})
	*
	*In Module
	*
	*Yii::t("{Modules Name}+{Module}.{Module Controller Name || File Name}")
	*
	*Yii::t("AdminModule.amazonCode",'Upload CSV File')
	*
	*(application.{Moduls Name}.messages.{Which Language<temple>zh_TW</temple>}.{Which Controller})
	*
	*
	*@Example
	*return array(
	*	'Key'=>'Values'
	*)
	*
	*/

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.extensions.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'honest',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		'admin'=>array(
			 'class'=>'application.modules.admin.AdminModule',
		)
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>false,
		),
		// uncomment the following to enable URLs in path-format
		//
		'adminuser'=>array(
				'class' => 'CWebUser',
				'stateKeyPrefix'=>'admin',
				'allowAutoLogin'=>true,
				'loginUrl'=> array('admin/default/index'),
                'returnUrl'=>array('/admin'),
		),
		//
		
		/*
		'urlManager'=>array(
            'urlFormat'=>'path',
            'appendParams'=>false,
            'showScriptName' => false,
            'rules' => array(
                'site_<view:\w+>'  => array('site/pages','urlSuffix'=>'.html', 'caseSensitive'=>false),
            ),
        ),
		
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=honest_lies',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		/*
		*Open Log 
		*/
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
                    'class'=>'CFileLogRoute',
                    'categories'=>'system.db.*',
					'levels'=>'info,error, warning',  
                    'logPath'=>dirname(__FILE__).DIRECTORY_SEPARATOR."../runtime",
                    'logFile'=>'db.log',
                    'maxFileSize'=>10240,       #unit:KB
                    'maxLogFiles'=>5,           #logrotate , keep latest 5 log-files
                ),
				array(
                    'class' => 'CWebLogRoute',
                    'categories'=>'system.db.*',
                    'showInFireBug' => false,
                    'ignoreAjaxInFireBug' => false
                ),
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'fangtoby6@gmail.com',
	),
);