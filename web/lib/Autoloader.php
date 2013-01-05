<?php
class Autoloader {
    public static function loadClass($className) {
        $auxpath  = str_replace('_', '/', $className);
        $libPath =  dirname(__FILE__) . '/' . $auxpath . '.php';
        $viewPath = dirname(__FILE__) . '/../content/' . $auxpath . '.php';

        if (file_exists($viewPath)) {
            include($viewPath);
        } else if (file_exists($libPath)) {
            include($libPath);
        }
    }
}

spl_autoload_register(array('Autoloader', 'loadClass'));
