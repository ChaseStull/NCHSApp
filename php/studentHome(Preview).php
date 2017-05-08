<?php
    $Student = $_COOKIE["Student"];
    $isUserSet = isset($_COOKIE["Student"]);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
    <title>NCHS</title>
    <script>
        function dropDown(ID) {
            var current = document.getElementById(ID).style.display;
            if (current == "none") {
                document.getElementById(ID).style.display = "block";
            }
            else if (current == "block") {
                document.getElementById(ID).style.display = "none";
            }
        }
    </script>
    <!--<style>
        #classesb:hover
        {
            background-color: white;
            color: black;
        }
        div div:hover
        {
            background-color: white;
            color: black;
        }
    </style>-->
  </head>
  <body style='background-color: #ebebeb;'>
  <?php
    if($isUserSet)
    {
        echo "<div style='margin-left: 25%; width: 50%; background-color: white; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);'>
        <div style='float: left;'><b>Welcome <span style='color: #bf1d32;'>$Student</b></div><a href='logOut.php'><div style='float: right; color: #bf1d32;'><b>Sign Out</b></div></a></div>
        <div style='width: 100%;'><a href='http://northcountyhs.org'><img alt='This Image Cannot Be Loaded' src='img/nclogo.jpg' style='margin-left: 25%; width: 50%; height: auto; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);'></a></div>
    <br>
    <br>
    <br>
    <div id='container' style='overflow: hidden; width: 90%; height: 30px; border-top-right-radius: 3px; border-top-left-radius: 3px; background-color: black; color: white; margin-right: auto; margin-left: auto;>
        <button style='border: none; color: white; width: 9%;' onclick='dropDown(\"classes\")'><div id='classesb' style='float: left; width: 100%; height: 30px; background-color: black; color: white; border-radius: 3px;'><b>Classes</b></div></button>
        <button style='border: none; color: white; width: 9%;' onclick='dropDown(\"teachers\")'><div style='float: left; width: 100%; height: 30px; background-color: black; color: white; border-radius: 3px;'><b>Teachers</b></div></button>
    </div>
    <div id='classes' style='width: 90%; height: auto; background-color: #bf1d32; display: none; margin-right: auto; margin-left: auto; text-align: center; border-bottom-left-radius: 3px; border-bottom-right-radius: 3px;'>
        <b>Oakes: 1A AP Language & Composistion</b><br>
        <hr width='90%'>
        <b>Robertson: 2A AP Calculus</b><br>
        <hr width='90%'>
        <b>Bange: 3A Band</b><br>
        <hr width='90%'>
        <b>Serota: 4A Parallel Computing</b><br>
        <hr width='90%'>
        <b>Wiersbicki: 1B AP U.S. History</b><br>
        <hr width='90%'>
        <b>Payne: 2B STEM Chemistry</b><br>
        <hr width='90%'>
        <b>Bakhru: 3B STEM Policy</b><br>
        <hr width='90%'>
        <b>Morse: 4B STEM Community Challenge</b><br>
    </div>
    <br>
    <!--<div style='width: 95%; height: 30px; background-color: black; color: white; border-radius: 3px; margin-left: auto; margin-right: auto;'><button style='background-color: transparent; border: none; color:  white; width: 100%;' onclick='dropDown(\"teachers\")'><b>Teachers</b></button></div>-->
    <div id='teachers' style='width: 89%; height: auto; background-color: #bf1d32; display: none; margin-right: auto; margin-left: auto; text-align: center; border-bottom-left-radius: 3px; border-bottom-right-radius: 3px;'>
        <b>Ellen Oakes: eoakes@aacps.org</b><br>
        <hr width='90%'>
        <b>Alaysia Robertson: arobertson@aacps.org</b><br>
        <hr width='90%'>
        <b>Theresa Bange: tbange@aacps.org</b><br>
        <hr width='90%'>
        <b>Justin Serota: jserota@aacps.org</b><br>
        <hr width='90%'>
        <b>Michael Wiersbicki: mwiersbicki@aacps.org</b><br>
        <hr width='90%'>
        <b>Cory Payne: cpayne@aacps.org</b><br>
        <hr width='90%'>
        <b>Ravi Bakhru: rbakhru@aacps.org</b><br>
        <hr width='90%'>
        <b>Gale Morse: gmorse@aacps.org</b><br>
    </div>
      <br>
    <div style='width: 95%; height: 30px; background-color: black; color: white; border-radius: 3px; margin-left: auto; margin-right: auto;'><button style='background-color: transparent; border: none; color:  white; width: 100%;' onclick='dropDown(\"orgsAndclubs\")'><b>Organizations & Clubs</b></button>
	</div>
    <div id='orgsAndclubs' style='width: 89%; height: auto; background-color: #bf1d32; display: none; margin-right: auto; margin-left: auto; text-align: center; border-bottom-left-radius: 3px; border-bottom-right-radius: 3px;'>
        <b>National Honors Society</b><br>
        <hr width='90%'>
        <b>Spanish Honors Society</b><br>
        <hr width='90%'>
        <b>Tri-M Music Honors Society</b><br>
        <hr width='90%'>
        <b>Other club</b><br>
        <hr width='90%'>
        <b>other club</b><br>
        <hr width='90%'>
        <b>Other Club</b><br>
        <hr width='90%'>
        <b>OTHER CLUB</b><br>
        <hr width='90%'>
        <b>OtHeR ClUb</b><br>
    </div>
    <br>
    <div style='width: 95%; height: 30px; background-color: black; color: white; border-radius: 3px; margin-left: auto; margin-right: auto;'><button style='background-color: transparent; border: none; color:  white; width: 100%;' onclick='dropDown(\"hallPass\")'><b>Hall Pass</b></button>
	</div>
    <div id='hallPass' style='width: 89%; height: auto; background-color: #bf1d32; display: none; margin-right: auto; margin-left: auto; text-align: center; border-bottom-left-radius: 3px; border-bottom-right-radius: 3px;'>
        Open Scanner Here
    </div>
    <br>
    <div style='width: 95%; height: 30px; background-color: black; color: white; border-radius: 3px; margin-left: auto; margin-right: auto;'><button style='background-color: transparent; border: none; color:  white; width: 100%;' onclick='dropDown(\"homework\")'><b>Homework Assignments</b></button>
	</div>
    <div id='homework' style='width: 89%; height: auto; background-color: #bf1d32; display: none; margin-right: auto; margin-left: auto; text-align: center; border-bottom-left-radius: 3px; border-bottom-right-radius: 3px;'>
        Student Homework Shown Here
    </div>
    <br>
    <div style='width: 95%; height: 30px; background-color: black; color: white; border-radius: 3px; margin-left: auto; margin-right: auto;'><button style='background-color: transparent; border: none; color:  white; width: 100%;' onclick='dropDown(\"knight-time\")'><b>Knight Time</b></button>
	</div>
    <div id='other' style='width: 89%; height: auto; background-color: #bf1d32; display: none; margin-right: auto; margin-left: auto; text-align: center; border-bottom-left-radius: 3px; border-bottom-right-radius: 3px;'>
        Knight Time schedule here
    </div>
    <br>
    <div style='width: 95%; height: 30px; background-color: black; color: white; border-radius: 3px; margin-left: auto; margin-right: auto;'><button style='background-color: transparent; border: none; color:  white; width: 100%;' onclick='dropDown(\"help\")'><b>Help</b></button>
	</div>
    <div id='other' style='width: 89%; height: auto; background-color: #bf1d32; display: none; margin-right: auto; margin-left: auto; text-align: center; border-bottom-left-radius: 3px; border-bottom-right-radius: 3px;'>
        <span style='color: white'><b>I need help with:</b></span>
        <hr width='90%'>
        <a href='classesHelp.html'>Classes Tab</a>
        <hr width='90%'>
        <a href='classesHelp.html'>Teachers Tab</a>
        <hr width='90%'>
        <a href='classesHelp.html'>Organizations & Clubs Tab</a>
        <hr width='90%'>
        <a href='classesHelp.html'>Hall Pass Tab</a>
        <hr width='90%'>
        <a href='classesHelp.html'>Homework Tab</a>
        <hr width='90%'>
        <a href='classesHelp.html'> Tab</a>
    </div>
    <br>";
    }
    else
    {
        echo "<div style='width: 100%;'><a href='http://northcountyhs.org'><img alt='This Image Cannot Be Loaded' src='img/nclogo.jpg' style='margin-left: 25%; width: 50%; height: auto; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);'></a></div><div style='width: 100%; height: 100%; background color: grey;'><form action='login.php' method='post'><input type='hidden' name='Type' value='S'><div style='text-align: center; margin-top: 10%; margin-left: auto; margin-right: auto; border-radius: 5px; width: 30%; height: auto; background-color: white; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);'><br><br><input type='text' name='Username' placeholder='Student ID' style='width: 80%; height: 30px; background-color: black; color: white; border: none; border-radius: 3px; text-align: center; margin-left: auto; margin-right: auto;'><br><br><input type='password' name='Password' placeholder='Password' style='width: 80%; height: 30px; background-color: black; color: white; border: none; border-radius: 3px; text-align: center; margin-left: auto; margin-right: auto;'><br><a href='forgotPassword.php'>Forgot Your Password?</a><br><br><input type='submit' value='Log In' style='border: none; width: 70%; height: 40px; background-color: #bf1d32; color: white; border-radius: 5px; text-align: center; margin-left: auto; margin-right: auto;'><br><br><a href='newUser.php'>Need an account? Tap Here!</a><br><a href='password.php'>Reset Passwowrd Here!</a></div></form></div>";
    }
  ?>
  </body>
</html>
