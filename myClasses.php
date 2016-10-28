<?php
    //Set Page Data
    $Teacher = $_COOKIE["Teacher"];
    $isUserSet = isset($_COOKIE["Teacher"]);
    $F = "teachers/".sha1($Teacher)."/".sha1($Teacher).".json";
    $JSONFile = fopen($F, "r");
    $JSON = fread($JSONFile, filesize($F));
    fclose($JSONFile);
    $classes = json_decode($JSON);
    $F = "teachers/".$Teacher.".json";
    $File = fopen($F, "r");
    $JSON = fread($File, filesize("teachers/".$Teacher.".json"));
    fclose($File);
    $Info = json_decode($JSON, TRUE, filesize("teachers/".$Teacher.".json"));
    $Fname = $Info["Fname"];
    $Lname = $Info["Lname"];
    $Header = "<div style='overflow: hidden; margin-left: 25%; width: 50%; background-color: white; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);'><div style='float: left;'><b>Welcome, ".$Fname." ".$Lname."</b></div><a href='logOut.php'><div style='float: right; color: #bf1d32;'><span><b>Sign Out</b></span></div></a><div style='background-color: transparent; width: 4px; height: 17px; float: right;'></div><div style='background-color: black; width: 2px; height: 17px; float: right;'></div><div style='background-color: transparent; width: 4px; height: 17px; float: right;'></div><a href='myAccount.php'><div style='float: right; color: #bf1d32;'><span>My Account</span></div></a><div style='background-color: transparent; width: 4px; height: 17px; float: right;'></div><div style='background-color: black; width: 2px; height: 17px; float: right;'></div><div style='background-color: transparent; width: 4px; height: 17px; float: right;'></div><a href='teacherHome.php'><div style='float: right; color: #bf1d32;'><span>Home</span></div></a></div><div style='width: 100%;'><a href='http://northcountyhs.org'><img alt='This Image Cannot Be Loaded' src='img/nclogo.jpg' class='logo'></a></div>";
    if($classes["class1"]!=NULL)
    {
        $class1 = "<a href='".$classes["class1"].".php' class='noDec'><div class='teacherOption' style='background-color: #bf1d32;'><br>".$classes["class1"]."<br></div></a>";
    }
    else
    {
        $class1 = "<a href='newClass.php' class='noDec'><div class='teacherOption' style='background-color: #bf1d32;'><br><img src='img/plus.png' class='add'></div></a>";
    }
    if($classes["class2"]!=NULL)
    {
        $class2 = "<a href='".$classes["class2"].".php' class='noDec'><div class='teacherOption' style='background-color: #bf1d32;'><br>".$classes["class2"]."<br></div></a>";
    }
    else
    {
        $class2 = "<a href='newClass.php' class='noDec'><div class='teacherOption' style='background-color: #0d590d;'><br><img src='img/plus.png' class='add'><br>New Class</div></a>";
    }
    if($classes["class3"]!=NULL)
    {
        $class3 = "<a href='".$classes["class3"].".php' class='noDec'><div class='teacherOption' style='background-color: #bf1d32;'><br>".$classes["class3"]."<br></div></a>";
    }
    else
    {
        $class3 = "<a href='newClass.php' class='noDec'><div class='teacherOption' style='background-color: #1b1b7e;'><br><img src='img/plus.png' class='add'><br>New Class</div></a>";
    }
    if($classes["class4"]!=NULL)
    {
        $class4 = "<a href='".$classes["class4"].".php' class='noDec'><div class='teacherOption' style='background-color: #bf1d32;'><br>".$classes["class4"]."<br></div></a>";
    }
    else
    {
        $class4 = "<a href='newClass.php' class='noDec'><div class='teacherOption' style='background-color: #1b1b7e;'><br><img src='img/plus.png' class='add'><br>New Class</div></a>";
    }
    if($classes["class5"]!=NULL)
    {
        $class5 = "<a href='".$classes["class5"].".php' class='noDec'><div class='teacherOption' style='background-color: #bf1d32;'><br>".$classes["class5"]."<br></div></a>";
    }
    else
    {
        $class5 = "<a href='newClass.php' class='noDec'><div class='teacherOption' style='background-color: #bf1d32;'><br><img src='img/plus.png' class='add'><br>New Class</div></a>";
    }
    if($classes["class6"]!=NULL)
    {
        $class6 = "<a href='".$classes["class6"].".php' class='noDec'><div class='teacherOption' style='background-color: #bf1d32;'><br>".$classes["class6"]."<br></div></a>";
    }
    else
    {
        $class6 = "<a href='newClass.php' class='noDec'><div class='teacherOption' style='background-color: #0d590d;'><br><img src='img/plus.png' class='add'><br>New Class</div></a>";
    }
    if($isUserSet)
    {
echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width'>
        <link rel='stylesheet' type='text/css' href='css/style.css'>
        <title>".$Teacher."'s Classes</title>
        <script>
            function dropDown(ID)
            {
                var current = document.getElementById(ID).style.display;
                if (current==\"none\")
                {
                    document.getElementById(ID).style.display = \"block\";
                }
                else if(current == \"block\")
                {
                    document.getElementById(ID).style.display = \"none\"
                }
            }
        </script>
    </head>
    <body style='background-color: #ebebeb;'>
        ".$Header."
        <br>
        <br>
        <br>
        <table class='optionContainer'>
            <tr><td>".$class1."</td><td>".$class2."</td><td>".$class3."</td></tr>
            <tr><td>".$class4."</td><td>".$class5."</td><td>".$class6."</td></tr>
        </table>
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