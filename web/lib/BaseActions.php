<?php
class BaseActions {
    function __call($name, $data) {
        throw new Exception('no_action ' . $name);
    }

    function home($data) {
        $this->posts = self::getRequest('?module=node&limit=10');
    }

    function post($data) {
        $post = self::getRequest('?module=node&id=' . $data['slug']);

        if (count($post)) {
            $this->post = $post[0];
        } else {
            $this->post = null;
        }
    }

    function term($data) {
        $this->posts = self::getRequest('?module=node&limit=10&term=' . $data['term']);
    }

    function doAction($action, $data) {
        /* Call action logic */
        $this->$action($data);

        /* Use the template */
        $view = 'view/' . $action . '.php';

        if (file_exists($view)) {
            require($view);
        } else {
            throw new Exception('no_template ' . $view);
        }
    }

    protected function getRequest($res) {
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