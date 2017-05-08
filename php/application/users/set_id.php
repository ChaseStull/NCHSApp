<?php
	require("../functions/filesystem/json.php");
	if(isset($_COOKIE["userid"]))
	{
		$user_info = get_array_from_file(sha1($_COOKIE["userid"]).".json", false);

		$user_id = $user_info[0];
		$acc_type = $user_info[5];
		$student_id_number = $user_info[6];
		if(isset($student_id_number))
		{
			echo "<body onclick='location.assign(\"../\")'>Your id is already set</body>";
		}
		else
		{
			if(($acc_type == "student")&&(!isset($student_id_number))&&(!isset($_POST["student_id_number"])))
			{
				echo "<html>
						<head>
							<title>Set Student ID</title>
							<link rel='stylesheet' type='text/css' href='../../css/styles.css'>
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
								<form class='form-general' method='post' action=''>
									<input type='text' name='student_id_number' placeholder='Student ID Number'>
									<br>
									<br>
									<button>Get Verified</button>
									<br>
									<br>
									<button type='button' onclick='location.assign(\"../\");'>Set ID Later</button>
								</form>
							</div>
						</body>
					</html>";
			}
			else if(($acc_type == "student")&&(isset($_POST["student_id_number"])))
			{
				$student_id_number = $_POST["student_id_number"];
				$user_info[6] = $student_id_number;
				$user_info[7] = true;
				write_array(sha1($_COOKIE["userid"]).".json", $user_info);
				
				$master = get_array_from_file("master.json", false);
				array_push($master[1], $user_info[0]);
				write_array("master.json", $master);
				
				echo "<script>onload = location.assign(\"../..\");</script>";
			}
			else
			{
				echo "Something went wrong";
			}
		}
	}
	else
	{
		echo "<script>onload = location.assign(\"../../\");</script>";
	}
?>