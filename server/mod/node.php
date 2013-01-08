<?php
class node {
    public $valid = array('user_id', 'title', 'content', 'description');

    function predispatch() {
        header('Content-type: application/json');
    }

    function postdispatch() {}

    function isValid($data) {
        foreach ($this->valid as $field) {
            if (!isset($data[$field])) {
                return false;
            }
        }

        return true;
    }

    function sendError($msg, $code = 404) {
        Server::sendHttpCode($code);
        die(json_encode(array('msg' => $msg, 'http_code' => $code)));
    }

    function get_index() {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $id = isset($_GET['id']) ? $_GET['id'] : false;
        $term = isset($_GET['term']) ? $_GET['term'] : false;
        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : ENG_PAGELIMIT;

        $db = Server::getDb();
        $nodes = $db->node()
                    ->where('status', 'published')
                    ->where('node.published_at <= ?', date('Y-m-d H:i:s'))
                    ->order('node.published_at DESC')
                    ->limit($limit, $limit * ($page - 1));

        if ($id) {
            if (is_numeric($id)) {
                $nodes->where('id', $id);
            } else {
                $nodes->where('slug', $id);
            }
        }

        if ($term) {
            $terms = $db->term('slug', $term);

            foreach ($terms as $t) {
                $term = $t['id'];
            }

            $nodes->where('node_term:term_id', $term);            
        }

        if (count($nodes) > 0) {
            Server::sendHttpCode(200);
            $result = array();

            foreach ($nodes as $node) {
                $res = $node->toArray();
                $res['terms'] = array();

                foreach($node->node_term() as $term) {
                    $res['terms'][] = $term->term->toArray();
                }

                $result[] = $res;
            }

            echo json_encode($result);
        } else {
            $this->sendError("not_found", 404);
        }
    }

    function post_index() {
        if ($this->isValid($_POST)) {
            $db = Server::getDb();
            $row = $db->node()->insert($_POST);
            die(json_encode($row));
        } else {
            $this->sendError("invalid_fields", 400);
        }
    }
}
