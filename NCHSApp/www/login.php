<?php
  $Type = $_POST["Type"];
  $Password = $_POST["Password"];
  $file = file_get_contents(sha1($_POST["Username"]).".txt");
  $check = sha1($Password);

  if ($check == $file)
  {
    if ($Type=="S")
    {
  	    echo "<a href='studentHome.php' style='text-decoration: none;'><div style='margin-left: auto; margin-right: auto; margin-top: 50%; background-color: #bf1d32; border-radius: 75px; height: 150px; width: 80%; text-align: center; font-size: 40px; color: black;'><br>Success! Tap here to go to your home page</div></a>";
    }
    else if ($Type=="T")
    {
        echo "<a href='teacherHome.php' style='text-decoration: none;'><div style='margin-left: auto; margin-right: auto; margin-top: 50%; background-color: #bf1d32; border-radius: 75px; height: 150px; width: 80%; text-align: center; font-size: 40px; color: black;'>Success! Tap Here to Go To Your Home Page</div></a>";
    }
  }
  else if ($check != $file)
  {
    if ($Type=="S")
    {
        echo "<a href='studentLogin.php' style='text-decoration: none;'><div style='margin-left: auto; margin-right: auto; margin-top: 50%; background-color: #bf1d32; border-radius: 75px; height: 150px; width: 80%; text-align: center; font-size: 40px; color: black;'><br>Login Failed! Check your Username & Password</div></a>";
    }
    else if ($Type=="T")
    {
        echo "<a href='teacherLogin.php' style='text-decoration: none;'><div style='margin-left: auto; margin-right: auto; margin-top: 50%; background-color: #bf1d32; border-radius: 75px; height: 150px; width: 80%; text-align: center; font-size: 15px; color: black;'>Login Failed! Check your Username & Password</div></a>";
    }
  }
?>