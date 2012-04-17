<?php
// Derived Constants
// (NOTE that these are not needed by LightVC, but are usually useful in the app layer.)
define('APP_PATH', dirname(dirname(__FILE__)) . '/');
define('APP_ENV', 'dev');
define('WWW_BASE_PATH', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));
define('CLASS_PATH', APP_PATH . 'lib/');

// Include and configure the LighVC framework
// Autoloader(add class paths for external libraries)
include_once(APP_PATH . 'lib/Autoloader.php');
spl_autoload_register(array('Autoloader', 'loadClass'));

Eng_Config::addControllerPath(APP_PATH . 'controllers/');
Eng_Config::addControllerViewPath(APP_PATH . 'views/');
Eng_Config::addLayoutViewPath(APP_PATH . 'views/layouts/');
Eng_Config::addElementViewPath(APP_PATH . 'views/elements/');
Eng_Config::setViewClassName('AppView');

// Lvc doesn't autoload the AppController, so we have to do it: (this also means we can put it anywhere)
include(APP_PATH . 'classes/AppController.class.php');
include(APP_PATH . 'classes/AppView.class.php');

// Load Routes
include(dirname(__FILE__) . '/routes.php');

//Session
$aux = Eng_Session::getInstance();



/* App configuration */
define('ENG_PAGESIZE', 3);