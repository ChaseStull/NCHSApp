<?php
	$username = $_POST["username"];
	$password = sha1($_POST["password"]);
	$match = sha1($_POST["passwordc"]);
	$first_name = $_POST["firstn"];
	$last_name = $_POST["lastn"];
	if($_POST["quote"] != null)
	{
		$quote = $_POST["quote"];
	}
	else
	{
		$quote = null;
	}
	$acc_type = "unknown";
	$id = null;
	$verified = false;
	$quota_reached = false;
	
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
			$user_root = "../../users/".sha1($username);
			//Create user root folder
			mkdir($user_root);
			
			//Create $user/docs folder
			mkdir($user_root."/docs");
			
			$user_info_array = array($username, $password, $first_name, $last_name, $quote, $acc_type, $id, $verified, $quota_reached);
			$user_info = json_encode($user_info_array);
			
			$file = fopen($user_root.".json", "w");
			fwrite($file, $user_info);
			fclose($file);
			
			setcookie("userid", $username, 86400, "/");
			
			echo "<script>onload = location.assign(\"../../\");</script>";
		}
	}
?>