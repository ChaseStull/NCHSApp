<?php
	require("../filesystem/json.php");
	if(file_exists("../../groups/".sha1($_POST["name"]).".json") != true)
	{
		$name = $_POST["name"];
		$group_id = sha1($name);
		$group_description = $_POST["description"];
		$owner = $_COOKIE["userid"];
		$administrators = array($owner);
		$members = array($owner);
		$posts = array(array("System","Welcome", "post", "Welcome to your new group. If you are an administrator, you can add members and manage administrators in the \"Manage Group\" menu", null));
		$group_array = array($name, $group_id, $group_description, $owner, $administrators, $members, $posts);
		
		
		write_array("../../groups/".$group_id.".json", $group_array);
		
		$user_groups = get_array_from_file("../../users/".sha1($owner)."/groups.json", false);
		array_push($user_groups, $name);
		write_array("../../users/".sha1($owner)."/groups.json", $user_groups);
		
		
		echo "<script>onload = location.assign(\"../../?group_id=".$group_id."\");</script>";
	}
	else
	{
		echo "<body onclick='history.back();'>That group already exixts</body>";
	}
?>