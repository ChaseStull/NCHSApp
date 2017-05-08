<?php
  require("functions.php");
  $Type = $_POST["Type"];
  $Password = $_POST["Password"];
  $check = sha1($Password);
  $SID = $_POST["Username"];
  $file1 = sha1($SID).".txt";
  $file = file_get_contents(sha1($SID).".txt");
if(file_exists($file1))
{
    if ($check == $file)
    {
        if ($Type=="S")
        {
            echo "<body bgcolor='#ebebeb'><div style='width: 100%;'><a href='http://northcountyhs.org'><img alt='This Image Cannot Be Loaded' src='img/nclogo.jpg' style='margin-left: 25%; width: 50%; height: auto; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);'></a></div><a href='studentHome.php' style='text-decoration: none; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);'><div style='margin-left: auto; margin-right: auto; margin-top: 15%; background-color: #bf1d32; border-radius: 3px; height: 50px; width: 30%; text-align: center; color: black;'><br>Success! Tap here to go to your home page</div></a></body>";
            setcookie("Student", $SID, time()+43200, "/");
        }
        if ($Type=="T")
        {
            echo "<body bgcolor='#ebebeb'><div style='width: 100%;'><a href='http://northcountyhs.org'><img alt='This Image Cannot Be Loaded' src='img/nclogo.jpg' style='margin-left: 25%; width: 50%; height: auto; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);'></a></div><a href='teacherHome.php' style='text-decoration: none;'><div style='margin-left: auto; margin-right: auto; margin-top: 15%; background-color: #bf1d32; border-radius: 3px; height: 50px; width: 30%; text-align: center; color: black;'><br>Success! Tap here to go to your home page</div></a></body>";
            setcookie("Teacher", $SID, time()+43200, "/");
            setcookie("Used", "Teacher", time()+(86400*365), "/");
        }
    }
    else if ($check != $file)
    {
        if ($Type=="S")
        {
            echo "<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<meta name='viewport' content='initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width'>
        <link rel='stylesheet' type='text/css' href='css/style.css'>
		<title>NCHS</title>
	</head>
	<body style='background-color: #ebebeb'>
        <div style='width: 100%;'><a href='http://northcountyhs.org'><img alt='This Image Cannot Be Loaded' src='img/nclogo.jpg' class='logo'></a></div>
        <form action='login.php' method='post'>
            <input type='hidden' name='Type' value='S'>
		    <div class='container'>
                <div class='LoginContainer'>
                    <br>
                    <span class='errorMessage'>* Invalid Username or Password</span>
      		        <br>
			        <input type='text' name='Username' placeholder='Student ID' class='UI'>
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
                    <a href='newUser.php'>Need an account? Tap Here!</a>
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
        else if ($Type=="T")
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
                    <span class='errorMessage'>* Invalid Username or Password</span>
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
    }
}
else
{
    if ($Type=="S")
    {
        echo "<html>
	<head>
		<meta charset='utf-8'>
		<meta name='viewport' content='initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width'>
		<title>Create An Account</title>
	</head>
	<body style='background-color: #ebebeb'>
    <div style='width: 100%;'><a href='http://northcountyhs.org'><img alt='This Image Cannot Be Loaded' src='img/nclogo.jpg' style='margin-left: 25%; width: 50%; height: auto; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);'></a></div>
    <form action='register.php' method='post'>
        <div style='text-align: center; margin-left: auto; margin-right: auto; border-radius: 5px; width: 30%; height: auto; background-color: white; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);'>
		<div style='text-align: center; margin-top: 10%; overflow: hidden; background-color: transparent; height: auto; width: 100%; margin-left: auto; margin-right: auto;'>
            <br>
            <span style='margin-left: auto; margin-right: auto;'><b>Create An Account</b></span>
      		<br>
            <br>
            <input type='hidden' name='type' value='S'>
			<input type='text' name='Username' placeholder='Enter Your 6 Digit Student ID' value='$SID' style='width: 80%; height: 30px; background-color: black; color: white; border: none; border-radius: 3px; text-align: center; margin-left: auto; margin-right: auto;'>
			<br>
            <br>
			<input type='text' name='IDConfirm' placeholder='Confirm Student ID' style='width: 80%; height: 30px; background-color: black; color: white; border: none; border-radius: 3px; text-align: center; margin-left: auto; margin-right: auto;'>
      		<br>
            <br>
            <input type='email' name='email' placeholder='E-Mail Address' style='width: 80%; height: 30px; background-color: black; color: white; border: none; border-radius: 3px; text-align: center; margin-left: auto; margin-right: auto;'>
      		<br>
            <br>
            <input type='password' name='Password' placeholder='Password' value='$Password' style='width: 80%; height: 30px; background-color: black; color: white; border: none; border-radius: 3px; text-align: center; margin-left: auto; margin-right: auto;'>
      		<br>
            <br>
            <input type='password' name='PasswordConfirm' placeholder='Confirm Password' style='width: 80%; height: 30px; background-color: black; color: white; border: none; border-radius: 3px; text-align: center; margin-left: auto; margin-right: auto;'>
      		<br>
            <br>
            <br>
      		<input type='submit' value='Register' style='border: none; width: 70%; height: 40px; background-color: #bf1d32; color: white; border-radius: 5px; text-align: center; margin-left: auto; margin-right: auto;'>
      		<br>
      		<br>
            <a href='studentLogin.php'>Already have an account? Log in here</a>
            <br>
            <br>
		</div>
        </div>
    </form>
	</body>
</html>";
    }
    else if ($Type=="T")
    {
        echo "<body bgcolor='#ebebeb'><a href='newTeacher.php' style='text-decoration: none;'><div style='margin-left: auto; margin-right: auto; margin-top: 50%; background-color: #bf1d32; border-radius: 75px; height: 150px; width: 80%; text-align: center; font-size: 40px; color: black;'>Sorry, That account doesn't exist! Tap here to make a new one</div></a></body>";
    }
    if($type == "c")
    {
        $file = "coaches/coaches.json";
        $f = fopen($file, "r");
        $coaches = fread($f, filesize($file));
        $coaches = json_decode($coaches, false, filesize($file));
        fclose($f);
        
        $resolved = false;
        for($i = 0; $i < count($coaches); $i++)
        {
            if($SID == $coaches[$i][0])
            {
                if(sha1($Password) == $coaches[$i][4])
                {
                    echo "<body bgcolor='#ebebeb'><div style='width: 100%;'><a href='http://northcountyhs.org'><img alt='This Image Cannot Be Loaded' src='img/nclogo.jpg' style='margin-left: 25%; width: 50%; height: auto; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);'></a></div><a href='coachHome.php' style='text-decoration: none; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);'><div style='margin-left: auto; margin-right: auto; margin-top: 15%; background-color: #bf1d32; border-radius: 3px; height: 50px; width: 30%; text-align: center; color: black;'><br>Success! Click here to go to your home page</div></a></body>";
                    $i = count($coaches);
                    setCookie("User", $SID, time()+43200, "/");
                    $resolved = true;
                }
                else
                {
                    errMsg("Bad Password", "Sorry, that password doesn't match our records!");
                    $i = count($coaches);
                    $resolved = true;
                }
            }           
        }
        if(!$resolved)
        {
            errMsg("User Not Found", "Sorry, that user doesnt exist!");
        }
    }
}
?>