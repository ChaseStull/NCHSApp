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
    else
    {
        $isUserSet = FALSE;
    }
    $File = fopen($F, "r");
    $JSON = fread($File, filesize($F));
    fclose($File);
    $Info = json_decode($JSON, TRUE, filesize($F));
    $Fname = $Info["Fname"];
    $Lname = $Info["Lname"];
    $Header = "<div style='overflow: hidden; margin-left: 25%; width: 50%; background-color: white; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);'><div style='float: left;'><b>Welcome, ".$Fname." ".$Lname."</b></div><a href='logOut.php'><div style='float: right; color: #bf1d32;'><b>Sign Out</b></div></a><div style='background-color: transparent; width: 4px; height: 17px; float: right;'></div><div style='background-color: black; width: 2px; height: 17px; float: right;'></div><div style='background-color: transparent; width: 4px; height: 17px; float: right;'></div><a href='myAccount.php'><div style='float: right; color: #bf1d32;'>My Account</div></a><div style='background-color: transparent; width: 4px; height: 17px; float: right;'></div><div style='background-color: black; width: 2px; height: 17px; float: right;'></div><div style='background-color: transparent; width: 4px; height: 17px; float: right;'></div><a href='teacherHome.php'><div style='float: right; color: #bf1d32;'>Home</div></a></div><div style='width: 100%;'><a href='http://northcountyhs.org'><img alt='This Image Cannot Be Loaded' src='img/nclogo.jpg' class='logo'></a></div>";
    if($isUserSet)
    {
echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width'>
        <link rel='stylesheet' type='text/css' href='css/style.css'>
        <title>My Information</title>
        <script>
            function confirmDelete()
            {
                if(confirm(\"Are you sure you want to delete your account? this action can not be undone!\") == true)
                {
                    document.getElementById(\"del\").submit();
                }
				   else
					{
						document.getElementById(\"del\").submit();
					}
            }
		  </script>
    </head>
    <body style='background-color: #ebebeb;'>
        ".$Header."
        <br>
        <br>
        <br>
        <form id='del' style='display: none;' action='delAccount.php' method='post'>
            <input name='user' type='hidden' value='".$User."'>
            <input name='submit' type='submit' style='display: none;'>
        </form>
        <div class='container'>
            <div class='LoginContainer'>
                <br>
                First Name
		        <div class='UI' style='line-height: 40%;'><br><br>".$Fname."</div>
	            <br>
                Last Name
		        <div class='UI' style='line-height: 40%;'><br><br>".$Lname."</div>
                <br>
                <br>
                <div style='width: 80%; background-color: transparent; height: auto; margin-left: auto; margin-right: auto;'>
                    <a href='modMyAccount.php' class='noDec'><div class='UILogin' style='line-height: 50%; width: 47%; float: left; background-color: black;'><br><br>Edit Info</div></a>
				   <button onclick='confirmDelete();' class='UILogin' style='width: 47%; float: right;'>Delete Account</button>
                </div>
      		    <br>
      		    <br>
            </div>
		</div>
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