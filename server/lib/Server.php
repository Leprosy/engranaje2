<?php
class Server {
    static $codes = array(
                    '200' => 'HTTP/1.1 200 OK',
                    '404' => 'HTTP/1.1 404 Not Found');
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
            self::$db = new NotORM($pdo);
        }

        return self::$db;
    }
}
