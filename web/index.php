<?php
/* Bootstrap */
include 'config.php';
include 'lib/Autoloader.php';

/* Get requested route */
list($action, $data) = Router::getRoute();

/* Fire requested action */
Actions::$action($data);