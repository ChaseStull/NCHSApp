<?php
	include("../filesystem/json.php");
	
	echo "<img src='../../../img/Loading_icon.gif' style='margin-top: 25%; margin-left: auto; margin-right: auto;'>";

	$username = $_POST["username"];
	$password = sha1($_POST["password"]);
	$match = sha1($_POST["passwordc"]);
	$first_name = $_POST["firstn"];
	$last_name = $_POST["lastn"];
	$acc = $_POST["acc"];
	if(isset($_POST["quote"]))
	{
		$quote = $_POST["quote"];
	}
	else
	{
		$quote = null;
	}
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
			
			//Initialize docs directory tracking
			$file = fopen($user_root."/docs/dir.json", "w");
			fwrite($file, "[]");
			fclose($file);
			$file1 = fopen($user_root."/docs/log.dir", "w");
			fclose($file1);
			
			//Create user feed file
			$feed = fopen($user_root."/feed.json", "w");
			fwrite($feed, "[]");
			fclose($feed);
			
			//Create user notifications file
			$notifications = fopen($user_root."/notifications.json", "w");
			fwrite($notifications, "[]");
			fclose($notifications);
			
			//Create user groups file
			$groups = fopen($user_root."/groups.json", "w");
			fwrite($groups, "[]");
			fclose($groups);
			
			$user_info_array = array($username, $password, $first_name, $last_name, $quote, $_POST["acc"], $id, $verified, $quota_reached);
			$user_info = json_encode($user_info_array);
			
			$file = fopen($user_root.".json", "w");
			fwrite($file, $user_info);
			fclose($file);

			$master_user_list = get_array_from_file("../../users/master.json", false);
			if($acc_type == "student")
			{
				array_push($master_user_list[1], $username);
			}
			else if($acc_type == "teacher")
			{
				array_push($master_user_list[0], $username);
			}
			write_array("../../users/master.json", $master_user_list);
			
			setcookie("userid", $username, 86400, "/");
			
			echo "<script>onload = location.assign(\"../../\");</script>";
		}
	}
?>