<?php
  $fileToCheck = $Username + ".txt";
  echo $fileToCheck;
  $file = sha1(file_get_contents($_POST["Username"] + ".txt"));
  $check = sha1($Password);

  echo $file;
  echo " ! ";
  echo $check;
  echo " ! ";
  echo $Password;
  if ($check == $file) {
  	echo "<a href='studentHome.html' style='text-decoration: none;'><div style='margin-left: auto; margin-right: auto; margin-top: 50%; background-color: #ed3132; border-radius: 15px; height: 30px; width: 50%; text-align: center; font-size: 15px; color: black;'>Success! Click Here to Go To Your Home Page</div></a>";
    setcookie("Username", $Username, 86400/2, "/");
  }
  elseif ($check != $file){
    echo "<a href='studentLogin.php' style='text-decoration: none;'><div style='margin-left: auto; margin-right: auto; margin-top: 50%; background-color: #ed3132; border-radius: 15px; height: 30px; width: 50%; text-align: center; font-size: 15px; color: black;'>Login Failed! Click Here To Go Back To Login Page</div></a>";
  }
?>
<!--<!DOCTYPE html>
<html>
<head>
	<title>NCHS</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<a href="studentHome.html"><div>Success! Click Here to Go To Your Home Page!</div></a>
</body>
</html>-->