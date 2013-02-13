<?php
class BaseActions {
    public $forward = false; 

    function __call($name, $data) {
        throw new Exception('no_action ' . $name);
    }

    function home($data) {
        $this->posts = self::getRequest('node?limit=10');

        if (isset($this->posts->http_code)) {
            $this->forwardTo('error404', $data);
        }
    }

    function rss($data) {
        header('Content-Type: text/xml; charset=UTF-8');

        $this->posts = self::getRequest('node?limit=30');

        if (isset($this->posts->http_code)) {
            $this->forwardTo('error404', $data);
        }
    }

    function post($data) {
        $post = self::getRequest('node/index/' . $data['slug']);

        if (!isset($post->http_code)) {
            $this->post = $post[0];
            $this->comments = self::getRequest('comment?node_id=' . $post[0]->id);

            if (isset($this->comments->http_code)) {
                $this->comments = null;
            }
        } else {
            $this->post = null;
            $this->forwardTo('error404', $data);
        }
    }

    function error404() {
        /* call an ambulance */
        header('HTTP/1.1 404 Not Found');
    }

    function term($data) {
        $this->posts = self::getRequest('node?limit=10&term=' . $data['term']);
    }

    function comment($data) {
        if (!isset($_POST['node_id'])) {
            $this->forwardTo('error404', $data);
        } else {
            $data = sprintf("node_id=%s&user=%s&mail=%s&content=%s",
                        (isset($_POST['node_id']) ? $_POST['node_id'] : ''),
                        (isset($_POST['user']) ? $_POST['user'] : ''),
                        (isset($_POST['mail']) ? $_POST['mail'] : ''),
                        (isset($_POST['content']) ? $_POST['content'] : ''));
            $post = self::postRequest('comment', $data);

            if (isset($post->http_code) && $post->http_code != '201') {
                header('HTTP/1.1 400 Bad Request');
            }

            die(json_encode($post));
        }
    }

    function doAction($action, $data) {
        /* Call action logic */
        $this->$action($data);

        /* Forward? */
        if ($this->forward) {
            $data = $this->forward;
            $this->forward = false;
            $this->doAction($data['action'], $data['data']);
            
        } else {
            /* Finish request and use the template */
            $view = 'content/' . $action . '.php';
    
            if (file_exists($view)) {
                require($view);
            } else {
                throw new Exception('no_template ' . $view);
            }
        }
    }

    function forwardTo($action, $data) {
        $this->forward = array('action' => $action, 'data' => $data);
    }

    protected function getRequest($res) {
        $ch = curl_init();
        $url = SERVER_URL . $res;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, REQ_TIMEOUT);
        $data = json_decode(curl_exec($ch));
        curl_close($ch);

        return $data; 
    }

    protected function postRequest($res, $data) {
        $ch = curl_init();
        $url = SERVER_URL . $res;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, REQ_TIMEOUT);
        $data = json_decode(curl_exec($ch));
        curl_close($ch);

        return $data;
    }
}