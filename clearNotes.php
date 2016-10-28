<?php
    $user = $_COOKIE["Teacher"];
    $F = "teachers/".sha1($user)."/notifications.json";
    $file = fopen($F, "w");
    fwrite($file, "{}");
    fclose($file);
    echo"<html>
        <head>
            <script>
                window.onload = window.location('http://nchsapp.azurewebsites.net/teacherHome.php');
            </script>
        </head>
        <body>
        </body>
    </html>";
?>