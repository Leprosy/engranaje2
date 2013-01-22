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
        if ($field = $this->isInvalid($data)) {
            $this->sendError("invalid_field : " . $field, 400);
        }

        /* Store */
        $name = $this->name;
        $db = Server::getDb();
        $row = $db->$name()->insert($data);

        if ($row) {
            Server::sendHttpCode(201);
            die(json_encode(array('id' => $row['id'], 'http_code' => 201)));
        } else {
            $this->sendError("invalid_insert", 400);
        }
    }
}
