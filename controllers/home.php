<?php

class HomeController extends AppController {

    protected function beforeAction() {
        $ses = Lvc_Session::getInstance();
        
        if (!$ses->get('login')) {
            $this->redirect(Lvc::url('login/index'));
        }
    }

    public function actionIndex() {}

}
