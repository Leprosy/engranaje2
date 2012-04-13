<?php

class PostController extends AppController {

    protected function beforeAction() {
        $ses = Lvc_Session::getInstance();

        if (!$ses->get('login')) {
            $this->redirect(Lvc::url('login/index'));
        }
    }

    public function actionIndex() {
        $page  = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $posts = Node_Collection::getList(array(
                    'page' => $page
                 ));

        $this->setVar('posts', $posts);
    }

    public function actionEdit($id = false) {
        if (!$id) {
            $this->redirect(Lvc::url('post'));
            die();
        }

        $post = Node::constructByKey($id);

        $form = new NodeForm();
        $form->bind($post->getFields());
        $form->setAction(Lvc::url('post/process'));

        $this->setVar('form', $form);
        $this->setVar('new', false);
        $this->loadView('post/new');
    }

    public function actionNew() {
        $ses = Lvc_Session::getInstance();

        $form = new NodeForm();
        $form->setValue('user_id', $ses->get('user_id'));
        $form->setAction(Lvc::url('post/process'));

        $this->setVar('form', $form);
        $this->setVar('new', true);
    }

    public function actionProcess() {
        if (isset($_POST['id'])) {
            $ses  = Lvc_Session::getInstance();
            $new  = ($_POST['id']=='');
            $form = new NodeForm();
            $form->bind($_POST);

            if ($form->isValid()) {
                if (!$new) {
                    $post = Node::constructByKey($_POST['id']);
                } else {
                    $post = new Node();
                }

                $post->setFields($_POST);

                if ($post->save()) {
                    $ses->setFlash('message', 'Información guardada');
                } else {
                    $ses->setFlash('error', 'No se puede guardar la información en este momento');
                }

                $this->redirect(Lvc::url('post/edit/' . $post->getId()));
                die();
            } else {
                $ses->setFlash('error', 'Debe ingresar la información correctamente');
                $this->setVar('form', $form);
                $this->loadView('post/new');
            }

        } else {
            $this->redirect(Lvc::url('post'));
            die();
        }
    }
}
