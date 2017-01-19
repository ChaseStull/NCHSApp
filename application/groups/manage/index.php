<?php
	require("../../functions/filesystem/json.php");
	require("../../functions/formatting/functions.php");
	if(isset($_COOKIE["userid"]))
	{
		$user_id = $_COOKIE["userid"];
		$is_admin = false;
		$is_owner = false;
		
		$group_id = $_GET["group_id"];
		$group_array = get_array_from_file("../".$group_id.".json", false);
		
		$group_name = $group_array[0];
		$group_description = $group_array[2];
		$group_owner = $group_array[3];
		$group_admins = $group_array[4];
		$group_members = $group_array[5];
		$group_posts = $group_array[6];

		$group_links = format(get_array_from_file("../../users/".sha1($_COOKIE["userid"])."/groups.json", false), "group_link");
		
		for($i = 0; $i < count($group_admins); $i++)
		{
			if($user_id == $group_admins[$i])
			{
				$is_admin = true;
			}
		}
		if($user_id == $group_owner)
		{
			$is_owner = true;
		}
		
		if($is_admin||$is_owner)
		{
			$teacher_options_f = format(array(get_array_from_file("../../users/master.json", false)[0], $group_members), "member_option");
			$teacher_options_f = format(array(get_array_from_file("../../users/master.json", false)[0], $group_members), "member_option");
			$student_options_f = format(array(get_array_from_file("../../users/master.json", false)[1], $group_members), "member_option");
			$group_members_f = format($group_members, "member_info_block");
			echo "<html>
				<head>
					<title>Home</title>
					<link rel='stylesheet' type='text/css' href='../../../css/styles.css'>
					<script src='../../../js/functions.js'></script>
				</head>
				<body class='sharp' style='overflow: hidden'>
					<div class='header'>
						<div class='top-nav-dropdown' onclick='showHide(\"form\");'><br><span class='header-text' style='padding-top: 0px;'>Options &blacktriangledown;</span></button>
							<div id='form' class='sign-in-form-container'>
								<a href='../../functions/login/logout.php'>Sign out</a>
								"; if($is_owner)
								{	
									echo "<div></div>
									<button class='post-text-box' onclick='if(confirm(\"Delete Group?\n\nAre you sure you want to delete this group?\nThis will complete the following actions:\n    Disable posting to this group\n    Disable notifications from this grpup\n\nThis will not:\n    Delete the group from your students group list\n    Delete the posts made in this group\n\")){location.assign(\"../delete/?group_id=".$_GET["group_id"]."\");}else{}'>Delete group</button>";
								}
							echo "</div>
						</div>
						<span class='header-text'>Manage Group: ".$group_name."</span>
					</div>
					<div class='feed-and-menu-container' id='navigation'>
						<div class='home-page-menu-container' id='menu'>
	    					Menu
	    					<div onclick='location.assign(\"../..\");' class='home-menu-option'>
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
							<div class='home-menu-option' onclick='show(\"members\"); hide(\"addmember\"); hide(\"admins\");'>
			                   	Members
			                </div>
							<div class='home-menu-option' onclick='hide(\"members\"); hide(\"addmember\"); show(\"admins\");'>
			                   	Administrators
			                </div>
			            </div>
						<div class='content-container' id='content'>
							<div id='members' class='content' style='display: block;'>
								Members
								<div class='post'>";
										if(($teacher_options_f != "" && $teacher_options_f != null)||($student_options_f != "" && $student_options_f != null))
										{
											echo "<div class='member-info-block'>
												<span>Add Member</span>
												<form class='post' method='post' action='add_member.php'>
												<input type='hidden' name='group_id' value='".$_GET["group_id"]."'>
												<span>Member Username</span>
												<select name='user_id' class='post-text-box' required>
													".$teacher_options_f."
													".$student_options_f."
												</select>
												<br>
												<br>
												<span>Member Type</span>
												<select name='member_type' class='post-text-box'>
													<option value='standard member'>Standard Member</option>
													<option value='administrator'>Administrator</option>
												</select>
												<br>
												<br>
												<button class='add-member-form-submit'>Add Member</button>
											</form>
										</div>";
										}
									echo "
									".$group_members_f."
								</div>
							</div>
						</div>
					</div>
				</body>
			</html>";
		}
		else
		{
			echo "Failure";
		}
	}
	else
	{
		echo "<script>onload = location.assign(\"../..\");</script>";
	}
?>