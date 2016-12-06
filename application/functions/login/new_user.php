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
	else
	{
		$quote = null;
	}
	$acc_type = "unknown";
	$verified = false;
	
	$filepath = "../../users/".sha1($username).".json";
	if(file_exists($filepath))
	{
		echo "<body onclick='history.back();'>That account already exists</body>";
	}
	else
	{
		if($password != $match)
		{
			echo "<body onclick='history.back();'>Please make sure your passwords match</body>";
		}
		else
		{
			//Create
		}
	}
?>