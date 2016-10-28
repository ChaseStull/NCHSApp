<?php
    //Set Page Data
    $Teacher = $_COOKIE["Teacher"];
    $isUserSet = isset($_COOKIE["Teacher"]);
    $F = "teachers/".$Teacher.".json";
    $File = fopen($F, "r");
    $JSON = fread($File, filesize("teachers/".$Teacher.".json"));
    fclose($File);
    $Info = json_decode($JSON, TRUE, filesize("teachers/".$Teacher.".json"));
    $Fname = $Info["Fname"];
    $Lname = $Info["Lname"];
    $Header = "<div style='overflow: hidden; margin-left: 25%; width: 50%; background-color: white; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);'><div style='float: left;'><b>Welcome, ".$Fname." ".$Lname."</b></div><a href='logOut.php'><div style='float: right; color: #bf1d32;'><span><b>Sign Out</b></span></div></a><div style='background-color: transparent; width: 4px; height: 17px; float: right;'></div><div style='background-color: black; width: 2px; height: 17px; float: right;'></div><div style='background-color: transparent; width: 4px; height: 17px; float: right;'></div><a href='myAccount.php'><div style='float: right; color: #bf1d32;'><span>My Account</span></div></a><div style='background-color: transparent; width: 4px; height: 17px; float: right;'></div><div style='background-color: black; width: 2px; height: 17px; float: right;'></div><div style='background-color: transparent; width: 4px; height: 17px; float: right;'></div><a href='teacherHome.php'><div style='float: right; color: #bf1d32;'><span>Home</span></div></a></div><div style='width: 100%;'><a href='http://northcountyhs.org'><img alt='This Image Cannot Be Loaded' src='img/nclogo.jpg' class='logo'></a></div>";
if($isUserSet)
{
echo "<!DOCTYPE html>
<html>
	<head>
		<meta charset=\"utf-8\">
		<meta name=\"viewport\" content=\"initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width\">
        <link rel='stylesheet' type='text/css' href='css/style.css'>
		<title>Create A Class</title>
	</head>
	<body style='background-color: #ebebeb;'>
    ".$Header."
    <form action=\"crcl.php\" method=\"post\">
		<div class='container'>
            <div class='LoginContainer'>
                <br>
                <b>Create A Class</b>
      		    <br>
                <br>
                <input type=\"hidden\" name=\"teacher\" value='".$Fname." ".$Lname."'>
			    <select name='period' class='UI'>
                    <option style='text-align: center;' value='1A'>1A</option>
                    <option style='text-align: center;' value='2A'>2A</option>
                    <option style='text-align: center;' value='3A'>3A</option>
                    <option style='text-align: center;' value='4A'>4A</option>
                    <option style='text-align: center;' value='1B'>1B</option>
                    <option style='text-align: center;' value='2B'>2B</option>
                    <option style='text-align: center;' value='3B'>3B</option>
                    <option style='text-align: center;' value='4B'>4B</option>
                </select>
			    <br>
                <br>
			    <select name='difficulty' class='UI'>
                    <option style='text-align: center;' value='AP'>AP</option>
                    <option style='text-align: center;' value='Honors'>Honors</option>
                    <option style='text-align: center;' value='STEM'>STEM</option>
                    <option style='text-align: center;' value='Standard'>Standard</option>
                </select>
      		    <br>
                <br>
                <input type=\"text\" name=\"class_name\" placeholder=\"Class Name (eg. English or Statistics)\" class='UI'>
                <br>
      		    <br>
      		    <input type=\"submit\" value=\"Create Class\" class='UILogin'>
      		    <br>
      		    <br>
		    </div>
        </div>
    </form>
	</body>
</html>";
}
else
{
     echo "<!DOCTYPE html>
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