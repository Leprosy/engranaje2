<?php
class Autoloader {
    public static function loadClass($className) {
        $auxpath  = str_replace('_', '/', $className);
        $libPath =  dirname(__FILE__) . '/' . $auxpath . '.php';

        if (file_exists($libPath)) {
            include($libPath);
        }
    }
}

spl_autoload_register(array('Autoloader', 'loadClass'));
