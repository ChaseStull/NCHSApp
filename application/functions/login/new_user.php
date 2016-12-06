<?php
	$username = $_POST["username"];
	$password = $_POST["password"];
	$match = $_POST["password confirm"];
	$first_name = $_POST["first name"];
	$last_name = $_POST["last name"];
	if($_POST["quote"] != null)
	{
		$quote = $_POST["quote"];
	}
	$acc_type = "unknown";
	$verified = false;
	
	$filepath = "../../users/".sha1($username).".json";
	if(file_exists($filepath))
	{
		echo "That account already exists";
	}
	else
	{
		
		
	}
?>