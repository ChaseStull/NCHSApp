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
    <form action="login.php" method="post">
        <input type="hidden" name="Type" value="S">
		<div style="margin-top: 40%; margin-bottom: 50%; margin-left: auto; margin-right: auto; border-radius: 15px; width: 80%; height: auto; background-color: white; text-align: center;">
            <br>
      		<br>
			<input type="text" name="Username" placeholder="Student ID" style="width: 80%; height: 30px; background-color: black; color: white; border-radius: 15px; text-align: center; margin-left: auto; margin-right: auto;">
			<br>
			<input type="password" name="Password" placeholder="Password" style="width: 80%; height: 30px; background-color: black; color: white; border-radius: 15px; text-align: center; margin-left: auto; margin-right: auto;">
      		<a href="forgotPassword.php">Forgot Your Password?</a>
            <br>
      		<br>
      		<input type="submit" value="Log In" style="border: none; width: 80%; height: 60px; background-color: #bf1d32; color: white; border-radius: 30px; text-align: center; margin-left: auto; margin-right: auto;">
      		<br>
      		<br>
            <a href="newUser.php">Need an account? Tap Here!</a>
            <br>
            <a href="password.php">Reset Passwowrd Here!</a>
		</div>
    </form>
	</body>
</html>