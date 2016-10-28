<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
		<title>NCHS</title>
	</head>
	<body style='background-color: #ebebeb'>
    <div style='width: 100%;'><a href='http://northcountyhs.org'><img alt='This Image Cannot Be Loaded' src='img/nclogo.jpg' style='margin-left: 25%; width: 50%; height: auto; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);'></a></div>
    <form action="register.php" method="post">
        <div style='text-align: center; margin-left: auto; margin-right: auto; border-radius: 5px; width: 30%; height: auto; background-color: white; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);'>
		<div style='text-align: center; margin-top: 10%; overflow: hidden; background-color: transparent; height: auto; width: 100%; margin-left: auto; margin-right: auto;'>
            <br>
      		<br>
            <input type="hidden" name="type" value="S">
			<input type="text" name="Username" placeholder="Enter Your 6 Digit Student ID" style='width: 80%; height: 30px; background-color: black; color: white; border: none; border-radius: 3px; text-align: center; margin-left: auto; margin-right: auto;'>
			<br>
            <br>
			<input type="text" name="IDConfirm" placeholder="Confirm Student ID" style='width: 80%; height: 30px; background-color: black; color: white; border: none; border-radius: 3px; text-align: center; margin-left: auto; margin-right: auto;'>
      		<br>
            <br>
			<input type="text" name="Fname" placeholder="First Name" style='width: 80%; height: 30px; background-color: black; color: white; border: none; border-radius: 3px; text-align: center; margin-left: auto; margin-right: auto;'>
			<br>
            <br>
			<input type="text" name="Lname" placeholder="Last Name" style='width: 80%; height: 30px; background-color: black; color: white; border: none; border-radius: 3px; text-align: center; margin-left: auto; margin-right: auto;'>
      		<br>
            <br>
            <input type="text" name="email" placeholder="E-Mail Address" style='width: 80%; height: 30px; background-color: black; color: white; border: none; border-radius: 3px; text-align: center; margin-left: auto; margin-right: auto;'>
      		<br>
            <br>
            <input type="password" name="Password" placeholder="Password" style='width: 80%; height: 30px; background-color: black; color: white; border: none; border-radius: 3px; text-align: center; margin-left: auto; margin-right: auto;'>
      		<br>
            <br>
            <input type="password" name="PasswordConfirm" placeholder="Confirm Password" style='width: 80%; height: 30px; background-color: black; color: white; border: none; border-radius: 3px; text-align: center; margin-left: auto; margin-right: auto;'>
      		<br>
            <br>
            <br>
      		<input type="submit" value="Register" style='border: none; width: 70%; height: 40px; background-color: #bf1d32; color: white; border-radius: 5px; text-align: center; margin-left: auto; margin-right: auto;'>
      		<br>
      		<br>
            <a href="studentLogin.php">Already have an account? Log in here</a>
            <br>
            <br>
		</div>
        </div>
    </form>
	</body>
</html>