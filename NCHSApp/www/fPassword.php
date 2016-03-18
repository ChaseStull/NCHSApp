<?php
    $SID = $_POST["Username"];
    $email = $_POST["email"];
    $fileToOpen = sha1($SID).sha1($email).".php";
    $usrFile = sha1($SID).".txt";

    unlink($usrFile);

    $file = fopen($fileToOpen,"w");
    fwrite($file,"<img src='img/nclogo.jpg' width='100%' height='auto'><form action='pr.php' method='post'><div style='margin-top: 40%; margin-bottom: 50%; margin-left: auto; margin-right: auto; border-radius: 15px; width: 80%; height: auto; background-color: white; text-align: center;'><br><br><input type='hidden' name='uFile' value='.$usrFile.'><input type='hidden' name='resetFile' value='.$fileToOpen.'><input type='password' name='NewPassword' placeholder='New Password' style='width: 80%; height: 30px; background-color: black; color: white; border-radius: 15px; text-align: center; margin-left: auto; margin-right: auto;'><br><input type='password' name='NewPasswordConfirm' placeholder='Confirm Password' style='width: 80%; height: 30px; background-color: black; color: white; border-radius: 15px; text-align: center; margin-left: auto; margin-right: auto;'><br><br><input type='submit' value='Reset Password' style='border: none; width: 80%; height: 60px; background-color: #bf1d32; color: white; border-radius: 30px; text-align: center; margin-left: auto; margin-right: auto;'><br><br></div></form>");
    fclose($file);
    
    /*
    $to = $email;
    $subject = "Password Reset Request for: ".$SID;
    $link = $fileToOpen;
    $message = "Click this link to reset your password:\nnchs.azurewebsites.net/".$link;
    $header = "From: chaseastull@gmail.com";
    */
    //mail($to, $subject, $message, $header);
?>