<?php
    $SID = $_POST["Username"];
    $OldPass = $_POST["oldPassword"];
    $NewPass = $_POST["newPassword"];
    $NewPassConfirm = $_POST["newPasswordConfirm"];
    $fileToOpen = sha1($SID).".txt";

    $oldPassRecord = file_get_contents(sha1($SID).".txt"));



    if ()
    {
        echo "<a href='studentLogin.php' style='text-decoration: none;'><div style='margin-left: auto; margin-right: auto; margin-top: 50%; background-color: #ed3132; border-radius: 75px; height: 150px; width: 80%; text-align: center; font-size: 40px; color: black;'><br>Success! Tap here to go to the login page</div></a>";
    }
    else
    {
        echo "<a href='newUser.php' style='text-decoration: none;'><div style='margin-left: auto; margin-right: auto; margin-top: 50%; background-color: #ed3132; border-radius: 75px; height: 150px; width: 80%; text-align: center; font-size: 40px; color: black;'>Registration Failed! Check that your Student ID is correct, and that your passwords match</div></a>";
    }
?>
