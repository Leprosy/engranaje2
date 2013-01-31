<?php
class media extends Module {
    public $valid = array('user_id', 'title', 'type', 'description');
    public $name = 'media';

    function predispatch() {
        header('Content-type: application/json');
    }

    function get_index() {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $id = isset($_GET['id']) ? $_GET['id'] : false;
        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : ENG_PAGELIMIT;

        $db = Server::getDb();
        $media = $db->media()
                    ->where('status', 'published')
                    ->where('media.published_at <= ?', date('Y-m-d H:i:s'))
                    ->order('media.published_at DESC')
                    ->limit($limit, $limit * ($page - 1));

        if ($id) {
            if (is_numeric($id)) {
                $media->where('id', $id);
            } else {
                $media->where('slug', $id);
            }
        }

        if (count($media) > 0) {
            Server::sendHttpCode(200);
            $result = array();

            foreach ($media as $m) {
                $res = $m->toArray();
                $res['terms'] = array();
                $result[] = $res;
            }

            echo json_encode($result);
        } else {
            $this->sendError("not_found", 404);
        }
    }

    function post_index() {
        $data = $_POST;

        if ($field = $this->isInvalid($data)) {
            $this->sendError("invalid_field : " . $field, 400);
        }

        $db = Server::getDb();

        /* Timestamping */
        $date = date('Y-m-d H:i:s');
        $data['created_at'] = $date;
        $data['modified_at'] = $date;

        if (!isset($data['published_at'])) {
            $data['published_at'] = $date;
        }

        /* Slugify */
        $data['slug'] = Utils::slugify($data['title']);

        /* Check slug */
        $is = $db->node()->where('slug', $data['slug']);

        if (count($is) >= 1) {
            $data['slug'] .= '-2';
        }

        /* Uploading */
        if (isset($_FILES['file'])) {
            $name = ENG_UPLOADPATH . strtolower($_FILES['file']['name']);
            $fname = ENG_UPLOADPATH . pathinfo($name, PATHINFO_FILENAME);
            $ext = pathinfo($name, PATHINFO_EXTENSION);

            if (move_uploaded_file($_FILES['file']['tmp_name'], $name)) {
                $Img = new Resize($name);
                $Img->resizeImage(200, 200, 'crop');
                $Img->saveImage($fname . "_200x200." . $ext, 100);
                $Img->resizeImage(20, 20, 'crop');
                $Img->saveImage($fname . "_20x20." . $ext, 100);
                $data['content'] = strtolower($_FILES['file']['name']);
            }
        }

        /*print_r($data);
        print_r($_FILES);*/
        /* Store */
        /*if ($result = $this->save($data)) {
            Server::sendHttpCode(201);
            die(json_encode($result));
        } else {
            $this->sendError("invalid_insert", 400);
        }*/
    }

    function post_update() {
        
    }
}
