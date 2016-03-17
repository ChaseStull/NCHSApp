<?php
    $SID = $_POST["IDConfirm"];
    $Password = $_POST["PasswordConfirm"];
    $Email = $_POST["email"];
    $uSID = $_POST["Username"];
    $uPassword = $_POST["Password"];
    if (strlen($SID)==6)
    {
        if (!file_exists(sha1($SID).".txt"))
        {
            $fileToOpen = sha1($SID).".txt";
            if (($SID==$uSID)&&($Password==$uPassword))
            {
                $File = fopen($fileToOpen,"w");
                $EPass = sha1($Password);
                fwrite($File,$EPass);
                fclose($File);
        
                echo "<a href='studentLogin.php' style='text-decoration: none;'><div style='margin-left: auto; margin-right: auto; margin-top: 50%; background-color: #ed3132; border-radius: 75px; height: 150px; width: 80%; text-align: center; font-size: 40px; color: black;'><br>Success! Tap here to go to the login page</div></a>";
            }
            else
            {
                echo "<a href='newUser.php' style='text-decoration: none;'><div style='margin-left: auto; margin-right: auto; margin-top: 50%; background-color: #ed3132; border-radius: 75px; height: 150px; width: 80%; text-align: center; font-size: 40px; color: black;'>Registration Failed! Check that your Student ID is correct, and that your passwords match</div></a>";
            }
        }
        else
        {
            echo "<a href='newUser.php' style='text-decoration: none;'><div style='margin-left: auto; margin-right: auto; margin-top: 50%; background-color: #ed3132; border-radius: 75px; height: 150px; width: 80%; text-align: center; font-size: 40px; color: black;'>Sorry, that account already exists! Please choose a different Student ID</div></a>";
        }
    }
    else
    {        
        echo "<a href='newUser.php' style='text-decoration: none;'><div style='margin-left: auto; margin-right: auto; margin-top: 50%; background-color: #ed3132; border-radius: 75px; height: 150px; width: 80%; text-align: center; font-size: 40px; color: black;'>Sorry, that's not a valid Student ID! Please enter a valid 6-Digit Student ID</div></a>";
    }
?>
