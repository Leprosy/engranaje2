<?php
// Derived Constants
// (NOTE that these are not needed by LightVC, but are usually useful in the app layer.)
define('APP_PATH', dirname(dirname(__FILE__)) . '/');
define('APP_ENV', 'dev');
define('WWW_BASE_PATH', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));

// Include and configure the LighVC framework
// Autoloader(add class paths for external libraries)
include_once(APP_PATH . 'modules/Lvc_Autoloader.class.php');
Lvc_Autoloader::addClassPath(APP_PATH . 'modules/lightvc/');
Lvc_Autoloader::setCacheFilePath('/tmp/lvc_class_cache.txt');
spl_autoload_register(array('Lvc_Autoloader', 'loadClass'));

Lvc_Config::addControllerPath(APP_PATH . 'controllers/');
Lvc_Config::addControllerViewPath(APP_PATH . 'views/');
Lvc_Config::addLayoutViewPath(APP_PATH . 'views/layouts/');
Lvc_Config::addElementViewPath(APP_PATH . 'views/elements/');
Lvc_Config::setViewClassName('AppView');

// Lvc doesn't autoload the AppController, so we have to do it: (this also means we can put it anywhere)
include(APP_PATH . 'classes/AppController.class.php');
include(APP_PATH . 'classes/AppView.class.php');

// Load Routes
include(dirname(__FILE__) . '/routes.php');

//Session
$aux = Lvc_Session::getInstance();



/* App configuration */
//EngranajeCMS
Lvc_Autoloader::addClassPath(APP_PATH . 'modules/cough/');
Lvc_Autoloader::addClassPath(APP_PATH . 'modules/model/');
Lvc_Autoloader::addClassPath(APP_PATH . 'modules/form/');

//DB Parameters
CoughDatabaseFactory::addConfig(array(
			'adapter' => 'as',
			'driver' => 'mysql',
			'host' => '127.0.0.1',
			'user' => 'root',
			'pass' => 'leprosy',
			'aliases' => array('engranaje2'),
		));