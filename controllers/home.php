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
        
        $tmp = Doctrine_Query::create()
                ->from('Db_Node n')
                ->leftJoin('n.Db_User u');
                //->where('n.id = ?', 1);
//var_dump( $tmp->execute()->toArray() );

var_dump($conn);
$form = new Form_Node();
echo $form;

        die('ok');
    }
    
    public function actionTest() {
        $conn = Doctrine_Manager::connection('mysql://root:leprosy@localhost/engranaje2', 'doctrine');
        Doctrine_Core::generateModelsFromDb(
            Eng::path('doc/'),
            array('doctrine'),
            array('generateTableClasses' => true)
        );
        die('ok');
    }

}
