<?php
	require("functions/filesystem/json.php");
	require("functions/formatting/functions.php");
	if(isset($_COOKIE["userid"]))
	{
		$root = "users/".sha1($_COOKIE["userid"]);
		$user_info = get_array_from_file($root.".json", false);
		$user_id = $user_info[0];
		$user_first_name = $user_info[2];
		$user_last_name = $user_info[3];
		$user_quote = $user_info[4];
		$user_account_type = $user_info[5];
		$user_account_id = $user_info[6];
		$user_account_verification_status = $user_info[7];
		$user_account_quota_status = $user_info[8];
		$user_alerts = get_array_from_file($root."/notifications.json", false);
		$user_feed = get_array_from_file($root."/feed.json", false);
		$user_groups = get_array_from_file($root."/groups.json", false);
		
		$alerts = format($user_alerts, "alert");
		
		#If the logged on user's user_id matches the user_id on file for the account associated with the logged on user's user_id
		if($_COOKIE["userid"] == $user_id)
		{
			#Determine the logged on user's user_account_type
			switch ($user_account_type)
			{
				case "student":
				{
					if($user_account_verification_status == false)
					{
						$alerts = "<style>
							.alerte{
								width: 94%;
								min-height: 0;
								height: auto;
								max-height: 200px;
								background-color: #ff9999;
								color: #232323;
								overflow: auto;
								border-radius: 4px;
								margin: auto;
								margin-top: 10px;
								text-align: left;
							}
							.alerte h3{
								color: black;
								padding-left: 5%;
							}
							.alerte p{
								padding-left: 3%;
							}
						</style>
						<div class='alerte'>
							<h3>System</h3>
							<p>
								Your account isn't verified yet
							</p>
						</div>";
						
						echo "<html>
						<head>
							<title>Home</title>
							<link rel='stylesheet' type='text/css' href='../css/styles.css'>
							<script src='../js/functions.js'></script>
						</head>
						<body class='sharp' style='overflow: hidden'>
							<div class='header'>
								<div class='top-nav-dropdown' onclick='showHide(\"form\");'><br><span class='header-text' style='padding-top: 0px;'>Account Options &blacktriangledown;</span></button>
									<div id='form' class='sign-in-form-container'>
										<a href='functions/login/logout.php'>Sign out</a>
										<div class='div'></div>
										<a href='users/set_id.php'>Set Student ID</a>
									</div>
								</div>
								<span class='header-text'>Welcome, ".$user_first_name."</span>
							</div>
							<div class='feed-and-menu-container' id='navigation'>
								<div class='home-page-menu-container' id='menu'>
			    					Menu
			    					<div onclick='show(\"feed\"); hide(\"grades\"); show(\"notifications\"); resize(1);' class='home-menu-option'>
			       						My Feed
			    					</div>
			    					<div onclick='show(\"grades\"); hide(\"feed\"); hide(\"notifications\"); resize(0);' class='home-menu-option'>
			        					Grades
			        				</div>
									<div class='home-menu-option'>
					                   	Groups
					                    <div class='home-menu-option-content'>
					                        <span>You haven't been added to any groups yet</span>
					                    </div>
					                </div>
									<div class='home-menu-option'>
					                   	Important Links
					                    <div class='home-menu-option-content'>
					                        <a href='http://northcountyhs.org'>NCHS Website</a>
					                    </div>
					                </div>
					            </div>
								<div class='content-container' id='content'>
									<div id='feed' class='content' style='display: block;'>
										<h2 class='content-title'>My Feed</h2>
			                            <div class='post'>
			                         		<form id='form' method='post' action='post.php'>
			                                	<input type='hidden' name='type' value='post'>
												Post to 
												<select class='post-text-box' style='width: 75%; float: right;' disabled>
													
												</select>
												<br>
			                                    Title
			                                    <input type='text' class='post-text-box' name='title' disabled>
			                                    <br>
			                                    Message
			                                    <textarea name='body' class='post-text-box' style='min-height: 75px;' disabled></textarea>
			                                    <button type='button' onclick='' class='form-submit-post'>Posting will be available once you have been verified</button>
			                                    <br>
			                                    <br>
			                                </form>
			                            </div>
										<div class='post'>
			      	        				<h3 class='post-head'>Nothing here yet</h3>
											<p>
												You will see posts here once you have been verified
											</p>
			            				</div>
									</div>
									<div id='grades' class='content'>
										<iframe src='https://parentconnect.aacps.org/Login.asp' frameborder='none' class='post' style='height: 85%;'></iframe>
									</div>
								</div>
							</div>
							<div class='alerts-container' id='notifications'>
								<span>Notifications</span><br>
								".$alerts."
			    			</div>
						</body>
					</html>";
					}
					else
					{
						if(!isset($_GET["group_id"]))
						{
							#Format Group Options
							$group_options = format($user_groups, "group_option");
							
							#Format Group Links
							$group_links = format($user_groups, "group_link");
							
							#Format Feed
							$feed = format(get_array_from_file($root."/feed.json", false), "post");
							
							#Output User Homepage
							echo "<html>
							<head>
								<title>Home</title>
								<link rel='stylesheet' type='text/css' href='../css/styles.css'>
								<script src='../js/functions.js'></script>
							</head>
							<body class='sharp' style='overflow: hidden'>
								<div class='header'>
									<div class='top-nav-dropdown' onclick='showHide(\"form\");'><br><span class='header-text' style='padding-top: 0px;'>Account Options &blacktriangledown;</span></button>
										<div id='form' class='sign-in-form-container'>
											<a href='functions/login/logout.php'>Sign out</a>
										</div>
									</div>
									<span class='header-text'>Welcome, ".$user_first_name."</span>
								</div>
								<div class='feed-and-menu-container' id='navigation'>
									<div class='home-page-menu-container' id='menu'>
				    					Menu
				    					<div onclick='location.assign(\"../\");' class='home-menu-option'>
				       						My Feed
				    					</div>
				    					<div onclick='show(\"grades\"); hide(\"feed\"); hide(\"notifications\"); resize(0);' class='home-menu-option'>
				        					Grades
				            				<div class='home-menu-option-content'>
				                				<span>New Link</span>
				            				</div>
				        				</div>
										<div class='home-menu-option'>
						                   	Groups
						                    <div class='home-menu-option-content'>
						                        ".$group_links."
						                    </div>
						                </div>
										<div class='home-menu-option'>
						                   	Important Links
						                    <div class='home-menu-option-content'>
						                        <a href='http://northcountyhs.org'>NCHS Website</a>
						                    </div>
						                </div>
						            </div>
									<div class='content-container' id='content'>
										<div id='feed' class='content' style='display: block;'>
											<h2 class='content-title'>My Feed</h2>
				                            <div class='post'>
				                         		<form id='form' method='post' action='functions/post/post.php'>
				                                	<input type='hidden' name='type' value='post'>
													Post to 
													<select class='post-text-box' name='group_name' style='width: 75%; float: right;' required>
														".$group_options."
													</select>
													<br>
				                                    Title
				                                    <input type='text' class='post-text-box' name='title' required>
				                                    <br>
				                                    Message
				                                    <textarea name='body' class='post-text-box' style='min-height: 75px;' required></textarea>
				                                    <button class='form-submit-post'>Post</button>
				                                    <br>
				                                    <br>
				                                </form>
				                            </div>
											".$feed."
										</div>
										<div id='grades' class='content'>
											<iframe src='https://parentconnect.aacps.org/Login.asp' frameborder='none' class='post' style='height: 85%;'></iframe>
										</div>
									</div>
								</div>
								<div class='alerts-container' id='notifications'>
									<span>Notifications</span><br>
									".$alerts."
				    			</div>
							</body>
						</html>";
						}
						else
						{
							require("functions/group/get_group.php");
							$group_array = get_group();
							$group_name = $group_array[0];
							$group_owner = $group_array[2];
							$group_admins = $group_array[3];
							$group_members = $group_array[4];
							$array = $group_array[5];
						
							$group_posts_f = format($array, "post");
							
							echo "<html>
							<head>
								<title>Home</title>
								<link rel='stylesheet' type='text/css' href='../css/styles.css'>
								<script src='../js/functions.js'></script>
							</head>
							<body class='sharp' style='overflow: hidden'>
								<div class='header'>
									<div class='top-nav-dropdown' onclick='showHide(\"form\");'><br><span class='header-text' style='padding-top: 0px;'>Account Options &blacktriangledown;</span></button>
										<div id='form' class='sign-in-form-container'>
											<a href='functions/login/logout.php'>Sign out</a>
										</div>
									</div>
									<span class='header-text'>Welcome, ".$user_first_name."</span>
								</div>
								<div class='feed-and-menu-container' id='navigation'>
									<div class='home-page-menu-container' id='menu'>
				    					Menu
				    					<div onclick='location.assign(\"../\");' class='home-menu-option'>
				       						My Feed
				    					</div>
										<div class='home-menu-option'>
						                   	Groups
						                    <div class='home-menu-option-content'>
						                        <span>Sample Group</span>
						                        <div></div>
						                        <span>Sample Group</span>
						                        <div></div>
						                        <span>Sample Group</span>
						                        <div></div>
						                        <span>Sample Group</span>
						                    </div>
						                </div>
										<div class='home-menu-option'>
						                   	Important Links
						                    <div class='home-menu-option-content'>
						                        <a href='http://northcountyhs.org'>NCHS Website</a>
						                    </div>
						                </div>
						            </div>
									<div class='content-container' id='content'>
										<div id='feed' class='content' style='display: block;'>
											<h2 class='content-title'>My Feed</h2>
				                            <div class='post'>
				                         		<form id='form' method='post' action='post.php'>
				                                	<input type='hidden' name='type' value='post'>
													<input type='hidden' name='group' value='".$_GET["group_id"]."'>
													<br>
				                                    Title
				                                    <input type='text' class='post-text-box' name='title' required>
				                                    <br>
				                                    Message
				                                    <textarea name='body' class='post-text-box' style='min-height: 75px;' required></textarea>
				                                    <button class='form-submit-post'>Post</button>
				                                    <br>
				                                    <br>
				                                </form>
				                            </div>
											".$group_posts_f."
										</div>
										<div id='grades' class='content'>
											<iframe src='https://parentconnect.aacps.org/Login.asp' frameborder='none' class='post' style='height: 85%;'></iframe>
										</div>
										<div id='new_group' class='content'>
											<form id='form' class='post' method='post' action='post.php'>
			                                    Group Name
			                                    <input type='text' class='name' name='title' required>
			                                    <br>
			                                    Message
			                                    <textarea name='body' class='post-text-box' style='min-height: 75px;' required></textarea>
			                                    <button class='form-submit-post'>Post</button>
			                                    <br>
			                                    <br>
			                                </form>
										</div>
									</div>
								</div>
								<div class='alerts-container' id='notifications'>
									<span>Notifications</span><br>
									".$alerts."
				    			</div>
							</body>
						</html>";
						}
					}
				}
				break;
				case "teacher":
				{
					if($user_account_verification_status == false)
					{
						if(!isset($_POST["email"]))
						{
							echo "<html>
								<head>
									<title>Get Verified</title>
									<link rel='stylesheet' type='text/css' href='../css/styles.css'>
									<script src='../js/functions.js'></script>
								</head>
								<body class='sharp'>
									<div class='header' style='position: relative;'> 
										<span class='header-text'>Set account type</span>
									</div>
									<div>
										<p class='text-container'>
											&nbsp&nbsp&nbsp&nbsp&nbspTo get your account verified, enter your professional email address below.
										</p>
										<form class='form-general' method='post' action='./'>
											<input type='text' name='email' placeholder='Professional email address' required>
											<br>
											<br>
											<button>Get Verified</button>
										</form>
									</div>
								</body>
							</html>";
						}
						else
						{
							$email = $_POST["email"];
							if(strpos($email, "@aacps.org") != false)
							{
								$user_info[7] = true;
								$user_info[6] = $user_info[1];
								write_array($user_info, "users/".sha1($user_id).".json");
								echo "<script>onload = location.assign(\"./\");</script>";
							}
							else
							{
								echo "<body onclick='location.assign(\"./\")'>Sorry, your account couldn't be verified at this time. Try again later</body>";
							}
						}
					}
					else
					{
						if(!isset($_GET["group_id"]))
						{
							$feed = format(get_array_from_file("users/".sha1($_COOKIE["userid"])."/feed.json", false), "post");
							if(count($feed) == 0)
							{
								$feed = "<div class='post'>
			      	        				<h3 class='post-head'>Nothing here yet</h3>
											<p>
												You will see posts here once you have been verified
											</p>
			            				</div>";
							}
							$group_links = format(get_array_from_file("users/".sha1($_COOKIE["userid"])."/groups.json", false), "group_link");
							$group_options = format(get_array_from_file("users/".sha1($_COOKIE["userid"])."/groups.json", false), "group_option");
							echo "<html>
							<head>
								<title>Home</title>
								<link rel='stylesheet' type='text/css' href='../css/styles.css'>
								<script src='../js/functions.js'></script>
							</head>
							<body class='sharp' style='overflow: hidden'>
								<div class='header'>
									<div class='top-nav-dropdown' onclick='showHide(\"form\");'><br><span class='header-text' style='padding-top: 0px;'>Account Options &blacktriangledown;</span></button>
										<div id='form' class='sign-in-form-container'>
											<a href='functions/login/logout.php'>Sign out</a>
										</div>
									</div>
									<span class='header-text'>Welcome, ".$user_first_name."</span>
								</div>
								<div class='feed-and-menu-container' id='navigation'>
									<div class='home-page-menu-container' id='menu'>
				    					Menu
				    					<div onclick='location.assign(\"./\");' class='home-menu-option'>
				       						My Feed
				    					</div>
										<div class='home-menu-option'>
						                   	Groups
						                    <div class='home-menu-option-content'>
												<span style='display: block;' onclick='show(\"new_group\"); hide(\"feed\");'>$nbsp+&nbspNew Group</span>
												<div></div>
												".$group_links."
						                    </div>
						                </div>
										<div class='home-menu-option'>
						                   	Important Links
						                    <div class='home-menu-option-content'>
						                        <a href='http://northcountyhs.org'>NCHS Website</a>
						                    </div>
						                </div>
						            </div>
									<div class='content-container' id='content'>
										<div id='feed' class='content' style='display: block;'>
											<h2 class='content-title'>My Feed</h2>
				                            <div class='post'>
				                         		<form id='form' method='post' action='functions/post/post.php'>
				                                	<input type='hidden' name='type' value='post'>
													Post to 
													<select class='post-text-box' name='group_name' style='width: 75%; float: right;' required>
														".$group_options."
													</select>
													<br>
				                                    Title
				                                    <input type='text' class='post-text-box' name='title' required>
				                                    <br>
				                                    Message
				                                    <textarea name='body' class='post-text-box' style='min-height: 75px;' required></textarea>
				                                    <button class='form-submit-post'>Post</button>
				                                    <br>
				                                    <br>
				                                </form>
				                            </div>
											".$feed."
										</div>
										<div id='new_group' class='content'>
											<h2 class='content-title'>New Group</h2>
											<form id='form' method='post' action='functions/group/new_group.php'>
												<br>
			                                    Group Name
			                                    <input type='text' class='post-text-box' name='name' required>
			                                    <br>
			                                    Description (Optional)
			                                    <textarea name='description' class='post-text-box' style='min-height: 75px;'></textarea>
			                                    <button class='form-submit-post'>Create</button>
												<br>
			                                    <br>
			                                    <br>
			                                </form>
										</div>
									</div>
								</div>
								<div class='alerts-container' id='notifications'>
									<span>Notifications</span><br>
									".$alerts."
				    			</div>
							</body>
						</html>";
						}
						else
						{
							if(isset($_COOKIE["userid"]))
							{
								if((isset($_GET["group_id"])) && ($_GET["group_id"] != null) && (file_exists("groups/".$_GET["group_id"].".json")))
								{
									$group_array = get_array_from_file("groups/".$_GET["group_id"].".json", false);
								}
							}
								
							$group_name = $group_array[0];
							$group_description = $group_array[2];
							$group_owner = $group_array[3];
							$group_admins = $group_array[4];
							$group_members = $group_array[5];
							$group_posts = $group_array[6];
							$group_posts_f = format($group_posts, "post");
							$group_links = format(get_array_from_file("users/".sha1($_COOKIE["userid"])."/groups.json", false), "group_link");
							
							$is_member = false;
							$is_admin = false;
							$is_owner = false;
							
							for($i = 0; $i < count($group_members); $i++)
							{
								if($_COOKIE["userid"] == $group_members[$i])
								{
									$is_member = true;
								}
							}
							for($i = 0; $i < count($group_admins); $i++)
							{
								if($_COOKIE["userid"] == $group_admins[$i])
								{
									$is_admin = true;
								}
							}
							if($_COOKIE["userid"] == $group_owner)
							{
								$is_owner = true;
							}
							
							echo "<html>
							<head>
								<title>Home</title>
								<link rel='stylesheet' type='text/css' href='../css/styles.css'>
								<script src='../js/functions.js'></script>
							</head>
							<body class='sharp' style='overflow: hidden'>
								<div class='header'>
									<div class='top-nav-dropdown' onclick='showHide(\"form\");'><br><span class='header-text' style='padding-top: 0px;'>Options &blacktriangledown;</span></button>
										<div id='form' class='sign-in-form-container'>
											<a href='functions/login/logout.php'>Sign out</a>
											"; if($is_admin||$is_owner)
											{	
												echo "<div></div>
												<a href='groups/manage/?group_id=".$_GET["group_id"]."'>Manage group</a>";
											}
										echo "</div>
									</div>
									<span class='header-text'>Welcome, ".$user_first_name."</span>
								</div>
								<div class='feed-and-menu-container' id='navigation'>
									<div class='home-page-menu-container' id='menu'>
				    					Menu
				    					<div onclick='location.assign(\"./\");' class='home-menu-option'>
				       						My Feed
				    					</div>
										<div class='home-menu-option'>
						                   	Groups
						                    <div class='home-menu-option-content'>
												<span style='display: block;' onclick='show(\"new_group\"); hide(\"feed\");'>$nbsp+&nbspNew Group</span>
												<div></div>
												".$group_links."
						                    </div>
						                </div>
										<div class='home-menu-option'>
						                   	Important Links
						                    <div class='home-menu-option-content'>
						                        <a href='http://northcountyhs.org'>NCHS Website</a>
						                    </div>
						                </div>
						            </div>
									<div class='content-container' id='content'>
										<div id='feed' class='content' style='display: block;'>
											<h2 class='content-title'>".$group_name."</h2>
				                            <div class='post'>
				                         		<form id='form' method='post' action='functions/post/post.php'>
				                                	<input type='hidden' name='type' value='post'>
													<input type='hidden' name='group_id' value='".$_GET["group_id"]."'>
													<br>
				                                    Title
				                                    <input type='text' class='post-text-box' name='title' required>
				                                    <br>
				                                    Message
				                                    <textarea name='body' class='post-text-box' style='min-height: 75px;' required></textarea>
				                                    <button class='form-submit-post'>Post</button>
				                                    <br>
				                                    <br>
				                                </form>
				                            </div>
											<br>
											".$group_posts_f."
										</div>
										<div id='new_group' class='content'>
											<h2 class='content-title'>New Group</h2>
											<form id='form' method='post' action='functions/group/new_group.php'>
												<br>
			                                    Group Name
			                                    <input type='text' class='post-text-box' name='name' required>
			                                    <br>
			                                    Description (Optional)
			                                    <textarea name='description' class='post-text-box' style='min-height: 75px;'></textarea>
			                                    <button class='form-submit-post'>Create</button>
												<br>
			                                    <br>
			                                    <br>
			                                </form>
										</div>
									</div>
								</div>
								<div class='alerts-container' id='notifications'>
									<span>Notifications</span><br>
									".$alerts."
				    			</div>
							</body>
						</html>";
						}
					}
				}
				break;
			}
		}
	}
	else
	{
		echo "<script>onload = location.assign(\"functions/login\");</script>";
	}
?>