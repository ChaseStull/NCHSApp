<?php
	$body = $_POST["body"];
	$head = $_SERVER['REMOTE_ADDR'];
	$type = "post";
	$title = $_POST["title"];
	$post = array($head, $type, $title, $body, "null");
	
	$file = fopen("feed.json", "r");
	$content = fread($file, filesize("feed.json"));
	$content_array = json_decode($content, false, filesize("feed.json"));
	fclose($file);
	$post_array = array_reverse($content_array);
	array_push($post_array, $post);
	$content_array = array_reverse($post_array);
	$new_content = json_encode($content_array);
	
	$wfile = fopen("feed.json", "w");
	fwrite($wfile, $new_content);
	fclose($wfile);
	echo "<script>onload = location.assign(\"./\")</script>";
?>