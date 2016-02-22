<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// Yii::setPathOfAlias('booster', dirname(__FILE__).DIRECTORY_SEPARATOR.'../vendor/clevertech/yii-booster/src');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'ГДЗ 6 клас',
	'sourceLanguage'=>'en',
	'language'=>'ru',
	'theme'=>'adaptive',
	'defaultController'=>'site',

	// preloading 'log' component
	'preload'=>array(
		'log', 
		// 'bootstrap'
	),

	//GZIP compress   
	// 'onBeginRequest'=>create_function('$event', 'return ob_start("ob_gzhandler");'),
	// 'onEndRequest'=>create_function('$event', 'return ob_end_flush();'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.extensions.*',
		'application.components.*',
		'application.helpers.*',
		'application.widgets.dataBookWidget.*',
		'application.widgets.oneBookWidget.*',
		'application.widgets.oneTextbookWidget.*',
		'application.widgets.taskWidget.*',
		'application.widgets.nestedWidget.*',
		'application.widgets.linkPagerWidget.*',
		'application.widgets.relativeGdzWidget.*',
		'application.widgets.relativeBooksWidget.*',
		'application.widgets.relativeTextbooksWidget.*',
		'application.widgets.treeMenuWidget.*',
	),

	'modules'=>array(

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		'inside',
		'ajax'
		
	),

	// application components
	'components'=>array(

       'authManager' => array(
		    // Будем использовать свой менеджер авторизации
		    'class' => 'PhpAuthManager',
		    // Роль по умолчанию. Все, кто не админы, модераторы и юзеры — гости.
		    'defaultRoles' => array('guest'),
		),

       'user'=>array(
		    'class' => 'WebUser',
		    'loginUrl'=>array('site/login'),
		    'allowAutoLogin' 	=> true,
		),

       'image'=>array(
            'class'=>'application.extensions.image.CImageComponent',
            // GD or ImageMagick
            'driver'=>'GD',
            // ImageMagick setup path
           // 'params'=>array('directory'=>'D:/Program Files/ImageMagick-6.4.8-Q16'),
        ),

		// 'request'=>array(
  //           'enableCsrfValidation'=>false,
  //           'enableCookieValidation'=>false,
  //       ),

		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(

				'position/<token:[a-z0-9-]+>'=>'position/index',
				'vk/<hash:[a-z0-9-]+>'=>'vk/index',
				'/inside/<controller:\w+>/<action:\w+>/<id:\d+>'=>'inside/<controller>/<action>',
				'/inside/<controller:\w+>/<action:\w+>'=>'inside/<controller>/<action>',
				'/inside/<controller:\w+>'=>'inside/<controller>/index',

				'/ajax/<controller:\w+>/<action:\w+>'=>'ajax/<controller>/<action>',

				'/textbook/sync'=>'textbook/sync',
				'/textbook/syncPost'=>'textbook/syncPost',
				'/textbook/issue'=>'textbook/issue',
				'/textbook/embed'=>'textbook/embed',
				'/textbook/p/<p:\d+>'=>'textbook/index',
				'/textbook/<clas:[a-z0-9-]+>'=>'textbook/clas',
				'/textbook/<clas:[a-z0-9-]+>/p/<p:\d+>'=>'textbook/clas',
				'/textbook/<clas:[a-z0-9-]+>/<subject:[a-z-]+>/p/<p:\d+>'=>'textbook/subject',
				'/textbook/<clas:[a-z0-9-]+>/<subject:[a-z-]+>/<book:[a-z0-9-]+>/<section:\d+>/<paragraph:\d+>/<task:\d+>'=>'textbook/nestedTwo',
				'/textbook/<clas:[a-z0-9-]+>/<subject:[a-z-]+>/<book:[a-z0-9-]+>/<section:\d+>/<task:\d+>'=>'textbook/nestedOne',
				'/textbook/<clas:[a-z0-9-]+>/<subject:[a-z-]+>/<book:[a-z0-9-]+>/<task:\d+>'=>'textbook/task',
				'/textbook/<clas:[a-z0-9-]+>/<subject:[a-z-]+>/<book:[a-z0-9-]+>'=>'textbook/book',
				'/textbook/<clas:[a-z0-9-]+>/<subject:[a-z-]+>'=>'textbook/subject',

				'/jewel' => 'site/jewel',
				'/site/login' => 'site/login',
				'/site/logout' => 'site/logout',
				'/site/page' => 'site/page',

				'<clas:\d+>/p/<p:\d+>'=>'site/clas',
				'<clas:\d+>/<subject:[a-z-]+>/p/<p:\d+>'=>'site/subject',
				'<clas:\d+>/<subject:[a-z_]+>/<book:[a-z0-9-_]+>/<section:\d+>/<paragraph:\d+>/<task:\d+>'=>'site/nestedTwo',
				'<clas:\d+>/<subject:[a-z_]+>/<book:[a-z0-9-_]+>/<section:\d+>/<task:\d+>'=>'site/nestedOne',
				'<clas:\d+>/<subject:[a-z_]+>/<book:[a-z0-9-_]+>/<task:\d+>'=>'site/task',
				'<clas:\d+>/<subject:[a-z_]+>/<book:[a-z0-9-_]+>'=>'site/book',
				'<clas:\d+>/<subject:[a-z_]+>'=>'site/subject',

				

				'<clas:\d+>'=>'site/clas',
				'p/<p:\d>'=>'site/index',

				'sitemap.xml'=>'sitemap/index',
				'sitemap'=>'site/sitemap',
				

				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

		'db'=> require(dirname(__FILE__).'/_db.php'),
		
		'errorHandler'=>array(
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
				
				// array(
				// 	'class'=>'CWebLogRoute',
				// ),
				
			),
		),

		'cache'=>array(
            'class'=>'system.caching.CDummyCache',
            // 'class'=>'system.caching.CFileCache',
        ),

        'clientScript'=>array(
            'class'=>'ext.ExtendedClientScript.ExtendedClientScript',
            'combineCss'=>false,
            'compressCss'=>false,
            'combineJs'=>false,
            'compressJs'=>false,
			'scriptMap'=>array(
				// 'jquery'=>'http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js',
        		'jquery.js'=>'http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js',
        		// 'jquery.cookie.js'=>'/js/jquery1.11.1.min.js',
        		'jquery.min.js'=>'http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js',
			)
        ),

  //       'clienScript'=>array(
  //       	'scriptMap'=>array(
  //       		// 'jquery'=>'http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js',
  //       		'jquery.js'=>'http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js',
  //       		// 'jquery.cookie.js'=>'/js/jquery1.11.1.min.js',
  //       		'jquery.min.js'=>'http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js',
  //       	)
		// ),

        'file' => array(
            'class'=>'application.extensions.file.CFile',
        ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'audiua@yandex.ru',
		'auth'=> require(dirname(__FILE__).'/_auth.php'),
	),
);