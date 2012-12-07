<?php
class Autoloader {
    public static function loadClass($className) {
        $auxpath  = str_replace('_', '/', $className);
        $libPath =  ENG_APP_PATH . 'lib/' . $auxpath . '.php';
        $modPath =  ENG_APP_PATH . 'mod/' . $auxpath . '.php';

        if (file_exists($libPath)) {
            include($libPath);
        } else if (file_exists($modPath)) {
            include($modPath);
        }
    }
}
