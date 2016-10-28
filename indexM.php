<?php
    if(isset($_COOKIE["Used"]))
    {
        if($_COOKIE["Used"] == "Teacher")
        {
            echo "<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<meta name='viewport' content='initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width'>
        <link rel='stylesheet' type='text/css' href='css/style.css'>
		<title>NCHS</title>
	</head>
	<body style='background-color: #ebebeb;'>
        <div style='width: 100%;'><a href='http://northcountyhs.org'><img alt='This Image Cannot Be Loaded' src='img/nclogo.jpg' class='logo'></a></div>
        <form action='login.php' method='post'>
            <input type='hidden' name='Type' value='T'>
		    <div class='container'>
                <div class='LoginContainer'>
                    <br>
      		        <br>
			        <input type='text' name='Username' placeholder='Username' class='UI'>
			        <br>
                    <br>
			        <input type='password' name='Password' placeholder='Password' class='UI'>
                    <br>
      		        <button class='invisible' onclick='window.location.assign(\"forgotPassword.php\")'>Forgot Your Password?</button>
                    <br>
      		        <br>
      		        <input type='submit' value='Log In' class='UILogin'>
      		        <br>
      		        <br>
                    <button class='invisible' onclick='window.location.assign(\"newTeacher.html\")'>Need an account? Tap Here!</button>
                    <br>
                    <button class='invisible' onclick='window.location.assign(\"password.php\")'>Reset Passwowrd Here!</button>
                    <br>
                    <br>
                </div>
		    </div>
        </form>
	</body>
</html>";
        }
    }
?>
<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width'>
        <link rel="apple-touch-icon" href="50a14f9295ba81.82144378_North County High.bmp">
        <link rel="apple-touch-icon" sizes="76x76" href="50a14f9295ba81.82144378_North County High.bmp">
        <link rel="apple-touch-icon" sizes="120x120" href="50a14f9295ba81.82144378_North County High.bmp">
        <link rel="apple-touch-icon" sizes="152x152" href="50a14f9295ba81.82144378_North County High.bmp">
        <link rel="apple-touch-startup-image" href="50a14f9295ba81.82144378_North County High.bmp">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="mobile-web-app-capable" content="yes">
        <script src='js/appView.js'></script>
        <title>NCHS</title>
    </head>
    <body>
        
    </body>
</html>
