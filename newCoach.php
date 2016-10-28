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
        <form action="newReg.php" method="post">
            <div class='container' style='margin-top: 3%;'>
		        <div class='LoginContainer'>
                    <br>
      		        <br>
                    <input type="hidden" name="type" value="c">
			        <input type="text" name="username" placeholder="Choose A Username" class='UI'>
			        <br>
                    <br>
			        <input type="text" name="usernameConfirm" placeholder="Confirm Your Username" class='UI'>
      		        <br>
                    <br>
			        <input type="text" name="fName" placeholder="First Name" class='UI'>
      		        <br>
                    <br>
			        <input type="text" name="lName" placeholder="Last Name" class='UI'>
      		        <br>
                    <br>
                    <input type="text" name="email" placeholder="E-Mail Address" class='UI'>
						<br>
						<br>
						<select class='UI' name='sport' placeholder='Sport'>
							<option value='bs'>Boys Soccer</option>
							<option value='gs'>Girls Soccer</option>
							<option value='xc'>Cross Country</option>
							<option value='vb'>Volleyball</option>
							<option value='bbb'>Boys Basketball</option>
							<option value='gbb'>Girls Basketball</option>
							<option value='tf'>Track & Field</option>
							<option value='fh'>Field Hockey</option>
							<option value='ut'>Unified Tennis</option>
                            <option value='chl'>Cheerleading</option>
							<option value='g'>Golf</option>
							<option value='ub'>Unified Bowling</option>
							<option value='w'>Wrestling</option>
							<option value='bb'>Baseball</option>
							<option value='bl'>Boys Lacrosse</option>
							<option value='gl'>Girls Lacrosse</option>
							<option value='sb'>Softball</option>
							<option value='t'>Tennis</option>
						</select>
      		        <br>
                    <br>
                    <input type="password" name="password" placeholder="Choose A Password" class='UI'>
      		        <br>
                    <br>
                    <input type="password" name="passwordConfirm" placeholder="Confirm Your Password" class='UI'>
                    <br>
                    <br>
                    <input type="text" name="verificationCode" placeholder="Enter your Verification Number" class='UI'>
      		        <br>
                    <br>
                    <br>
      		        <input type="submit" value="Register"  class='UILogin'>
      		        <br>
      		        <br>
                    <a href="coachLogin.php">Already have an account? Log in here</a>
                    <br>
                    <br>
		        </div>
            </div>
        </form>
	</body>
</html>