<?php
class Actions {
    static function home($data) {
        $posts = self::getRequest('?module=node&limit=4');
        include self::getView();
    }

    static function post($data) {
        $post = self::getRequest('?module=node&id=' . $data['slug']);

        if (count($post)) {
            $post = $post[0];
        } else {
            $post = null;
        }

        include self::getView();
    }

    static function getView() {
        $d = debug_backtrace();
        $view = $d[1]['function'];
        return 'view/' . $view . '.php';
    }

    static function getRequest($res) {
        $ch = curl_init();
        $url = SERVER_URL . $res;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, REQ_TIMEOUT);
        $data = json_decode(curl_exec($ch));
        curl_close($ch);

        return $data; 
    }
}