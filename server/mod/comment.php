<?php
class comment extends Module {
    public $valid = array('node_id', 'user', 'mail', 'content');
    public $name = 'comment';

    function predispatch() {
        header('Content-type: application/json');
    }

    function get_index() {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $node_id = isset($_GET['node_id']) ? (int)$_GET['node_id'] : false;
        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : ENG_PAGELIMIT;

        $db = Server::getDb();
        $items = $db->comment()
                    ->where('status', 'published')
                    ->where('comment.node_id', $node_id)
                    ->order('comment.published_at ASC')
                    ->limit($limit, $limit * ($page - 1));

        if (count($items) > 0) {
            Server::sendHttpCode(200);
            $result = array();

            foreach ($items as $item) {
                $res = $item->toArray();
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
        $data['published_at'] = $date;

        /* Spam detection */
        $data['status'] = 'published';

        $akismet = new Akismet(ENG_BASE_URL, ENG_AKISMET_API_KEY);
        $akismet->setCommentAuthor(isset($data['user']) ? $data['user'] : '');
        $akismet->setCommentAuthorEmail(isset($data['mail']) ? $data['mail'] : '');
        $akismet->setCommentAuthorURL('');
        $akismet->setCommentContent(isset($data['content']) ? $data['content'] : '');
        $akismet->setPermalink('');

        if ($akismet->isCommentSpam()) {
            $data['status'] = 'spam';
        }

        /* Store */
        if ($result = $this->save($data)) {
            Server::sendHttpCode(201);
            die(json_encode($result));
        } else {
            $this->sendError("invalid_insert", 400);
        }
    }

    function post_update() {
        
    }
}
