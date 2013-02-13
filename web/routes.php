<?php
/* Routes */
$_engRoutes = array(
        '/^([0-9]+)\/([0-9]+)\/([a-z0-9\-]+)/' =>
        array(
                'action' => 'post',
                'params' => array('year', 'month', 'slug')
        ),

        '/^term\/([a-z0-9\-]+)/' =>
        array(
                'action' => 'term',
                'params' => array('term')
        ),

        '/^comment/' =>
        array(
                'action' => 'comment'
        ),

        '/^rss/' =>
        array(
                'action' => 'rss'
        ),

        '/^$/' =>
        array(
                'action' => 'home'
        )
);