<?php

try {
    /* Bootstrap */
    include 'config.php';
    include 'lib/Autoloader.php';
    
    /* Get requested route */
    list($action, $data) = Router::getRoute();
    
    /* Fire requested action */
    $A = new Actions();
    $A->doAction($action, $data);

} catch(Exception $e) {
    /* Errors handled */
    echo "<hr />" . $e->getMessage() . "<hr />";
}