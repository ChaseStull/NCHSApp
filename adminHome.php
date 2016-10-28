<?php
    if(isset($_COOKIE["User"]))
    {
        if($_COOKIE["User"] == "Admin")
        {
            echo "<style>
                ul
                {
                    list-style-type: none;
                    margin: 0;
                    padding: 0;
                    background-color: #7b7b7b;
                    height: 50px;
                    width: 100%;
                }
                li
                {
                    display: inline;
                    width: 25%;
                }
                li a
                {
                    padding: 10px;
                    text-decoration: none;
                    background-color: transparent;
                    color: white;
                    height: 50px;
                }
                .active
                {
                    background-color: #bf1d32;
                }
                li a:hover
                {
                    background-color: #111;
                }
            </style>
            <div style='width: 100%; height: 3em; background-color: transparent;'>
                <ul>
                    <br>
                    <li><a href='studentSearch.php'>Student Search</a></li>
                    <li><a href='teacherSearch.php'>Teacher Search</a></li>
                    <li><a href='coachSearch.php'>Coach Search</a></li>
                    <li><a href='adminSearch.php'>Admin Search</a></li>
                </ul>
            </div>
            ";
        }
        else
        {
            echo "Access Denied";
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