<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'EyeMergency',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'ext.restfullyii.components.*',
        'ext.directmongosuite.components.*',
    ),
    'behaviors' => array(
        'edms' => array(
            'class' => 'EDMSBehavior',
        ),
    ),
    'modules' => array(
    // uncomment the following to enable the Gii tool
    /*
      'gii'=>array(
      'class'=>'system.gii.GiiModule',
      'password'=>'Enter Your Password Here',
      // If removed, Gii defaults to localhost only. Edit carefully to taste.
      'ipFilters'=>array('127.0.0.1','::1'),
      ),
     */
    ),
    // application components
    'components' => array(
        'edms' => array(
            'class' => 'EDMSConnection',
            'dbName' => 'apphack',
        //'server'           => 'mongodb://localhost:27017' //default
        //'options'  => array(.....); 
        ),
        //manage the httpsession in the collection 'edms_httpsession'
        'session' => array(
            'class' => 'EDMSHttpSession',
        //set this explizit if you want to switch servers/databases
        //See below: Switching between servers and databases                        
        //'connectionId'=>'edms',
        //'dbName'=>'testdb',
        ),
        //manage the cache in the collection 'edms_cache'
        'cache' => array(
            'class' => 'EDMSCache',
            //set to false after first use of the cache to increase performance
            'ensureIndex' => true,
        //Maybe set connectionId and dbName too: see Switching between servers and databases 
        ),
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        // uncomment the following to enable URLs in path-format

        'urlManager' => array(
            'urlFormat' => 'path',
            'rules' => array(
                'api/<controller:\w+>' => array('<controller>/restList', 'verb' => 'GET'),
                'api/<controller:\w+>/<id:\w*>' => array('<controller>/restView', 'verb' => 'GET'),
                'api/<controller:\w+>/<id:\w*>/<var:\w*>' => array('<controller>/restView', 'verb' => 'GET'),
                'api/<controller:\w+>/<id:\w*>/<var:\w*>/<var2:\w*>' => array('<controller>/restView', 'verb' => 'GET'),
                array('<controller>/restCreate', 'pattern' => 'api/<controller:\w+>', 'verb' => 'POST'),
                array('<controller>/restCreate', 'pattern' => 'api/<controller:\w+>/<id:\w+>', 'verb' => 'POST'),
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        'db' => array(
            'connectionString' => 'sqlite:' . dirname(__FILE__) . '/../data/testdrive.db',
        ),
        // uncomment the following to use a MySQL database
        /*
          'db'=>array(
          'connectionString' => 'mysql:host=localhost;dbname=testdrive',
          'emulatePrepare' => true,
          'username' => 'root',
          'password' => '',
          'charset' => 'utf8',
          ),
         */
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            // uncomment the following to show log messages on web pages
            /*
              array(
              'class'=>'CWebLogRoute',
              ),
             */
            ),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
    ),
);