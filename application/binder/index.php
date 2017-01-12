<?php
	require("../functions/filesystem/json.php");
	require("../functions/formatting/functions.php");
	
	if(isset($_COOKIE["userid"]))
	{ 
		$user_info = get_array_from_file("../users/".sha1($_COOKIE["userid"]).".json", false);
		if($_COOKIE["userid"] == $user_info[0])
		{
			$user_id = $user_info[0];
			$user_first_name = $user_info[2];
			$user_last_name = $user_info[3];
			$user_quote = $user_info[4];
			$user_account_type = $user_info[5];
			$user_account_id = $user_info[6];
			$user_account_verification_status = $user_info[7];
			$user_account_quota_status = $user_info[8];
			
			$files = get_array_from_file("../users/".sha1($user_info[0])."/docs/dir.json");
			$files_f = format($files, "dir");
			
			echo "<html>
				<head>
					<title>Binder</title>
					<script src='../../js/functions.js'></script>
					<link rel='stylesheet' type='text/css' href='../../css/styles.css'>
				</head>
				<body class='sharp'>
					<div class='header'>
						<div class='top-nav-dropdown' onclick='showHide(\"form\");'><br><span class='header-text' style='padding-top: 0px;'>Account Options   &blacktriangledown;</span>
							<div id='form' class='sign-in-form-container'>
								<a href='../functions/login/logout.php'>Sign out</a>
							</div>
						</div>
						<span class='header-text'>My Binder</span>
					</div>
					<div class='feed-and-menu-container' style='width: 100%;'>
						<div class='home-page-menu-container' id='menu' style='width: 20%;'>
	    					Menu
	    					<div onclick='location.assign(\"../\");' class='home-menu-option'>
	       						Home
	    					</div>
			            </div>
						<div class='content' style='display: block; width: 79%; margin-left: 20%; margin-right: auto; padding-right: 1%;'>
							".$files_f."
						</div>
					</div>
				</body>
			</html>";
		}
		else
		{
			echo "<script>onload = location.assign(\"../../\")</script>";
		}
	}
	else
	{
		echo "<script>onload = location.assign(\"../../\")</script>";
	}
?>