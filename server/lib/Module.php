<?php
class Module {
    public $valid = array();
    public $name = 'module';

    function predispatch() {}
    function postdispatch() {}

    function isInvalid($data) {
        foreach ($this->valid as $field) {
            if (!isset($data[$field]) || $data[$field] == '') {
                return $field;
            }
        }

        return false;
    }

    function sendError($msg, $code = 404) {
        Server::sendHttpCode($code);
        die(json_encode(array('msg' => $msg, 'http_code' => $code)));
    }

    function save($data) {
        /* Store */
        $name = $this->name;
        $db = Server::getDb();
        $row = $db->$name()->insert($data);

        if ($row) {
            return array('id' => $row['id'], 'http_code' => 201);
        } else {
            return false;
        }
    }

    function checkToken() {
        if (isset($_POST['token'])) {
            $token = $_POST['token'];
            $db = Server::getDb();
            $key  = $db->token()
                       ->where('token', $token)
                       ->order('expires_at DESC')
                       ->limit(1)
                       ->fetch();
    
            if ($key) {
                $key = $key->toArray();

                return strtotime($key['expires_at']) > time();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
