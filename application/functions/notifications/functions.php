<?php
	//require("../filesystem/json.php");
	function create_notification($user_alerts_filepath, $title, $body)
	{
		$current_user_alerts = get_array_from_file($user_alerts_filepath, false);
		$reverse_array = array_reverse($current_user_alerts);
		$new_note = array($title, $body);
		array_push($reverse_array, $new_note);
		$current_user_alerts = array_reverse($reverse_array);
		write_array($user_alerts_filepath, $current_user_alerts);
	}
?>