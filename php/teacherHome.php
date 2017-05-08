<?php
    include ("functions.php");
    //Set Page Data
    $Teacher = $_COOKIE["Teacher"];
    $isUserSet = isset($_COOKIE["Teacher"]);
    $F = "teachers/".$Teacher.".json";
    $File = fopen($F, "r");
    $JSON = fread($File, filesize("teachers/".$Teacher.".json"));
    fclose($File);
    $Info = json_decode($JSON, true, filesize("teachers/".$Teacher.".json"));
    $notes = json_decode(fread(fopen("teachers/".sha1($Teacher)."notifications.json")));
    $Fname = $Info["Fname"];
    $Lname = $Info["Lname"];
    //$note = displayNotifications($Teacher);
    $Header = "<div style='width: device-width; background-color: white; overflow: hidden; height: 50px;'><div style='float: left;'><b>Welcome, ".$Fname." ".$Lname."</b></div><a href='logOut.php'><div style='float: right; color: #bf1d32;'><span><b>Sign Out</b></span></div></a><div style='background-color: transparent; width: 4px; height: 17px; float: right;'></div><div style='background-color: black; width: 2px; height: 17px; float: right;'></div><div style='background-color: transparent; width: 4px; height: 17px; float: right;'></div><a href='myAccount.php'><div style='float: right; color: #bf1d32;'><span>My Account</span></div></a><div style='background-color: transparent; width: 4px; height: 17px; float: right;'></div><div style='background-color: black; width: 2px; height: 17px; float: right;'></div><div style='background-color: transparent; width: 4px; height: 17px; float: right;'></div><a href='teacherHome.php'><div style='float: right; color: #bf1d32;'><span>Home</span></div></a></div></div><div style='width: 100%;'><a href='http://northcountyhs.org'><img alt='This Image Cannot Be Loaded' src='img/nclogo.jpg' class='logo'></a></div>";
        
    if($isUserSet)
    {
echo "
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='initial-scale=1, user-scalable=yes, width=device-width'>
        <link rel='stylesheet' type='text/css' href='css/style.css'>
        <title>Home</title>
    </head>
    <body style='background-color: #ebebeb;'>
        ".$Header."
        <br>
        <br>
        <br>
        <table style='width: 100%'>
            <tr style='width: 100%'>
                <td style='width: 15%; text-align: center;'>
                    <div class='sideHead'>
                        <h3>Messages</h3>
                    </div>
                    <br>
                    <br>
                    <div class='sidebar'>

                    </div>
                </td>
                <td style='width: auto;'>
                    <table class='optionContainer'>
                        <tr><td><a href='myClasses.php' class='noDec'><div class='teacherOption' style='background-color: #bf1d32;'><span><br>My<br>Classes</span></div></a></td><td><a href='myClubs.php' class='noDec'><div class='teacherOption' style='background-color: #0d590d;'><span><br>My<br>Clubs</span></div></a></td></tr>
                        <tr><td><a href='hallPass.php' class='noDec'><div class='teacherOption' style='background-color: #1b1b7e;'><span><br>Hall<br>Pass</span></div></td><td><a href='newsFeed.php' class='noDec'><div class='teacherOption' style='background-color: #f2b90d;'><span><br>News<br>Events</span></div></a></td></tr>
                    </table>
                </td>
                <td style='width: 15%; text-align: center;'>
                    <div class='sideHead'>
                        <h3>Notifications</h3>
                    </div>
                    <div id='notes' class='sidebar'>
                        
                        <br>
                        <a class='noDec' href='clearNotes.php'><div class='note'>
                            <br>
                            <h4>Clear All</h4>
                        </div></a>
                        <br>
                    </div>
                </td>
            </tr>
        </table>
    </body>
</html>";
}
else
{
    echo "
<html>
	<head>
		<meta charset='utf-8'>
		<meta name='viewport' content='initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width'>
        <link rel='stylesheet' type='text/css' href='css/style.css'>
		<title>NCHS</title>
	</head>
	<body style='background-color: #ebebeb;'>
        <div style='width: 100%;'><a href='http://northcountyhs.org'><img alt='This Image Cannot Be Loaded' src='img/nclogo.jpg' class='logo'></a></div>
        <form action='login.php' method='post'>
            <input type='hidden' name='Type' value='T'>
		    <div class='container'>
                <div class='LoginContainer'>
                    <br>
      		        <br>
			        <input type='text' name='Username' placeholder='Username' class='UI'>
			        <br>
                    <br>
			        <input type='password' name='Password' placeholder='Password' class='UI'>
                    <br>
      		        <a href='forgotPassword.php'>Forgot Your Password?</a>
                    <br>
      		        <br>
      		        <input type='submit' value='Log In' class='UILogin'>
      		        <br>
      		        <br>
                    <a href='newTeacher.php'>Need an account? Tap Here!</a>
                    <br>
                    <a href='password.php'>Reset Passwowrd Here!</a>
                    <br>
                    <br>
                </div>
		    </div>
        </form>
	</body>
</html>";
}
?>