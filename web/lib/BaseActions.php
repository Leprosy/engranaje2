<?php
class BaseActions {
    public $forward = false; 

    function __call($name, $data) {
        throw new Exception('no_action ' . $name);
    }

    function home($data) {
        $this->posts = self::getRequest('node?limit=10');
    }

    function post($data) {
        $post = self::getRequest('node/index/' . $data['slug']);

        if (!isset($post->http_code)) {
            $this->post = $post[0];
            $this->comments = self::getRequest('?module=comment&node_id=' . $post[0]->id);

            if (isset($this->comments->http_code)) {
                $this->comments = null;
            }
        } else {
            $this->post = null;
            $this->forwardTo('error404', $data);
        }
    }

    function error404() { /* call an ambulance */ }

    function term($data) {
        $this->posts = self::getRequest('node?limit=10&term=' . $data['term']);
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
}