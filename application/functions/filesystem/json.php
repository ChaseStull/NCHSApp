<?php
	function get_array_from_file($filepath, $with_keys)
	{
		$filesize = filesize($filepath);
		$file = fopen($filepath, "r");
		$content = fread($file, $filesize);
		if($content == "")
		{
			return null;
		}
		else
		{
			$content_array = json_decode($content, $with_keys, $filesize);
			fclose($file);
			return $content_array;
		}
	}
	
	function write_array($filepath, $content_array)
	{
		$new_content = json_encode($content_array);
		$file = fopen($filepath, "w");
		fwrite($file, $new_content);
		fclose($file);
	}
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