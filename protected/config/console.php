<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Console Application',

	// preloading 'log' component
	'preload'=>array('log'),

	'import'=>array(
		'application.models.*',
		'application.helpers.*',
	),

	// application components
	'components'=>array(
		'db'=> require(dirname(__FILE__).'/_db.php'),
		
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),
		),

		'request' => array(
            'hostInfo' => 'http://shkolyar.info',
            'baseUrl' => '',
            'scriptUrl' => '',
        ),

        'urlManager'=>array(
        	'urlFormat'=>'path',
        	'showScriptName'=>false,
        	'rules'=>array(

        		'/inside/<controller:\w+>/<action:\w+>/<id:\d+>'=>'inside/<controller>/<action>',
        		'/inside/<controller:\w+>/<action:\w+>'=>'inside/<controller>/<action>',
        		'/inside/<controller:\w+>'=>'inside/<controller>/index',

        		'/ajax/<controller:\w+>/<action:\w+>'=>'ajax/<controller>/<action>',

        		'<action:about|advertiser|rules|rightholder|contacts>'=>'site/page',
        		'/site/login' => 'site/login',
        		'/site/logout' => 'site/logout',
        		
        		'<controller:\w+>/<clas:\d+>/<subject:[a-z-]+>/<book:[a-z-]+>/<section:\d+>/<paragraph:\d+>/<task:\d+>'=>'<controller>/nestedTwo',
        		'<controller:\w+>/<clas:\d+>/<subject:[a-z-]+>/<book:[a-z-]+>/<section:\d+>/<task:\d+>'=>'<controller>/nestedOne',
        		'<controller:\w+>/<clas:\d+>/<subject:[a-z-]+>/<book:[a-z-]+>/<task:\d+>'=>'<controller>/task',
        		'<controller:\w+>/<clas:\d+>/<subject:[a-z-]+>/<book:[a-z-]+>'=>'<controller>/book',
        		'<controller:\w+>/<clas:\d+>/<subject:[a-z-]+>'=>'<controller>/subject',
        		'<controller:\w+>/<clas:\d+>'=>'<controller>/clas',

        		'<controller:gdz|textbook|writing>/<subject:[a-z-]+>'=>'<controller>/currentSubject',

        		'<controller:\w+>/<category:\w+>/<article:[a-z-]+>'=>'<controller>/view',
        		'<controller:\w+>/<category:\w+>'=>'<controller>/category',
        		'<controller:\w+>'=> '<controller>/index',

        		// 'tizer'=>'tizer/index',
        		// 'position'=>'position/index',
        		'sitemap.xml'=>'sitemap/index',
        		
        		
        		
        		

        		// '<controller:\w+>/<id:\d+>'=>'<controller>/view',
        		// '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
        		// '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
        	),
        ),
	),
);