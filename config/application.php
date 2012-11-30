<?php
/* Derived Constants */
define('APP_PATH', dirname(dirname(__FILE__)) . '/');
define('APP_ENV', 'dev');
define('WWW_BASE_PATH', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));
define('CLASS_PATH', APP_PATH . 'lib/');

/* Include and configure the base framework */
include_once(APP_PATH . 'lib/Autoloader.php');
spl_autoload_register(array('Autoloader', 'loadClass'));

Eng_Config::addControllerPath(APP_PATH . 'controllers/');
Eng_Config::addControllerViewPath(APP_PATH . 'views/');
Eng_Config::addLayoutViewPath(APP_PATH . 'views/layouts/');
Eng_Config::addElementViewPath(APP_PATH . 'views/elements/');
Eng_Config::setViewClassName('AppView');

/* App controller */
include(APP_PATH . 'classes/AppController.class.php');
include(APP_PATH . 'classes/AppView.class.php');

/* Routing configuration */
include(dirname(__FILE__) . '/routes.php');

/* Start user session */
$aux = Eng_Session::getInstance();

/* Db Connection*/
$Eng_Db = new NotORM(new PDO('mysql:dbname=engranaje2;host=127.0.0.1', 'root', 'leprosy'));
