<?php
class Server {
    static $codes = array(
                    '200' => 'HTTP/1.1 200 OK',
                    '404' => 'HTTP/1.1 404 Not Found',
                    '400' => 'HTTP/1.1 400 Bad Request',
                    '500' => 'HTTP/1.1 500 Internal Server Error'            
    );
    static $db = null;

    static public function sendHttpCode($code) {
        header(self::$codes[$code]);
    }

    static public function getDb() {
        if (self::$db == null) {
            $pdo = new PDO(sprintf('mysql:host=%s;dbname=%s',
                            ENG_DBHOST,
                            ENG_DBNAME),
                            ENG_DBUSER, ENG_DBPASS);
            $pdo->exec("set names utf8");
            self::$db = new NotORM($pdo);
        }

        return self::$db;
    }
}
