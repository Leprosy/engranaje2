<?php
/* Bootstrap */
define('ENG_APP_PATH', dirname(__FILE__) . '/');
define('ENG_REQUEST_METHOD', $_SERVER['REQUEST_METHOD']);
define('ENG_REMOTE_ADDR', $_SERVER['REMOTE_ADDR']);
define('ENG_DBHOST', 'localhost');
define('ENG_DBUSER', 'root');
define('ENG_DBPASS', 'leprosy');
define('ENG_DBNAME', 'eng2');
define('ENG_PAGELIMIT', 20);
define('ENG_UPLOADPATH', '/var/www/engranaje2/uploads/');

define('ENG_BASE_URL', 'http://localhost/engranaje2/web/');
define('ENG_AKISMET_API_KEY', '921702d611eb');
define('ENG_IMAGESIZE', '128x128,400x200');

include(ENG_APP_PATH . 'lib/Autoloader.php');
spl_autoload_register(array('Autoloader', 'loadClass'));

/* Front controller */
try {
    if (!isset($_GET['url'])) {
        $_GET['url'] = null;
    }

    $url = explode('/', $_GET['url']);
    $module = isset($url[0]) ? $url[0] : null;

    if ($module == null) {
        throw new Exception('module_not_found ' . $module);
    }

    $action = strtolower(ENG_REQUEST_METHOD) . '_' . (isset($url[1]) ? $url[1] : 'index');

    /* ids/slugs/keys */
    if (isset($url[2])) {
        $_GET['id'] = $url[2];
    }

    if (class_exists($module, true)) {
        $M = new $module();

        /* Predispatch hook */
        if (method_exists($M, 'predispatch')) {
            $M->predispatch();
        }

        /* Action requested */
        if (method_exists($M, $action)) {
            $M->$action();
        } else {
            throw new Exception('action_not_found ' . $action);
        }

        /* Postdispatch hook */
        if (method_exists($M, 'postdispatch')) {
            $M->postdispatch();
        }
    } else {
        throw new Exception('module_not_found ' . $module);
    }
} catch(Exception $e) {
    die('ERROR: ' . $e->getMessage());
}
