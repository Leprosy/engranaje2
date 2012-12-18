<?php
class Router {
    static function getRoute() {
        /* Requested url */
        if (isset($_GET['url'])) {
            $url = $_GET['url'];
        } else {
            $url = '';
        }

        /* Get rules and match'em */
        global $_engRoutes;

        foreach ($_engRoutes as $rule => $data) {
            if (preg_match($rule, $url, $matches)) {
                $action = $data['action'];
                $newdata = array();

                if (isset($data['params'])) {
                    foreach ($data['params'] as $i => $param) {
                        $newdata[$param] = $matches[$i + 1];
                    }
                }

                $data = $newdata;
                unset($newdata);
                break;
            }
        }

        return array($action, $data);
    }
}