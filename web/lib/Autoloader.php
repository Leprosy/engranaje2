<?php
class Autoloader {
    public static function loadClass($className) {
        $auxpath  = str_replace('_', '/', $className);
        $libPath =  dirname(__FILE__) . '/' . $auxpath . '.php';
        $viewPath = dirname(__FILE__) . '/../view/' . $auxpath . '.php';

        if (file_exists($libPath)) {
            include($libPath);
        } else if (file_exists($viewPath)) {
            include($viewPath);
        }
    }
}

spl_autoload_register(array('Autoloader', 'loadClass'));
