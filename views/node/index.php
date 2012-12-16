<?php
$result = array();

while ($row = $posts->fetch()) {
	$result[] = $row->toArray();
}

echo json_encode($result);