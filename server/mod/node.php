<?php
class node extends Module {
    public $valid = array('user_id', 'title', 'content', 'description');
    public $name = 'node';

    function predispatch() {
        header('Content-type: application/json');
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
        $data = $_POST;

        /* Timestamping */
        $date = date('Y-m-d H:i:s');
        $data['created_at'] = $date;
        $data['modified_at'] = $date;

        if (!isset($data['published_at'])) {
            $data['published_at'] = $date;
        }

        /* Slugify */

        /* Store */
        $this->save($data);
    }

    function post_update() {
        
    }
}
