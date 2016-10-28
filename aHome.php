<?php
    if(isset($_COOKIE["User"]))
    {
        if($_COOKIE["User"] == "Admin")
        {
            echo "
            <html>
                <head>
                    <meta name='viewport' content='initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width'>
                    <link rel='stylesheet' type='text/css' href='css/style.css'>
                    <script src='js/functions.js'></script>
                    <meta charset='utf-8'>
                    <title>Admin Tools</title>
                </head>
                <body>
                    <div style='width: 100%; background-color: white; overflow: hidden; height: 50px;'>
                        <div style='float: left;'>
                            <b>Welcome, Administrator</b>
                        </div>
                        <a href='logOut.php'>
                            <div style='float: right; color: #bf1d32;'>
                                <span><b>Sign Out</b></span>
                            </div>
                        </a>
                        <div style='background-color: transparent; width: 4px; height: 17px; float: right;'></div>
                        <div style='background-color: black; width: 2px; height: 17px; float: right;'></div>
                        <div style='background-color: transparent; width: 4px; height: 17px; float: right;'></div>
                        <a href='aHome.php'>
                            <div style='float: right; color: #bf1d32;'>
                                <span>Home</span>
                            </div>
                        </a>
                    </div>
                    <div style='width: 100%;'>
                        <a href='http://northcountyhs.org'>
                            <img alt='This Image Cannot Be Loaded' src='img/nclogo.jpg' class='logo'>
                        </a>
                    </div>
                    <iframe frameborder='none' style='margin-left: 10%; margin-right: 10%; width: 80%; height: 40em; margin-top: 20px;' src='adminHome.php'>
                </body>
            </html>
            ";
        }
    }
    else
    {
        echo"<!DOCTYPE html>
<html>
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