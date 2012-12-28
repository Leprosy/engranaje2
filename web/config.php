<?php
/* Constants */
define('BASE_URL', 'http://localhost/engranaje2/web/');
define('CONTENT_URL', 'http://localhost/engranaje2/web/content/');
define('SERVER_URL', 'http://localhost/engranaje2/server/');
define('REQ_TIMEOUT', 5);

/* Routes */
$_engRoutes = array(
        '/([0-9]+)\/([0-9]+)\/([a-z0-9\-]+)/' =>
            array(
                'action' => 'post',
                'params' => array('year', 'month', 'slug')
            ),

        '/term\/([a-z0-9\-]+)/' =>
            array(
                'action' => 'term',
                'params' => array('term')
            ),
        '/^$/' =>
            array(
                'action' => 'home'
            )
);