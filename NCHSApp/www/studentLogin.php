<?php
	if (isset($_COOKIE["Username"])) {
		echo "cookie is set"
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
		<title>NCHS</title>
		<link href="lib/ionic/css/ionic.css" rel="stylesheet">
		<script src="lib/ionic/js/ionic.bundle.js"></script>
		<script src="cordova.js"></script>
	</head>
	<body bgcolor="#ebebeb">
    <img src="img/nclogo.jpg" width="100%" height="auto">
		<div style="margin-top: 20%; margin-bottom: 30%; margin-left: auto; margin-right: auto; border-radius: 15px; width: 75%; height: auto; background-color: white; text-align: center;">
    	<form action="login.php" method="post">
      		<br>
      		<br>
			<input type="text" placeholder="Username" style="width: 80%; height: 80px; background-color: black; color: white; border-radius: 40px; text-align: center; margin-left: auto; margin-right: auto; font-size: 20px;">
			<br>
			<input type="password" placeholder="Password" style="width: 80%; height: 80px; background-color: black; color: white; border-radius: 40px; text-align: center; margin-left: auto; margin-right: auto; font-size: 20px;">
      		<br>
      		<br>
      		<input type="submit" value="Log In" style="border: none; width: 80%; height: 60px; background-color: #bf1d32; color: white; border-radius: 30px; text-align: center; margin-left: auto; margin-right: auto;">
      		<br>
      		<br>
		</div>
    </form>
	</body>
</html>