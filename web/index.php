<?php
try {
    /* Bootstrap */
    include 'config.php';
    include 'lib/Autoloader.php';

    /* Get requested route */
    list($action, $data) = Router::getRoute();

    /* Fire requested action */
    if (class_exists('Actions')) {
        $A = new Actions();
    } else {
        $A = new BaseActions();
    }

    $A->doAction($action, $data);

} catch(Exception $e) {
    /* Errors handled */
    echo "<hr />" . $e->getMessage() . "<hr />";
}