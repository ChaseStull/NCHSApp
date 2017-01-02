<?php
	function create_notification($title, $body)
	{
		$note = array($title, $body);
		return $note;
	}
	function send_notification($user_array)
	{
		for($i = 0; $i < count($user_array); $i++)
		{
			
		}
	}
?>