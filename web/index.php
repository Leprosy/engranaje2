<?php
var_dump($_GET);

/* Bootstrap */
include 'config.php';
include 'lib/functions.php';

/* Preparing data */
$ch = curl_init();
$timeout = 5;
$url = SERVER_URL . '?module=node&limit=4';
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$posts = json_decode(curl_exec($ch));
curl_close($ch);

include 'view/template.php';