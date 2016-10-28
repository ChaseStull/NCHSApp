<?php
    if(isset($_COOKIE["Student"]))
    {
        $User = $_COOKIE["Student"];
        $F = "students/".$User.".json";
    }
    if(isset($_COOKIE["Teacher"]))
    {
        $User = $_COOKIE["Teacher"];
        $F = "teachers/".$User.".json";
    }
    if(isset($_COOKIE["User"]))
    {
        $User = $_POST["user"];
        $type = $_POST["type"];
        if($type=="s")
        {
            $F = "students/".$User.".json";
        }
    }
    $File = fopen($F, "r");
    $JSON = fread($File, filesize($F));
    fclose($File);
    $Info = json_decode($JSON, TRUE, filesize($F));
    $Info["Fname"] = $_POST["Fname"];
    $Info["Lname"] = $_POST["Lname"];
    $JSON = json_encode($Info);
    $File = fopen($F, "w");
    fwrite($File, $JSON);
    fclose($File);
    $Header = "<div style='overflow: hidden; margin-left: 25%; width: 50%; background-color: white; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);'><div style='float: left;'><b>Welcome, ".$_POST["Fname"]." ".$_POST["Lname"]."</b></div><a href='logOut.php'><div style='float: right; color: #bf1d32;'><b>Sign Out</b></div></a><div style='background-color: transparent; width: 4px; height: 17px; float: right;'></div><div style='background-color: black; width: 2px; height: 17px; float: right;'></div><div style='background-color: transparent; width: 4px; height: 17px; float: right;'></div><a href='myAccount.php'><div style='float: right; color: #bf1d32;'>My Account</div></a><div style='background-color: transparent; width: 4px; height: 17px; float: right;'></div><div style='background-color: black; width: 2px; height: 17px; float: right;'></div><div style='background-color: transparent; width: 4px; height: 17px; float: right;'></div><a href='teacherHome.php'><div style='float: right; color: #bf1d32;'>Home</div></a></div><div style='width: 100%;'><a href='http://northcountyhs.org'><img alt='This Image Cannot Be Loaded' src='img/nclogo.jpg' class='logo'></a></div>";
    if(!isset($_COOKIE["User"]))
    {
    	echo "<html>
    	<head>
       	<meta charset='utf-8'>
        	<meta name='viewport' content='initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width'>
        	<link rel='stylesheet' type='text/css' href='css/style.css'>
        	<title>Success</title>
    	</head>
    <body>
        ".$Header."
        <a href='myAccount.php' style='text-decoration: none;'><div style='margin-left: auto; margin-right: auto; margin-top: 15%; background-color: #bf1d32; border-radius: 3px; height: 50px; width: 30%; text-align: center; color: black;'><br>Success! Your information has been updated</div></a>
    </body>
</html>";
	}
	else
	{
		if($_COOKIE["User"]=="Admin")
		{
			echo "<html>
    	<head>
       	<meta charset='utf-8'>
        	<meta name='viewport' content='initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width'>
        	<link rel='stylesheet' type='text/css' href='css/style.css'>
        	<title>Success</title>
    	</head>
    <body>
        ".$Header."
        <a href='myAccount.php' style='text-decoration: none;'><div style='margin-left: auto; margin-right: auto; margin-top: 15%; background-color: #bf1d32; border-radius: 3px; height: 50px; width: 30%; text-align: center; color: black;'><br>Success! ".$User."'s information has been updated</div></a>
    </body>
</html>";
		}
	}
?>