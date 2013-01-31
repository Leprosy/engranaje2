<?php
class Actions extends BaseActions {
    function home($data) {
        $this->posts = self::getRequest('node?limit=6');
    }
}