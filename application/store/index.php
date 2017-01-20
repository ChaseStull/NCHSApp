<?php
	require("../functions/filesystem/json.php");
	require("../functions/formatting/functions.php");
	
	if(isset($_COOKIE["userid"]))
	{
		$root = "../users/".sha1($_COOKIE["userid"]);
		$user_info = get_array_from_file($root.".json", false);
		$user_id = $user_info[0];
		$user_first_name = $user_info[2];
		$user_last_name = $user_info[3];
		$user_account_type = $user_info[5];
		$user_groups = get_array_from_file($root."/groups.json", false);
		
		$group_links = format($user_groups, "group_link");
		
		echo "<html>
			<head>
				<title>Home</title>
				<link rel='stylesheet' type='text/css' href='../../../css/styles.css'>
				<script src='../js/functions.js'></script>
				<script src='../../js/jquery-3.1.1.min.js'></script>
				<script>
					$(document).ready(function(){
						$(\".category\").mouseenter(function(){
							$(this).mousedown(function(){
								$(this).style(\"borderWidth: 1px;\");
								$(this).mouseup(function(){
									$(this).style(\"borderWidth: 0;\");
								});
							});
						});
					});
				</script>
			</head>
			<body class='sharp' style='overflow: hidden'>
				<div class='header'>
					<div class='top-nav-dropdown' onclick='showHide(\"form\");'><br><span class='header-text' style='padding-top: 0px;'>Account Options &blacktriangledown;</span></button>
						<div id='form' class='sign-in-form-container'>
							<a href='functions/login/logout.php'>Sign out</a>
						</div>
					</div>
					<span class='header-text'>School Store</span>
				</div>
				<div class='feed-and-menu-container' id='navigation' style='width: 95%'>
					<div class='home-page-menu-container' id='menu' style='width: 20%;'>
						Menu
						<div onclick='location.assign(\"../\");' class='home-menu-option'>
	   						My Feed
						</div>
						<div class='home-menu-option'>
		                   	Groups
		                    <div class='home-menu-option-content'>
								".$group_links."
		                    </div>
		                </div>
						<div class='home-menu-option' onclick='location.assign(\"../binder\");'>
							Binder
						</div>
						<div class='home-menu-option-active'>
							School Store
						</div>
						<div class='home-menu-option'>
		                   	Important Links
		                    <div class='home-menu-option-content'>
		                        <a href='http://northcountyhs.org'>NCHS Website</a>
		                    </div>
		                </div>
		            </div>
					<div class='content-container' id='content'>
						<div class='content' style='display: block;'>
							<h2 class='content-title'>Categories</h2>
							<div class='button-bar'>
								<div class='category'>
									G
								</div>
								<div class='category'>
									H
								</div>
								<div class='category'>
									G
								</div>
								<div class='category'>
									H
								</div>
								<div class='category'>
									G
								</div>
								<div class='category'>
									H
								</div>
								<div class='category'>
									G
								</div>
							</div>
							".format(array(get_array_from_file("items.json", false), $_GET["type"]), "item")."
						</div>
					</div>
				</div>
			</body>
		</html>";/*<body class='sharp'><link rel='stylesheet' type='text/css' href='../../css/styles.css'>
		<div class='post'><div class='item'>
			<h4>T-Shirt</h4>
			<img src='http://static3.businessinsider.com/image/574352c952bcd0210c8c48ae-1500-1125/eat-sleep-code-tshirt.jpg'>
			<p>
				Grab a T-Shirt
			</p>
		</div></div></body>
		";*/
	}
?>