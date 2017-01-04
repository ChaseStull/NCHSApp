<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
		<title>NCHS</title>
	</head>
	<body bgcolor="#ebebeb">
    <div style='width: 100%;'><a href='http://northcountyhs.org'><img alt='This Image Cannot Be Loaded' src='img/nclogo.jpg' style='margin-left: 25%; width: 50%; height: auto; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);'></a></div>
    <form action="resetPassword.php" method="post">
		<div style="margin-top: 40%; margin-bottom: 50%; margin-left: auto; margin-right: auto; border-radius: 15px; width: 80%; height: auto; background-color: white; text-align: center;">
            <br>
      		<br>
			<input type="text" name="Username" placeholder="Student ID" style="width: 80%; height: 30px; background-color: black; color: white; border-radius: 15px; text-align: center; margin-left: auto; margin-right: auto;">
			<br> 
			<input type="password" name="oldPassword" placeholder="Old Password" style="width: 80%; height: 30px; background-color: black; color: white; border-radius: 15px; text-align: center; margin-left: auto; margin-right: auto;">
      		<br>
      		<input type="password" name="newPassword" placeholder="New Password" style="width: 80%; height: 30px; background-color: black; color: white; border-radius: 15px; text-align: center; margin-left: auto; margin-right: auto;">
      		<br>
            <input type="password" name="newPasswordConfirm" placeholder="Confirm New Password" style="width: 80%; height: 30px; background-color: black; color: white; border-radius: 15px; text-align: center; margin-left: auto; margin-right: auto;">
      		<br>
      		<input type="submit" value="Reset Password" style="border: none; width: 80%; height: 60px; background-color: #bf1d32; color: white; border-radius: 30px; text-align: center; margin-left: auto; margin-right: auto;">
      		<br>
      		<br>
		</div>
    </form>
	</body>
</html>