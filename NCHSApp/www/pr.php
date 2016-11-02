<?php
    $newPass = $_POST["NewPassword"];
    $newPassConfirm = $_POST["NewPassword"];
    $file = fopen($_POST["uFile"],"w");
    $resetFile = $_POST["resetFile"];
    fwrite($file,sha1($newPassConfirm));
    fclose($file);
    unlink($resetFile);
    echo "<a href='studentLogin.php' style='text-decoration: none;'><div style='margin-left: auto; margin-right: auto; margin-top: 50%; background-color: #ed3132; border-radius: 75px; height: 150px; width: 80%; text-align: center; font-size: 40px; color: black;'><br>Reset Successful! Tap here to go to the login page</div></a>";
?>