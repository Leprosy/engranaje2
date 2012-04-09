<?php

class HomeController extends AppController {

    protected function beforeAction() {}

    public function actionIndex() {
        $post = Node::constructByKey(1);
        $this->setVar('post', $post);

        $form = new NodeForm();
        $form->setValue('user_id', 1);
        $form->setAction(Lvc::url('home/index'));
        $this->setVar('form', $form);

        if (isset($_POST['id'])) {
            $form->bind($_POST);

            if ($form->isValid()) {
                $post = new Node();
                $post->setFields($_POST);
                $post->save();
            } else {
                $ses = Lvc_Session::getInstance();
                $ses->setFlash('error', 'OAW!!');
            }

        }
    }

}
