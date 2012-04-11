<?php

class LoginController extends AppController {

    protected function beforeAction() {}

    public function actionIndex() {
        $ses = Lvc_Session::getInstance();
        
        /* Already logged? */
        if ($ses->get('login')) {
            $this->redirect(Lvc::url('home/index'));
        }

        if (isset($_POST['login'])) {
            /* Process login info */
            if ($user = User::getUser($_POST['login'], $_POST['password'])) {
                $ses->set('login', TRUE);
                $ses->set('user', $user->getName());
                $ses->set('user_id', $user->getId());
                
                $this->redirect(Lvc::url());
            } else {
                $ses->setFlash('error', 'Login incorrecto');
            }
        }
    }
}
