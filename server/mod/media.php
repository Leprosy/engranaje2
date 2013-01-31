<?php
class media extends Module {
    public $valid = array('user_id', 'title', 'type', 'description');
    public $name = 'media';

    function predispatch() {
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
    }

    function get_index() {
        header('Content-type: application/json');
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

    function get_view() {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $id = isset($_GET['id']) ? $_GET['id'] : false;

        if (!$id) {
            $this->sendError("not_found", 404);
        }
    
        $db = Server::getDb();
        $media = $db->media()
                    ->where('status', 'published')
                    ->where('media.published_at <= ?', date('Y-m-d H:i:s'))
                    ->order('media.published_at DESC')
                    ->limit(1);
    
        if (is_numeric($id)) {
            $media->where('id', $id);
        } else {
            $media->where('slug', $id);
        }

        if (count($media) > 0) {
            Server::sendHttpCode(200);
            $result = array();
    
            foreach ($media as $m) {
                $res = $m->toArray();
                $res['terms'] = array();
                $result[] = $res;
            }

            $file = ENG_UPLOADPATH . $result[0]['content'];

            if (isset($_GET['s'])) {
                $file = ENG_UPLOADPATH . pathinfo($file, PATHINFO_FILENAME) . '_' . $_GET['s'] . '.' . pathinfo($file, PATHINFO_EXTENSION);
            }

            if (file_exists($file)) {
                $f = fopen($file, 'rb');
                $contents = fread($f, filesize($file));
                header('Content-Type: image');
                echo $contents;
            } else {
                $this->sendError("file_not_found", 404);
            }
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
        $is = $db->media()->where('slug', $data['slug']);

        if (count($is) >= 1) {
            $data['slug'] .= '-2';
        }

        /* Uploading */
        if (isset($_FILES['file'])) {
            $name = ENG_UPLOADPATH . strtolower($_FILES['file']['name']);
            $fname = ENG_UPLOADPATH . pathinfo($name, PATHINFO_FILENAME);
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            $sizes = explode(',', ENG_IMAGESIZE);

            if (move_uploaded_file($_FILES['file']['tmp_name'], $name)) {
                $Img = new Resize($name);

                foreach ($sizes as $size) {
                    $d = explode('x', $size);
                    $Img->resizeImage($d[0], $d[1], 'crop');
                    $Img->saveImage($fname . "_" . $size . "." . $ext, 100);
                }

                $data['content'] = strtolower($_FILES['file']['name']);
            }
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
