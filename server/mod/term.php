<?php
class term {
    function predispatch() {
        header('Content-type: application/json');
    }

    function postdispatch() {}

    function get_index() {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $id = isset($_GET['id']) ? $_GET['id'] : false;
        $term = isset($_GET['term']) ? $_GET['term'] : false;
        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : ENG_PAGELIMIT;

        $db = Server::getDb();
        $terms = $db->term()
                    ->order('term.slug')
                    ->limit($limit, $limit * ($page - 1));

        if ($id) {
            if (is_numeric($id)) {
                $terms->where('id', $id);
            } else {
                $terms->where('slug', $id);
            }
        }

        if (count($terms) > 0) {
            Server::sendHttpCode(200);
            $result = array();

            foreach ($terms as $term) {
                $res = $term->toArray();
                $result[] = $res;
            }

            echo json_encode($result);
        } else {
            Server::sendHttpCode(404);
        }
    }
}
