<?php
class Actions extends BaseActions {
    function home($data) {
        $this->posts = self::getRequest('?module=node&limit=3');
    }
}