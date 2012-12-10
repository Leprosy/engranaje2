<?php
class node {
    function predispatch() {
        header('Content-type: application/json');
    }

    function postdispatch() {}

    function get_index() {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $id = isset($_GET['id']) ? $_GET['id'] : false;
        $db = Server::getDb();
        $nodes = $db->node
                    ->where("status", "published")
                    ->order("published_at DESC")
                    ->limit(ENG_PAGELIMIT, ENG_PAGELIMIT * ($page - 1));

        if ($id) {
            if (is_numeric($id)) {
                $nodes->where("id", $id);
            } else {
                $nodes->where("slug", $id);
            }
        }

        if (count($nodes) > 0) {
            Server::sendHttpCode(200);
            $result = array();

            foreach ($nodes as $node) {
                $result[] = $node->toArray();
            }
        
            echo json_encode($result);
        } else {
            Server::sendHttpCode(404);
        }
    }
}
