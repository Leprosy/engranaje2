<?php

/**
 * A Session wrapper object
 * 
 * 
 * @package lightvc
 * @author Miguel Rojas
 * @since 2012-01-12
 * */
class Lvc_Session {

    protected $namespace;
    static protected $instance = null;

    public static function getInstance($cookieName = 'PHP_SESS_ID', $namespace = 'LVC') {
        if (is_null(self::$instance)) {
            self::$instance = new Lvc_Session($cookieName, $namespace);
        }

        return self::$instance;
    }

    protected function __construct($cookieName, $namespace) {
        $this->namespace = $namespace;
        session_name($cookieName);
        session_start();
    }

    public function set($key, $value) {
        $_SESSION[$this->getKey($key)] = $value;
    }

    public function get($key) {
        if (isset($_SESSION[$this->getKey($key)])) {
            return $_SESSION[$this->getKey($key)];
        } else {
            return false;
        }
    }

    public function remove($key) {
        $key = $this->getKey($key);
        unset($_SESSION[$key]);

        if (isset($_SESSION[$key . '_FLASH'])) {
            unset($_SESSION[$key]);
        }
    }

    public function setFlash($key, $value) {
        $this->set($key, $value);
        $this->set($key . '_FLASH', 1);
    }

    public function getFlash($key) {
        if ($this->get($key . '_FLASH')) {
            $value = $this->get($key);
            $this->remove($key);

            return $value;
        } else {
            return false;
        }
    }

    protected function getKey($key) {
        return $this->namespace . '_' . $key;
    }

    public function getNamespace() {
        return $this->namespace;
    }

    public function setNamespace($name) {
        $this->namespace = $name;
    }

}