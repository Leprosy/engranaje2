<?php
/**
 * Utils class for the LVC suite of classes.
 *
 * @package lightvc
 * @author Miguel Rojas
 * @since 2012-01-11
 **/

class Lvc {
    
    /**
     * Return an url, relative to the application in the LVC app.
     *
     * @var string $path
     * @return string The relative app path
     **/
    public static function url($path = '') {
        return WWW_BASE_PATH . $path;
    }
    
    /**
     * Return an absolute path in the LVC app.
     *
     * @var string $path
     * @return string The relative app path
     **/
    public static function path($path = '') {
        return APP_PATH . $path;
    }
}