<?php
class login extends Module {
    public $valid = array('login', 'password');
    public $name = 'user';

    function predispatch() {}

    function get_index() {
        echo json_encode('What are you looking at?');
    }

    function post_check() {
        echo json_encode($this->checkToken());
    }

    function post_index() {
        $data = $_POST;

        if ($field = $this->isInvalid($data)) {
            $this->sendError("invalid_field : " . $field, 400);
        }

        $db = Server::getDb();
        $user  = $db->user()
                    ->where('login', $data['login'])
                    ->where('password', sha1($data['password']))
                    ->limit(1)
                    ->fetch();

        if ($user) {
            $user = $user->toArray();

            /* Has a non expired key already? */
            $key  = $db->token()
                       ->where('user_id', $user['id'])
                       ->order('expires_at DESC')
                       ->limit(1)
                       ->fetch();

            $getKey = false;

            if ($key) {
                $key = $key->toArray();
                $getKey = !(strtotime($key['expires_at']) > time());
            } else {
                $getKey = true;
            }

            /* Give key if needed */
            if ($getKey) {
                $data = array();
                $data['user_id'] = $user['id'];
                $data['token'] = sha1(time());
                $data['created_at'] = date('Y-m-d H:i:s');
                $data['expires_at'] = date('Y-m-d H:i:s', strtotime('+15 day'));
                $row = $db->token()->insert($data);

                if ($row) {
                    Server::sendHttpCode(201);
                    echo json_encode($row->toArray());
                } else {
                    $this->sendError("token_cannot_be_generated", 400);
                }

            } else {
                $this->sendError("valid_key_already_issued", 400);
            }
        } else {
            $this->sendError("not_found", 404);
        }
    }

    function post_update() {
        
    }
}
