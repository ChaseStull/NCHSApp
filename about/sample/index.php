<html>
	<head>
		<title>Sample Homepage</title>
		<link rel='stylesheet' type='text/css' href='../../css/styles.css'>
		<meta name='viewport' content='width=device-width'>
		<script src='../../js/functions.js'></script>
        <script src='../../js/sniffer.js'></script>
        <script>
                function viewswitch(view)
                {
                        var content = document.getElementsByClassName("content");
                        for(var i = 0; i < content.length; i++)
                        {
                                content[i].style.display = "none";
                        }
                        switch(view)
                        {
                                case "feed": document.getElementById("feed").style.display = "block"; resize(1);
                                break;
                                case "grades": document.getElementById("grades").style.display = "block"; resize(0);
                                break;
                                default: document.getElementById("feed").style.display = "block"; resize(1);
                        }
                }
        </script>
	</head>
	<body class='sharp' style='overflow: hidden;'>
		<div class='header' style='z-index: 4;'> 
			<span class='header-text'>Welcome, <i>Sample User</i></span>
			<div class='top-nav-dropdown' onclick='showHide("form");'><span class='header-text' style='padding-top: 0px;'>Sign In &blacktriangledown;</span></div>
				<div id='form' class='sign-in-form-container'>
					<form class='sign-in-form' style='background-color: lightslategray; line-height: 50%;'>
						<input type='hidden' name='auth' value='true'>
						<input type='submit' class='form-submit' value='Manage Account'>
					</form>
				</div>
			</button>
			<a class='spacer' ref=''><span class='header-text' style='padding-top: 38px;'></span></a>
			<a class='top-nav-link' ref='/features'><span class='header-text' style='padding-top: 38px;'>Features</span></a>
			<a class='top-nav-link' ref='/about'><span class='header-text' style='padding-top: 38px;'>About</span></a>
			<a class='top-nav-link' ref='../'><span class='header-text' style='padding-top: 38px;'>Home</span></a>
		</div>
        <div class='feed-and-menu-container' id='navigation'>
            <div class='home-page-menu-container' id='menu'>
                Menu
                <div onclick='show("feed"); hide("grades"); show("notifications"); resize(1);' class='home-menu-option'>
                   	My Feed
                    <div class='home-menu-option-content'>
                        <span>New Link</span>
                    </div>
                </div>
                <div onclick='show("grades"); hide("feed"); hide("notifications"); resize(0);' class='home-menu-option'>
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
		<div class='home-menu-option'>
                    New Option
                    <div class='home-menu-option-content'>
                        <span>New Option</span>
                    </div>
                </div>
				<div class='home-menu-option'>
                   	New Option
                    <div class='home-menu-option-content'>
                        <span>New Option</span>
                    </div>
                </div>
				<div class='home-menu-option'>
                   	New Option
                    <div class='home-menu-option-content'>
                        <span>New Option</span>
                    </div>
                </div>
				<div class='home-menu-option'>
                   	New Option
                    <div class='home-menu-option-content'>
                        <span>New Option</span>
                    </div>
                </div>
				<div class='home-menu-option'>
                   	New Option
                    <div class='home-menu-option-content'>
                        <span>New Option</span>
                    </div>
                </div>
				<div class='home-menu-option'>
                   	New Option
                    <div class='home-menu-option-content'>
                        <span>New Option</span>
                    </div>
                </div>
				<div class='home-menu-option'>
                   	New Option
                    <div class='home-menu-option-content'>
                        <span>New Option</span>
                    </div>
                </div>
				<div class='home-menu-option'>
                   	New Option
                    <div class='home-menu-option-content'>
                        <span>New Option</span>
                    </div>
                </div>
				<div class='home-menu-option'>
                   	New Option
                    <div class='home-menu-option-content'>
                        <span>New Option</span>
                    </div>
                </div>
				<div class='home-menu-option'>
                   	New Option
                    <div class='home-menu-option-content'>
                        <span>New Option</span>
                    </div>
                </div>
            </div>
			<div class='content-container' id='content'>
				<div id='feed' class='content' style='display: block;'>
					<h2 class='content-title'>My Feed</h2>
                                        <div class='post'>
                                                <form id='form' onkeypress='document.getElementById("form").submit();' method='post' action='post.php'>
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
					<?php
                                                $file = fopen("feed.json", "r");
                                                $content = fread($file, filesize("feed.json"));
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
                                                                                echo "<div class='post'>
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
                                        ?>
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
                    <img class='alert-option-bar-image' src='../../img/trash-can-red.png' alt='O' onclick='if(confirm("Are you sure you want to remove this notification?\n(This can not be undone)")){document.getElementById("1").style.display = "none";}else{}'>
                </div>
				<h3>Example Sport</h3>
				<p>
					Remember that practice starts at 3:00 today! sdfsdfhsdf hsdfj sdjfsdj fsjdfs dfsdf sdfsd dg fjf isjei ogjsl i erghk sdguj vhdujgh vsurhg ushfdl kjvshv hsvgx fdsg
				</p>
			</div>
			<div id='2' class='alert'>
                <div class='alert-option-bar'>
                    <img class='alert-option-bar-image' src='../../img/trash-can-red.png' alt='O' onclick='if(confirm("Are you sure you want to remove this notification?\n(This can not be undone)")){document.getElementById("2").style.display = "none";}else{}'>
                </div>
				<h3>Example Sport</h3>
				<p>
					Remember that practice starts at 3:00 today! sdfsdfhsdf hsdfj sdjfsdj fsjdfs dfsdf sdfsd dg fjf isjei ogjsl i erghk sdguj vhdujgh vsurhg ushfdl kjvshv hsvgx fdsg
				</p>
			</div>
			<div id='3' class='alert'>
                <div class='alert-option-bar'>
                    <img class='alert-option-bar-image' src='../../img/trash-can-red.png' alt='O' onclick='if(confirm("Are you sure you want to remove this notification?\n(This can not be undone)")){document.getElementById("3").style.display = "none";}else{}'>
                </div>
				<h3>Example Sport</h3>
				<p>
					Remember that practice starts at 3:00 today! sdfsdfhsdf hsdfj sdjfsdj fsjdfs dfsdf sdfsd dg fjf isjei ogjsl i erghk sdguj vhdujgh vsurhg ushfdl kjvshv hsvgx fdsg
				</p>
			</div>
			<div id='4' class='alert'>
                <div class='alert-option-bar'>
                    <img class='alert-option-bar-image' src='../../img/trash-can-red.png' alt='O' onclick='if(confirm("Are you sure you want to remove this notification?\n(This can not be undone)")){document.getElementById("4").style.display = "none";}else{}'>
                </div>
				<h3>Example Sport</h3>
				<p>
					Remember that practice starts at 3:00 today! sdfsdfhsdf hsdfj sdjfsdiuygfyyyyyyyyyyyyhjhhfthfyjgybj fsjdfs dfsdf sdfsd dg fjf isjei ogjsl i erghk sdguj vhdujgh vsurhg ushfdl kjvshv hsvgx fdsg
				</p>
			</div>
			<div id='5' class='alert'>
                <div class='alert-option-bar'>
                    <img class='alert-option-bar-image' src='../../img/trash-can-red.png' alt='O' onclick='if(confirm("Are you sure you want to remove this notification?\n(This can not be undone)")){document.getElementById("5").style.display = "none";}else{}'>
                </div>
				<h3>Example Sport</h3>
				<p>
					Remember that practice starts at 3:00 today! sdfsdfhsdf hsdfj sdjfsdj fsjdfs dfsdf sdfsd dg fjf isjei ogjsl i erghk sdguj vhdujgh vsurhg ushfdl kjvshv hsvgx fdsg
				</p>
			</div>
			<br>
                </div>
        </body>
</html>