<?php
    require("functions.php");
    $io = $_POST["io"];
    if(isset($_COOKIE["User"]))
    {
        if($_COOKIE["User"] == "Admin")
        {
            if($io == "input")
            {
                if($_POST["type"] == "student")
                {
                    echo "<html>
	<head>
		<meta charset='utf-8'>
		<meta name='viewport' content='initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width'>
        <link rel='stylesheet' type='text/css' href='css/style.css'>
		<title>NCHS</title>
        <style>
            .UI{
                width: 100%;
            }
            td{
                padding: 3px;
            }
            .UILogin{
                width: 100%;
                height: 30px;
                border-radius: 3px;
            }
            .LoginContainer{
                height: auto;
                min-height: 0px;
            }
        </style>
	</head>
	<body style='background-color: #ebebeb;'>
        <form action='adminCreateUser.php' method='post'>
            <input type='hidden' name='io' value='output'>
            <input type='hidden' name='type' value='student'>
			<br>
			<br>
		    <div class='LoginContainer' style='width: 80%'>
                <table style='width: 95%; padding: 5px; margin-left: auto; margin-right: auto;'>
                    <thead>
                        <th colspan='2'>New Student</th>
                    </thead>      
                    <tbody>
                        <tr><td><input type='text' name='username' placeholder='Enter Student&#39;s Student ID' class='UI'></td><td><input type='text' name='usernameConfirm' placeholder='Confirm Student ID' class='UI'></td></tr>
                        <tr><td></td><td></td></tr>
                        <tr><td><input type='text' name='fName' placeholder='Student&#39;s First Name' class='UI'></td><td><input type='password' name='password' placeholder='Choose Student&#39;s Password' class='UI'></td></tr>
                        <tr><td></td><td></td></tr>
                        <tr><td><input type='text' name='lName' placeholder='Student&#39;s Last Name' class='UI'></td><td><input type='password' name='passwordConfirm' placeholder='Confirm Student&#39;s Password' class='UI'></td></tr>
                        <tr><td></td><td></td></tr>
                        <tr><td><input type='text' name='email' placeholder='Student&#39;s E-Mail Address' class='UI'></td><td><button class='UILogin'>Create</button></td></tr>
                        <tr><td></td><td></td></tr>
                        <tr><td></td><td></td></tr>
                    </tbody>
                </table>
            </div>
        </form>
	</body>
</html>";
                }
                else if($_POST["type"] == "teacher")
                {
                    echo "<html>
	<head>
		<meta charset='utf-8'>
		<meta name='viewport' content='initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width'>
        <link rel='stylesheet' type='text/css' href='css/style.css'>
		<title>NCHS</title>
        <style>
            .UI{
                width: 100%;
            }
            td{
                padding: 3px;
            }
            .UILogin{
                width: 100%;
                height: 30px;
                border-radius: 3px;
            }
            .LoginContainer{
                height: auto;
                min-height: 0px;
            }
        </style>
	</head>
	<body style='background-color: #ebebeb;'>
        <form action='adminCreateUser.php' method='post'>
            <input type='hidden' name='io' value='output'>
            <input type='hidden' name='type' value='teacher'>
			<br>
			<br>
		    <div class='LoginContainer' style='width: 80%'>
                <table style='width: 95%; padding: 5px; margin-left: auto; margin-right: auto;'>
                    <thead>
                        <th colspan='2'>New Teacher</th>
                    </thead>      
                    <tbody>
                        <tr><td><input type='text' name='username' placeholder='Enter Teachers&#39;s Username' class='UI'></td><td><input type='text' name='usernameConfirm' placeholder='Confirm Teacher&#39;s Username' class='UI'></td></tr>
                        <tr><td></td><td></td></tr>
                        <tr><td><input type='text' name='fName' placeholder='Teacher&#39;s First Name' class='UI'></td><td><input type='password' name='password' placeholder='Choose Teacher&#39;s Password' class='UI'></td></tr>
                        <tr><td></td><td></td></tr>
                        <tr><td><input type='text' name='lName' placeholder='Teacher&#39;s Last Name' class='UI'></td><td><input type='password' name='passwordConfirm' placeholder='Confirm Teacher&#39;s Password' class='UI'></td></tr>
                        <tr><td></td><td></td></tr>
                        <tr><td><input type='text' name='email' placeholder='Teacher&#39;s E-Mail Address' class='UI'></td><td><button class='UILogin'>Create</button></td></tr>
                        <tr><td></td><td></td></tr>
                        <tr><td></td><td></td></tr>
                    </tbody>
                </table>
            </div>
        </form>
	</body>
</html>";
                }
                else if($_POST["type"] == "admin")
                {
                    
                }
                else if($_POST["type"] == "coach")
                {
                    
                }
                else
                {
                    
                }
            }
            else if($io == "output")
            {
                if($_POST["type"] == "student")
                {
                    $username = $_POST["username"];
                    $firstName = $_POST["fname"];
                    $lastName = $_POST["lname"];
                    $email = $_POST["email"];
                    $usernameConfirm = $_POST["usernameConfirm"];
                    $password = $_POST["password"];
                    $passwordConfirm = $_POST["passwordConfirm"];
                    
                    if($username == $usernameConfirm)
                    {
                        if($password == $passwordConfirm)
                        {
                            if(!file_exists(sha1($usernameConfirm.".txt")))
                            {
                                
                            }
                            else
                            {
                                errMsg("Registration Error", "That ID is already associated with an account.");
                            }
                        }
                        else
                        {
                            errMsg("Input Error", "Make sure the passwords match!");
                        }
                    }
                    else
                    {
                        errMsg("Input Error", "Make sure the usernames match!");
                    }
                }
                else if($_POST["type"] == "teacher")
                {
                    
                }
                else if($_POST["type"] == "admin")
                {
                    
                }
                else if($_POST["type"] == "coach")
                {
                    
                }
                else
                {
                    
                }
            }
            else
            {
                errMsg("UnknownError", "Sorry, an error occured. Please try again later");
                exit;
            }
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