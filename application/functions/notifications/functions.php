<?php
	function create_notification($title, $body)
	{
		$note = array($title, $body);
		return $note;
	}
	function send_notification($notification, $user_filepath_array)
	{
		for($i = 0; $i < count($user_filepath_array); $i++)
		{
			$notes = array_reverse(get_array_from_file($user_filepath_array[$i]."/notifications.json", false));
			array_push($notes, $notification);
			write_array($user_filepath_array[$i]."/notifications.json", array_reverse($notes));
		}
	}
?>