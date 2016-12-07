<?php
	if(isset($_COOKIE["userid"]))
	{
		$userid = $_COOKIE["userid"];
		$filepath = "users/".sha1($userid).".json";
		$file = fopen($filepath, "r");
		$user_info = json_decode(fread($file, filesize($filepath)), false, filesize($filepath));
		fclose($file);
		
		#If the user's account type isn't set yet
		if($user_info[5] == "unknown")
		{
			if(isset($_POST["acc_type"]))
			{
				$user_info[5] = $_POST["acc_type"];
				$writeable_file = fopen($filepath, "w");
				fwrite($writeable_file, json_encode($user_info));
				fclose($writeable_file);
				
				echo "<script>onload = location.assign(\"../\");</script>";
			}
			else
			{
				echo "<html>
					<head>
						<title>Choose your account type</title>
						<link rel='stylesheet' type='text/css' href='../css/styles.css'>
						<script src='../js/functions.js'></script>
					</head>
					<body class='sharp'>
						<div class='header' style='position: relative;'> 
							<span class='header-text'>Set account type</span>
						</div>
						<div>
							<form class='form-general' method='post' action='../'>
								<select name='acc_type' placeholder='Account type'>
									<option value='student'>Student</option>
									<option value='teacher'>Teacher</option>
								</select>
							</form>
						</div>
					</body>
				</html>";
			}
		}
	}
	else
	{
		echo "<script>onload = location.assign(\"functions/login\");</script>";
	}
?>