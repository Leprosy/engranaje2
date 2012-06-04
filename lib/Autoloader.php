<?php

/**
 * Autoloader is a class autoloader, duh.
 * 
 * @package default
 * @author Miguel Rojas
 * @version 2012-04-17
 * */
class Autoloader {
    /**
     * Returns true if the class file was found and included, false if not.
     *
     * @return boolean
     * */
    public static function loadClass($className) {
        $auxpath  = str_replace('_', '/', $className);
        $filePath =  CLASS_PATH . $auxpath . '.php';

        if (file_exists($filePath)) {
            include($filePath);
            return true;
        } else {
            return false;
        }
    }
}