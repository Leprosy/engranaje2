<?php
function permalink($post) {
	$date = explode('-', $post->published_at);
	return sprintf("%s%s/%s/%s", BASE_URL, $date[0], $date[1], $post->slug);
}

function reldate($str) {
	return "Hace eones";
}