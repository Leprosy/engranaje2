<?php
class Actions {
    static function home($data) {
        $ch = curl_init();
        $url = SERVER_URL . '?module=node&limit=4';
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, REQ_TIMEOUT);
        $posts = json_decode(curl_exec($ch));
        curl_close($ch);

        include self::getView();
    }

    static function getView() {
        $d = debug_backtrace();
        $view = $d[1]['function'];
        return 'view/' . $view . '.php';
    }
}