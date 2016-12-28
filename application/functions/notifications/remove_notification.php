<?php
	require("../filesystem/json.php");
	$userid = $_COOKIE["userid"];
	$index = $_POST["index"];
	$notifications_array = get_array_from_file("../../users/".sha1($userid)."/notifications.json", false);
	$new_array = array();
	for($i = 0; $i < count($notifications_array); $i++)
	{
		if($i."." != $index.".")
		{
			array_push($new_array, $notifications_array[$i]);
		}
	}
	write_array("../../users/".sha1($userid)."/notifications.json", $new_array);
	echo "<script>onload = location.assign(\"../..\");</script>";
?>