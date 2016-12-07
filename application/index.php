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
							<form class='form-general' method='post' action='./'>
								<select name='acc_type'>
									<option value='student'>Student</option>
									<option value='teacher'>Teacher</option>
								</select>
								<br>
								<br>
								<button>Select</button>
							</form>
						</div>
					</body>
				</html>";
			}
		}
		else if($user_info[5] == "student")
		{
			if(($user_info[7] == false)&&($user_info[6] == null))
			{
				if(isset($_POST["student_id_number"]))
				{
					$user_info[6] = $_POST["student_id_number"];
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
								<p class='text-container'>
									&nbsp&nbsp&nbsp&nbsp&nbspTo get your account verified, enter your Student ID number below. Once a teacher or coach has added you to a class or team, your account will be verified.
								</p>
								<form class='form-general' method='post' action='./'>
									<input type='text' name='student_id_number' placeholder='Student ID Number'>
									<br>
									<br>
									<button>Get Verified</button>
								</form>
							</div>
						</body>
					</html>";
				}
			}
			else if(($user_info[6] != null)&&($user_info[7] == false))
			{
				echo "<html>
					<head>
						<title>Home</title>
						<link rel='stylesheet' type='text/css' href='../css/styles.css'>
						<script src='../js/functions.js'></script>
					</head>
					<body class='sharp'>
						<div class='header'>
							<div class='top-nav-dropdown' onclick='showHide(\"form\");'><br><span class='header-text' style='padding-top: 0px;'>Account Options &blacktriangledown;</span></button>
								<div id='form' class='sign-in-form-container'>
									<a href='functions/login/logout.php'>Sign out</a>
									<div class='div'></div>
									<a href=''>Other Option</a>
								</div>
							</div>
							<span class='header-text'>Welcome, ".$user_info[2]."</span>
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