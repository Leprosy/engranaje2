<?php

class NodeController extends AppController {
    public function actionIndex() {
    	global $Eng_Db;

        $page  = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $posts = $Eng_Db->node()
        				->where(array('status' => 'published'));

        $this->setVar('posts', $posts);
    }
}