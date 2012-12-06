<?php
while ($row = $posts->fetch()) {
	var_dump($row->toArray());
}