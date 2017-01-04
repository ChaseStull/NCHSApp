<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
        <link rel='stylesheet' type='text/css' href='css/style.css'>
		<title>NCHS</title>
	</head>
	<body style='background-color: #ebebeb;'>
        <div style='width: 100%;'><a href='http://northcountyhs.org'><img alt='This Image Cannot Be Loaded' src='img/nclogo.jpg' style='margin-left: 25%; width: 50%; height: auto; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);'></a></div>
        <form action="register.php" method="post">
            <div class='container' style='margin-top: 3%;'>
		        <div class='LoginContainer'>
                    <br>
      		        <br>
                    <input type="hidden" name="type" value="T">
			        <input type="text" name="Username" placeholder="Choose A Username" class='UI'>
			        <br>
                    <br>
			        <input type="text" name="IDConfirm" placeholder="Confirm Your Username" class='UI'>
      		        <br>
                    <br>
			        <input type="text" name="Fname" placeholder="First Name" class='UI'>
      		        <br>
                    <br>
			        <input type="text" name="Lname" placeholder="Last Name" class='UI'>
      		        <br>
                    <br>
                    <input type="text" name="email" placeholder="E-Mail Address" class='UI'>
      		        <br>
                    <br>
                    <input type="password" name="Password" placeholder="Choose A Password" class='UI'>
      		        <br>
                    <br>
                    <input type="password" name="PasswordConfirm" placeholder="Confirm Your Password" class='UI'>
                    <br>
                    <br>
                    <input type="text" name="numVer" placeholder="Enter your Verification Number" class='UI'>
      		        <br>
                    <br>
                    <br>
      		        <input type="submit" value="Register"  class='UILogin'>
      		        <br>
      		        <br>
                    <a href="teacherLogin.php">Already have an account? Log in here</a>
                    <br>
                    <br>
		        </div>
            </div>
        </form>
	</body>
</html>