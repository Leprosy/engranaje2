<?php

class NodeController extends AppController {
    public function actionIndex() {
        $page  = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $posts = "crap";
        $this->setVar('posts', $posts);
    }
}