<?php
	if(isset($_COOKIE["User"]))
	{
		if($_COOKIE["User"] == "Admin")
		{
			echo "<html>
				<head>
					<meta charset='utf-8'>
					<meta name='viewport' content='initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width'>
					<title>Admin Creation Tool</title>
					<link rel='stylesheet' type='text/css' href='css/style.css'>
				</head>
				<body style='background-color: #ebebeb;'>
					<form id='decide' action='redirect.php' method='get' class='loginContainer'>
						<input type='hidden' name='io' value='input'>
						<br>
						Select An Option
						<br>
						<br>
						<select name='type' class='UI' placeholder='Select one'>
							<option value='adminCreateUser.php1'>Student</option>
							<option value='adminCreateUser.php2'>Teacher</option>
							<option value='adminCreateUser.php3'>Administrator</option>
							<option value='adminCreateUser.php4'>Coach</option>
							<option value='adminCreateGroup.php1'>Class</option>
							<option value='adminCreateGroup.php2'>Club</option>
							<option value='adminCreateGroup.php3'>Team</option>
							<option value='adminSendNotification.php'>Notification</option>
						</select>
						<br>
						<br>
						<button class='UILogin'>Continue</button>
					</form>
				</body>
			</html>";
		}
		else
		{
			echo "Access Denied";
		}
	}
	else
	{
		echo "<html>
	<head>
		<meta charset='utf-8'>
		<meta name='viewport' content='initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width'>
        <link rel='stylesheet' type='text/css' href='css/style.css'>
		<title>NCHS</title>
	</head>
	<body style='background-color: #ebebeb;'>
        <div style='width: 100%;'><a href='http://northcountyhs.org'><img alt='This Image Cannot Be Loaded' src='img/nclogo.jpg' class='logo'></a></div>
        <form action='alogin.php' method='post'>
            <input type='hidden' name='Type' value='A'>
			<input type='hidden' name='redirect' value='adminCreate.php'>
		    <div class='container'>
                <div class='LoginContainer'>
                    <br>
                    <span style='color: #bf1d32'><b>Administrative Login</b></span>
                    <br>
      		        <br>
			        <input type='password' name='Password' placeholder='Password' class='UI'>
                    <br>
      		        <br>
      		        <input type='submit' value='Log In' class='UILogin'>
                    <br>
                    <br>
                </div>
		    </div>
        </form>
	</body>
</html>";
	}
?>