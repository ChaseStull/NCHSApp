<?php
	$username = $_POST["username"];
	$password = sha1($_POST["password"]);
	if(file_exists("../../users/".sha1($username).".json"))
	{
		$filepath = "../../users/".sha1($username).".json";
		$file = fopen($filepath, "r");
		$content = fread($file, filesize($filepath));
		$content_array = json_decode($content, false, filesize($filepath));
		fclose($file);
		
		if($username == $content_array[0])
		{
			if($password == $content_array[1])
			{
				$cookie = setcookie("userid", $username, time()+84600, "/");
				echo "<script>onload = location.assign(\"../..\")</script>";
			}
			else
			{
				echo "<body onclick='history.back();'>Invalid password</body>";
			}
		}
		else
		{
			echo "<body onclick='history.back();'>Something went wrong</body>";
		}
	}
	else
	{
		echo "<body onclick='history.back();'>Something went wrong</body>";
	}
?>