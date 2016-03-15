<?php
$Username = $Password = "";

  $Username = $_POST["Username"];
  $Password = sha1($_POST["Password"]);
  $Login = "";

  $file = file_get_contents(sha1(sha1("Accounts"))/$Username.txt, r);

  if ($Password == $file) {
	setcookie("Username", $Username, time() + 86400, "/");
	$Login = "true";
  }
  else{
  	$Login = "false";
  }
?>
<<!DOCTYPE html>
<html>
<head>
	<title>NCHS</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<a href="studentHome.html"><div>Success! Click Here to Go To Your Home Page!</div></a>
</body>
</html>