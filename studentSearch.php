<?php
    if(isset($_COOKIE["User"]))
    {
        if($_COOKIE["User"] == "Admin")
        {
            echo "
            <html>
                <head>
                    <meta name='viewport' content='initial-scale=1, maximum-scale=1, user-scalable=no'>
                    <link rel='stylesheet' type='text/css' href='css/style.css'>
                    <meta charset='utf-8'>
                    <title>Admin Tools</title>
                </head>
                <body style='background-color: #cbcbcb; margin-top: 0px;'>
                <style>
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
                    <li><a href='studentSearch.php' style='background-color: #bf1d32;'>Student Search</a></li>
                    <li><a href='teacherSearch.php'>Teacher Search</a></li>
                    <li><a href='coachSearch.php'>Coach Search</a></li>
                    <li><a href='adminSearch.php'>Admin Search</a></li>
                </ul>
            </div>
            <br>
                    <form action='ssresults.php' method='get' style='background-color: #bf1d32;'>
                        <input name='query' type='text' class='UI' style='margin-left: auto; margin-right: auto; width: 75%;'>
                        <input type='submit' value='Search' style='width: 23%; border: none; background-color: #bf1d32; color: white;'>
                    </form>
						<form action='ssresults.php' method='get' style='background-color: #bf1d32;'>
							<input type='hidden' name='query' value='1234567890'>
							<input type='submit' value='Show All' style='text-align: center; width: 100%; background-color: #bf1d32; color: white; border: none;'>
						</form>
                </body>
            </html>
            ";
        }
    }
    else
    {
        echo "Access denied ";
    }
?>
