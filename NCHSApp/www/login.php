<?php
  $Password = $_POST["Password"];
  $file = file_get_contents(sha1($_POST["Username"]).".txt");
  $check = sha1($Password);

  if ($check == $file)
  {
    //if ($Type=="S")
    //{
  	    echo "<a href='studentHome.php' style='text-decoration: none;'><div style='margin-left: auto; margin-right: auto; margin-top: 50%; background-color: #ed3132; border-radius: 15px; height: 30px; width: 80%; text-align: center; font-size: 15px; color: black;'>Success! Click Here to Go To Your Home Page</div></a>";
    //}
    //elseif ($Type=="T")
    //{
        //echo "<a href='teacherHome.php' style='text-decoration: none;'><div style='margin-left: auto; margin-right: auto; margin-top: 50%; background-color: #ed3132; border-radius: 15px; height: 30px; width: 80%; text-align: center; font-size: 15px; color: black;'>Success! Click Here to Go To Your Home Page</div></a>";
    //}
  }
  elseif ($check != $file)
  {
    //if ($Type=="S")
    //{
        echo "<a href='studentLogin.php' style='text-decoration: none;'><div style='margin-left: auto; margin-right: auto; margin-top: 50%; background-color: #ed3132; border-radius: 15px; height: 30px; width: 80%; text-align: center; font-size: 15px; color: black;'>Login Failed! Click Here To Go Back To Login Page</div></a>";
    //}
    //elseif ($Type=="T")
    //{
        //echo "<a href='teacherLogin.php' style='text-decoration: none;'><div style='margin-left: auto; margin-right: auto; margin-top: 50%; background-color: #ed3132; border-radius: 15px; height: 30px; width: 80%; text-align: center; font-size: 15px; color: black;'>Login Failed! Click Here To Go Back To Login Page</div></a>";
    //}
  }
?>