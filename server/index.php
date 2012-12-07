<?php
/* Bootstrap */
define('ENG_APP_PATH', dirname(__FILE__) . '/');
define('ENG_REQUEST_METHOD', $_SERVER['REQUEST_METHOD']);
define('ENG_REMOTE_ADDR', $_SERVER['REMOTE_ADDR']);

include(ENG_APP_PATH . 'lib/Autoloader.php');
spl_autoload_register(array('Autoloader', 'loadClass'));

/* Front controller */
try {
    $module = isset($_GET['module']) ? $_GET['module'] : null;

    if ($module == null) {
        throw new Exception('module_not_found ' . $module);
    }

    $action = strtolower(ENG_REQUEST_METHOD) . '_' . (isset($_GET['action']) ? $_GET['action'] : 'index');

    if (class_exists($module, true)) {
        $M = new $module();

        if (method_exists($M, $action)) {
            $M->$action();
        } else {
            throw new Exception('action_not_found ' . $action);
        }
    } else {
        throw new Exception('module_not_found ' . $module);
    }
} catch(Exception $e) {
    die('ERROR: ' . $e->getMessage());
}
