<?php
class Actions extends BaseActions {
    function home($data) {
        $this->posts = self::getRequest('node?limit=6');

        if (isset($this->posts->http_code)) {
            $this->forwardTo('error404', $data);
        }
    }
}