<?php
/* Bootstrap */
session_start();
if (isset($_GET['debug'])) print_r($_SESSION);
include('config.php');
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
            /* Trottling */
            $ip = $_SERVER['REMOTE_ADDR'];
            $act = $module . '/' . $action;
            
            if (!isset($_SESSION[$ip])) { $_SESSION[$ip] = array(); }
            if (!isset($_SESSION[$ip][$act])) {
                $_SESSION[$ip][$act] = array('num' => 0, 'first' => time());
            }

            $_SESSION[$ip][$act]['num'] = $_SESSION[$ip][$act]['num'] + 1;
            $_SESSION[$ip][$act]['current'] = time();

            /* Do the request action */
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
    Server::sendHttpCode(400);
    die('ERROR: ' . $e->getMessage());
}
