<?php

class HomeController extends AppController {

    protected function beforeAction() {
        /*$ses = Lvc_Session::getInstance();
        
        if (!$ses->get('login')) {
            $this->redirect(Lvc::url('login/index'));
        }*/
    }

    public function actionIndex() { 
        $conn = Doctrine_Manager::connection('mysql://root:leprosy@localhost/engranaje2', 'doctrine');
        /*$tmp = NodeTable::getInstance();
        var_dump($tmp); die(); */
        
        $node = new Node();
        die('ok');
    }
    
    public function actionTest() {
        $conn = Doctrine_Manager::connection('mysql://root:leprosy@localhost/engranaje2', 'doctrine');
        Doctrine_Core::generateModelsFromDb(
            Lvc::path('modules/model'),
            array('doctrine'),
            array('generateTableClasses' => true)
        );
        die('ok');
    }

}
