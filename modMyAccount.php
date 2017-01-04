<?php
    //Set Page Data
    if(isset($_COOKIE["Student"]))
    {
        $User = $_COOKIE["Student"];
        $F = "students/".$User.".json";
        $isUserSet = TRUE;
    }
    elseif (isset($_COOKIE["Teacher"]))
    {
        $User = $_COOKIE["Teacher"];
        $F = "teachers/".$User.".json";
        $isUserSet = TRUE;
    }
    elseif(isset($_COOKIE["User"]))
    {
        if($_COOKIE["User"]=="Admin")
		{
			$User = $_POST["user"];
			$type = $_POST["type"];
			if($type=="s")
			{
				$F = "students/".$User.".json";
				$isUserSet = TRUE;
			}
            if($type == "t")
            {
                $F = "teachers/".$User.".json";
                $isUserSet = TRUE;
            }
		}
    }
    $File = fopen($F, "r");
    $JSON = fread($File, filesize($F));
    fclose($File);
    $Info = json_decode($JSON, TRUE, filesize($F));
    $Fname = $Info["Fname"];
    $Lname = $Info["Lname"];
    $Header = "<div style='overflow: hidden; margin-left: 25%; width: 50%; background-color: white; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);'><div style='float: left;'><b>Welcome, ".$Fname." ".$Lname."</b></div><a href='logOut.php'><div style='float: right; color: #bf1d32;'><b>Sign Out</b></div></a><div style='background-color: transparent; width: 4px; height: 17px; float: right;'></div><div style='background-color: black; width: 2px; height: 17px; float: right;'></div><div style='background-color: transparent; width: 4px; height: 17px; float: right;'></div><a href='myAccount.php'><div style='float: right; color: #bf1d32;'>My Account</div></a><div style='background-color: transparent; width: 4px; height: 17px; float: right;'></div><div style='background-color: black; width: 2px; height: 17px; float: right;'></div><div style='background-color: transparent; width: 4px; height: 17px; float: right;'></div><a href='teacherHome.php'><div style='float: right; color: #bf1d32;'>Home</div></a></div><div style='width: 100%;'><a href='http://northcountyhs.org'><img alt='This Image Cannot Be Loaded' src='img/nclogo.jpg' class='logo'></a></div>";
    if($isUserSet&&($_COOKIE["User"]!="Admin"))
    {
echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width'>
        <link rel='stylesheet' type='text/css' href='css/style.css'>
        <title>My Information</title>
    </head>
    <body style='background-color: #ebebeb;'>
        ".$Header."
        <br>
        <br>
        <br>
        <form action='modInfo.php' method='post'>
		    <div class='container'>
                <div class='LoginContainer'>
                    <input type='hidden' name='admin' value='no'>
						<input type='hidden' name='user' value='".$User."'>
						<input type='hidden' name='type' value='".$type."'>
						<br>
                    Current: ".$Fname."
                    <br>
			        <input type='text' name='Fname' placeholder='New First Name' class='UI'>
			        <br>
                    Current: ".$Lname."
                    <br>
			        <input type='text' name='Lname' placeholder='New Last Name' class='UI'>
                    <br>
                    <br>
                    <input type='password' name='password' placeholder='Password' class='UI'>
                    <br>
                    <a href='help/rePass.html'>Why do we need your password?</a>
                    <br>
                    <br>
      		        <div style='background-color: transparent; width: 80%; margin-left: auto; margin-right: auto;'><div style='background-color: transparent; float: left; width: 5%;'></div><a href='myAccount.php' class='noDec'><div class='cancel' style=''><br><br>Cancel</div></a><input type='submit' value='Save' class='UILogin' style='width: 45%; float: right'><div style='background-color: transparent; float: right; width: 5%;'></div><br></div>
      		        <br>
      		        <br>
                </div>
		    </div>
        </form>
    </body>
</html>";
}
elseif($_COOKIE["User"]=="Admin")
{
	echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width'>
        <link rel='stylesheet' type='text/css' href='css/style.css'>
        <title>My Information</title>
    </head>
    <body style='background-color: #ebebeb;'>
        ".$Header."
        <br>
        <br>
        <br>
        <form action='modInfo.php' method='post'>
		    <div class='container'>
                <div class='LoginContainer'>
						<input type='hidden' name='admin' value='yes'>
                    <br>
                    Current: ".$Fname."
                    <br>
			        <input type='text' name='Fname' placeholder='New First Name' class='UI'>
			        <br>
                    Current: ".$Lname."
                    <br>
			        <input type='text' name='Lname' placeholder='New Last Name' class='UI'>
                    <br>
                    <br>
                    <input type='password' name='password' placeholder='Administrator Password' class='UI'>
                    <br>
                    <a href='help/rePass.html'>Why do we need your password?</a>
                    <br>
                    <br>
      		        <div style='background-color: transparent; width: 80%; margin-left: auto; margin-right: auto;'><div style='background-color: transparent; float: left; width: 5%;'></div><a href='myAccount.php'><div class='UILogin' style='line-height: 50%; float: left; width: 45%; background-color: #b1b1b1;'><br><br>Cancel</div></a><input type='submit' value='Save' class='UILogin' style='width: 45%; float: right'><div style='background-color: transparent; float: right; width: 5%;'></div><br></div>
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
		<title>Login</title>
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