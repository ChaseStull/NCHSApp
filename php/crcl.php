<?php
//Get the name of the class owner
if(isset($_COOKIE["Teacher"]))
    {
    $Teacher = $_COOKIE["Teacher"];
    $F = "teachers/".$Teacher.".json";
    $File = fopen($F, "r");
    $JSON = fread($File, filesize("teachers/".$Teacher.".json"));
    fclose($File);
    $Info = json_decode($JSON, TRUE, filesize("teachers/".$Teacher.".json"));
    $Fname = $Info["Fname"];
    $Lname = $Info["Lname"];

    //Define class properties
    $Period = $_POST["period"];
    $Diff = $_POST["difficulty"];
    $Class = $_POST["class_name"];

    //Set general file that is unique to the class being created
    $s = $Info["Lname"].": ".$Period." ".$Diff." ".$Class;
    $ClassFile = sha1($Teacher["Lname"].": ".$Period." ".$Diff." ".$Class);

    //Add the class to the list of classes for that teacher
    $File = fopen("teachers/".sha1($Teacher)."/classes.json", "r");
    $Content = fread($File, filesize("teachers/".sha1($Teacher)."/classes.json"));
    fclose($File);
    $JSON = json_decode($Content);
    $ClassArr = array("identifier"=>$ClassFile, "name"=>$Teacher["Lname"].": ".$Period." ".$Diff." ".$Class, "students"=>array(""), "assignments"=>array(""), "tips"=>array(""));
    array_push($JSON, $ClassArr);
    $JSON = json_encode($JSON);
    $File = fopen("teachers/".sha1($Teacher)."/classes.json", "w");
    fwrite($File, $JSON);
    fclose($File);

    //Write the php file for the Teacher view class page
    $File = fopen($ClassFile.".php", "w")
    fwrite($File,  "<html>
                        <head>
                            
                            <title>".$s."</title>
                        </head>
                        <body style='background-color: #ebebeb'>
                        </body>
                    </html>")
    //Return a success message with a link to the home page
    echo "<body style='background-color: #ebebeb;'><div style='width: 100%;'><a href='http://northcountyhs.org'><img alt='This Image Cannot Be Loaded' src='img/nclogo.jpg' style='margin-left: 25%; width: 50%; height: auto; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);'></a></div><a href='".$ClassFile.".php' style='text-decoration: none;'><div style='margin-left: auto; margin-right: auto; margin-top: 15%; background-color: #bf1d32; border-radius: 3px; height: 50px; width: 30%; text-align: center; color: black;'><br>Your class, <b>$Period." ".$Diff." ".$Class</b>,<br>was created succesfully</div></a>";
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
