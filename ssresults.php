<?php
    require ("functions.php");
    $q = $_GET["query"];
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
            <br>";
            studentSearch($q);
        }
    }
    else
    {
        echo "Access denied ";
    }
?>