<?php
	require("../filesystem/json.php");
	$userid = $_COOKIE["userid"];
	$user_root = "../../users/".sha1($userid);
	$feed = get_array_from_file($user_root."/feed.json", false);
	
	function filter_posts_by_group($groupid)
	{
		
	}
?>