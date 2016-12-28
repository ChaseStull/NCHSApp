<?php
	require("../filesystem/json.php");
	if(isset($_POST["group_id"])||isset($_POST["group_name"]))
	{
		if(isset($_POST["group_id"]))
		{
			$group_id = $_POST["group_id"];
		}
		else if(isset($_POST["group_name"]))
		{
			$group_id = $_POST["group_name"];
		}
		$post_title = $_POST["title"];
		$post_type = $_POST["type"];
		$post_body = $_POST["body"];
		$group_array = get_array_from_file("../../groups/".$group_id.".json", false);
		
		$group_members = $group_array[5];
		$group_posts = array_reverse($group_array[6]);
		$post = array($_COOKIE["userid"]." to ".$group_array[0], $post_title, $post_type, $post_body, null);
		array_push($group_posts, $post);
		$group_array[6] = array_reverse($group_posts);
		write_array("../../groups/".$group_id.".json", $group_array);
		
		for($i = 0; $i < count($group_members); $i++)
		{
			$user_feed = array_reverse(get_array_from_file("../../users/".sha1($group_members[$i])."/feed.json", false));
			if($user_feed == null)
			{
				$user_feed = array($post);
			}
			else
			{
				array_push($user_feed, $post);
			}
			write_array("../../users/".sha1($group_members[$i])."/feed.json", array_reverse($user_feed));
		}
		
		echo "<script>onload = location.assign(\"../..\");</script>";
	}
?>