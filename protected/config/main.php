<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'หน่วยยานพาหนะ',
    'timeZone' => 'Asia/bangkok',
    // preloading 'log' component
    'preload' => array('log'),
    'language' => 'th',
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.modules.*',
        'application.components.*',
        'application.helpers.*',
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => false,
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array($_SERVER['REMOTE_ADDR'], '::1'),
        ),
        'report',
    ),
    // application components
    'components' => array(
        'user' => array(
            // enable cookie-based authentication
            'class' => 'WebUser',
            'allowAutoLogin' => true,
            'loginUrl' => array('/site/index'),
        ),
        'clientScript' => array(
            'scriptMap' => array(
//                'jquery.js' => false,
//                'jquery.min.js' => false,
            ),
        ),
        // uncomment the following to enable URLs in path-format
          'urlManager'=>array(
              'urlFormat'=>'path',
              'rules'=>array(
                  '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                  '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                  '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
              ),
          ),
//        'db' => array(
//            'connectionString' => 'sqlite:' . dirname(__FILE__) . '/../data/testdrive.db',
//        ),
        // uncomment the following to use a MySQL database
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=asevensoft_car',
            'emulatePrepare' => true,
            'username' => 'homestead',
            'password' => 'secret',
            'charset' => 'utf8',
        ),
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
        'pageSize' => 20,
        'summaryTextGrid' => 'แสดงจาก {start}-{end} จากทั้งหมด {count}',
        'summaryTextList' => 'แสดงจาก {start}-{end} จากทั้งหมด {count}',
        'pathUpload' => './upload/',
        'pathUploadToShow' => '/upload/',
        'errorSummaryHeader' => 'กรุณาตรวจสอบข้อผิดพลาดข้างล่าง',
        'confirmationMessage' => 'ตุณต้องการลบรายการหรือไม่',
        'confirmationMessageStart' => 'ตุณต้องการลบ',
        'confirmationMessageEnd' => 'หรือไม่?',
    ),
);
