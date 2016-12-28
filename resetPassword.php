<?php
    $SID = $_POST["Username"];
    $OldPass = $_POST["oldPassword"];
    $NewPass = $_POST["newPassword"];
    $NewPassConfirm = $_POST["newPasswordConfirm"];
    $fileToOpen = sha1($SID).".txt";
    $oldPassRecord = file_get_contents($fileToOpen);

    if (file_exists($fileToOpen))
    {
        if ((sha1($OldPass)==$oldPassRecord)&&($NewPass==$NewPassConfirm))
        {
            $file = fopen($fileToOpen, "w");
            $New = sha1($NewPassConfirm);
            fwrite($file,$New);
            fclose($file);

            echo "<div style='width: 100%;'><a href='http://northcountyhs.org'><img alt='This Image Cannot Be Loaded' src='img/nclogo.jpg' style='margin-left: 25%; width: 50%; height: auto; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);'></a></div><a href='studentLogin.php' style='text-decoration: none;'><div style='margin-left: auto; margin-right: auto; margin-top: 15%; background-color: #ed3132; border-radius: 3px; height: 50px; width: 30%; text-align: center; color: black;'><br>Reset Successful! Tap here to go to the login page</div></a>";
        }
        else
        {
            echo "<div style='width: 100%;'><a href='http://northcountyhs.org'><img alt='This Image Cannot Be Loaded' src='img/nclogo.jpg' style='margin-left: 25%; width: 50%; height: auto; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);'></a></div><a href='newUser.php' style='text-decoration: none;'><div style='margin-left: auto; margin-right: auto; margin-top: 15%; background-color: #ed3132; border-radius: 3px; height: 50px; width: 30%; text-align: center; color: black;'>Registration Failed! Check that your Student ID is correct, and that your passwords match</div></a>";
        }
    }
    else
    {
        echo "<div style='width: 100%;'><a href='http://northcountyhs.org'><img alt='This Image Cannot Be Loaded' src='img/nclogo.jpg' style='margin-left: 25%; width: 50%; height: auto; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);'></a></div><a href='newUser.php' style='text-decoration: none;'><div style='margin-left: auto; margin-right: auto; margin-top: 15%; background-color: #ed3132; border-radius: 3px; height: 50px; width: 30%; text-align: center; color: black;'>Sorry, that account doesn't exist! Tap here to make a new one</div></a>";
    }
?>