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
				$feed = "";
				$file = fopen("feed.json", "r");
                $content = fread($file, filesize("feed.json"));
				if($content != null)
				{
                	$content_array = json_decode($content, false, filesize("feed.json"));
                	fclose($file);
                                                
                	for($i = 0; $i < count($content_array); $i++)
                    {
                        $post_type = $content_array[$i][1];
                        $info = $content_array[$i][0];
                        $head = $content_array[$i][2];
                        if($post_type == "post")
                        {
                            $body = $content_array[$i][3];
                            $attach = $content_array[$i][4];
                            if($attach != "null")
                            {
                                if($attach == "image")
                                {
                                    $img_src = $content_array[$i][5];
                                    $feed .= "<div class='post'>
										<h5 class='post-info'>".$info."</h5>
										<img class='post-image' src='".$img_src."'>
                                        <h3 class='post-header'>".$head."</h3>
                                        <p>
                                        	".$body."
                                        </p>
                                    </div>";
                                }
                            }
                            else
                            {
                                echo "<div class='post'>
                                	<h5 class='post-info'>".$info."</h5>
                                    <h3 class='post-header'>".$head."</h3>
                                    <p>
                                    	".$body."
                                    </p>
                                </div>";
                            }
                        }
                        else if($post_type == "quiz")
                        {
                            echo "<div class='post'>
                            	<h5 class='post-info'>".$info."</h5>
                                <h3 class='post-head'>".$head."</h3>
                                <form class='quiz'>
                            </div>";
                        }
                        else if($post_type == "homework")
                        {
                                                                
                        }
                    }
				}
				else
				{
					$feed = "<div class='post'>
              	        <h3 class='post-head'>Nothing here yet</h3>
						<p>
							You will see posts here once you have been added to a group
						</p>
                    </div>";
				}
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
						<div class='feed-and-menu-container' id='navigation'>
        					<div class='home-page-menu-container' id='menu'>
            					Menu
            					<div onclick='show(\"feed\"); hide(\"grades\"); show(\"notifications\"); resize(1);' class='home-menu-option'>
               						My Feed
                					<div class='home-menu-option-content'>
                    					<span>New Link</span>
                					</div>
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
                            <div id='createpost' class='content'>
                                    sndhgbsjkhgkjbksxgbhhzukhgjkzhkfjgjhfjhgj,jfhnvjfjvn
                            </div>
		</div>
    </div>
	<div class='alerts-container' id='notifications'>
		<span>Notifications</span><br>
		<div id='1' class='alert'>
            <div class='alert-option-bar'>
                <img class='alert-option-bar-image' src='../../img/trash-can-red.png' alt='O' onclick='if(confirm(\"Are you sure you want to remove this notification?\n(This can not be undone)\")){document.getElementById(\"1\").style.display = \"none\";}else{}'>
            </div>
			<h3>Example Sport</h3>
			<p>
				Remember that practice starts at 3:00 today! sdfsdfhsdf hsdfj sdjfsdj fsjdfs dfsdf sdfsd dg fjf isjei ogjsl i erghk sdguj vhdujgh vsurhg ushfdl kjvshv hsvgx fdsg
			</p>
		</div>
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