<?php
	require("functions.php");
	if(isset($_COOKIE["Student"]))
	{
		if($_GET["switch"]==true)
		{
			$threadLoc = $_GET["threadLoc"];
			$thread = fopen($threadLoc, "r");
			$messages = fread($thread, filesize($threadLoc));
			$messagesArray = json_decode($messages, false, filesize($threadLoc));
			fclose($thread);
			
			if($_COOKIE["Student"]==$messagesArray[0]||$_COOKIE["Student"]==$messagesArray[1])
			{
				echo "Success";
				$threads = displayThreads($_COOKIE["Student"], $_GET["type"]);
			}
		}
		else
		{
			$threadList = fopen("students/".$_COOKIE["Student"]."/threads.json", "r");
			$convos = fread($threadList, filesize($threadLoc));
			$convosArray = json_decode($messages, false, filesize($threadLoc));
			fclose($thread);
		}
		echo "
	<html>
		<head>
			<title>Messaging</title>
			<meta name='viewport' content='initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width'>
            <link rel='stylesheet' type='text/css' href='css/style.css'>
            <meta charset='utf-8'>
		</head>
		<body style='background-color: #ebebeb;'>
			<div style='width: 100%; background-color: white; overflow: hidden; height: 50px;'>
                <div style='float: left;'>
                    <b>Welcome, ".$_COOKIE["Student"]."</b>
                </div>
                <a href='logOut.php'>
                    <div style='float: right; color: #bf1d32;'>
                        <span><b>Sign Out</b></span>
                    </div>
                </a>
                <div style='background-color: transparent; width: 4px; height: 17px; float: right;'></div>
                <div style='background-color: black; width: 2px; height: 17px; float: right;'></div>
                <div style='background-color: transparent; width: 4px; height: 17px; float: right;'></div>
                <a href='studentHome.php'>
		            <div style='float: right; color: #bf1d32;'>
        	            <span>Home</span>
                    </div>
                </a>
            </div>
            <div style='width: 100%;'>
                <a href='http://northcountyhs.org'>
                    <img alt='This Image Cannot Be Loaded' src='img/nclogo.jpg' class='logo'>
	            </a>
			</div>
			<div style='width: 100%; height: 100%; position: fixed; background-color: #bf1d32; margin-left: auto; margin-right: auto;>
				<div style='width: 20%; height: 100%; background-color: white; float: left;>
					<br>
					<span>Conversations</span>
					".$threads."
				</div>
			</div>
		</body>
	</html>
	";
	}
	
?>