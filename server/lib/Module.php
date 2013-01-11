<?php
class Module {
    public $valid = array();
    public $name = 'module';

    function predispatch() {}
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

    function save($data) {
        if (!$this->isValid($data)) {
            $this->sendError("invalid_fields", 400);
        }

        /* Store */
        $name = $this->name;
        $db = Server::getDb();
        $row = $db->$name()->insert($data);

        if ($row) {
            Server::sendHttpCode(201);
            die(json_encode(array('id' => $row['id'], 'http_code' => 201)));
        } else {
            $this->sendError("invalid_fields", 400);
        }
    }
}
