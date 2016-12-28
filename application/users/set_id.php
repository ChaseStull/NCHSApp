<?php
	require("../functions/filesystem/json.php");
	if(isset($_COOKIE["userid"]))
	{
		$user_info = get_array_from_file(sha1($_COOKIE["userid"]).".json", false);
		if($user_info[6] != null)
		{
			echo "<body onclick='location.assign(\"../\")'>Your id is already set</body>";
		}
		else
		{
			if(($user_info[5] == "student")&&($user_info[6] == null)&&(isset($_POST["student_id_number"]) == false))
			{
				echo "<html>
						<head>
							<title>Set Student ID</title>
							<link rel='stylesheet' type='text/css' href='../css/styles.css'>
							<script src='../js/functions.js'></script>
						</head>
						<body class='sharp'>
							<div class='header' style='position: relative;'> 
								<span class='header-text'>Set Student ID</span>
							</div>
							<div>
								<p class='text-container'>
									&nbsp&nbsp&nbsp&nbsp&nbspTo get your account verified, enter your Student ID number below. Once a teacher or coach has added you to a class or team, your account will be verified.
								</p>
								<form class='form-general' method='post' action='./'>
									<input type='text' name='student_id_number' placeholder='Student ID Number'>
									<br>
									<br>
									<button>Get Verified</button>
									<button type='button' onclick='location.assign(\"../\");'>Set ID Later</button>
								</form>
							</div>
						</body>
					</html>";
			}
			else if(($user_info[5] == "student")&&(isset($_POST["student_id_number"])))
			{
				$student_id_number = $_POST["student_id_number"];
				$user_info[6] = $student_id_number;
				write_array($user_info, sha1($_COOKIE["userid"]).".json");
				echo "<script>onload = location.assign(\"../\");</script>";
			}
			else
			{
				echo "Something went wrong";
			}
		}
	}
	else
	{
		echo "Something went wrong";
	}
?>