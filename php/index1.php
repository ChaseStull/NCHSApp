<?php
    if(isset($_COOKIE["Student"]))
    {
        echo "<script>window.onload = window.location.assign(\"studentHome.php\");</script>";
    }
    else if(isset($_COOKIE["Teacher"]))
    {
        echo "<script>window.onload = window.location.assign(\"teacherHome.php\");</script>";
    }
    else if(isset($_COOKIE["User"]))
    {
        echo "<script>window.onload = window.location.assign(\"adminHome.php\");</script>";
    }
?>
<!DOCTYPE html>
<html>
	<head>
		<script src='js/functions.js/'></script>
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
		<title>NCHS</title>
        <link rel="apple-touch-icon" href="50a14f9295ba81.82144378_North County High.bmp">
        <link rel="apple-touch-icon" sizes="76x76" href="50a14f9295ba81.82144378_North County High.bmp">
        <link rel="apple-touch-icon" sizes="120x120" href="50a14f9295ba81.82144378_North County High.bmp">
        <link rel="apple-touch-icon" sizes="152x152" href="50a14f9295ba81.82144378_North County High.bmp">
        <link rel="apple-touch-startup-image" href="50a14f9295ba81.82144378_North County High.bmp">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="#bf1d32-translucent">
	</head>
	<body style='background-color: #ebebeb'>
    <div style="width: 100%;"><a href='northcountyhs.org'><img alt="This Image Can't Be Loaded" src="img/nclogo.jpg" style="margin-left: 25%; width: 50%; height: auto; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"></a></div>
    <div style='padding-bottom: 20px; margin-top: 5%; overflow: hidden; background-color: transparent; height: auto; width: 100%; margin-left: auto; margin-right: auto;'>
	<div style="float: left; text-align: center; margin-left: 15%; margin-right: auto; border-radius: 3px; width: 30%; height: auto; background-color: white; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <?php
                $cookie_name = "Student";
                if((isset($_COOKIE[$cookie_name])==TRUE)&&($_COOKIE[$cookie_name]!=NULL))
                {
                    echo "<a href='studentHome.php' style='text-decoration: none; color: black;'><img id='pic' src='img/classroomm.jpg' style='border-top-left-radius: 3px; border-top-right-radius: 3px; width: 100%; height: auto;'><p style='margin-top: auto; margin-bottom: auto;'><br><b>I'm A Student</b></p><br></a>";
                }
                else
                {
                    echo "<a href='studentLogin.php' style='text-decoration: none; color: black;'><img id='pic' src='img/classroomm.jpg' style='border-top-left-radius: 3px; border-top-right-radius: 3px; width: 100%; height: auto;'><p style='margin-top: auto; margin-bottom: auto;'><br><b>I'm A Student</b></p><br></a>";
                }
            ?>
	</div>
    <div style="float: right; text-align: center; margin-left: auto; margin-right: 15%; border-radius: 3px; width: 30%; height: auto; background-color: white; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
             <?php
                $cookie_name = "Teacher";
                if((isset($_COOKIE[$cookie_name])==TRUE)&&($_COOKIE[$cookie_name]!=NULL))
                {
                    echo "<a href='teacherHome.php' style='text-decoration: none; color: black;'><img id='t' src='img/teacher-feature-science-2-640.jpg' style='border-top-left-radius: 3px; border-top-right-radius: 3px; width: 100%; height: auto;'><p style='margin-top: auto; margin-bottom: auto;'><br><b>I'm A Teacher</b></p><br></a>";
                }
                else
                {
                    echo "<a href='teacherLogin.php' style='text-decoration: none; color: black;'><img id='t' src='img/teacher-feature-science-2-640.jpg' style='border-top-left-radius: 3px; border-top-right-radius: 3px; width: 100%; height: auto;'><p style='margin-top: auto; margin-bottom: auto;'><br><b>I'm A Teacher</b></p><br></a>";
                }
            ?>
    </div>
    <div style="float: right; text-align: center; margin-left: auto; margin-right: 15%; border-radius: 3px; width: 30%; height: auto; background-color: white; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
             <?php
                $cookie_name = "Coach";
                if((isset($_COOKIE[$cookie_name])==TRUE)&&($_COOKIE[$cookie_name]!=NULL))
                {
                    echo "<a href='coachHome.php' style='text-decoration: none; color: black;'><img id='t' src='img/teacher-feature-science-2-640.jpg' style='border-top-left-radius: 3px; border-top-right-radius: 3px; width: 100%; height: auto;'><p style='margin-top: auto; margin-bottom: auto;'><br><b>I'm A Coach</b></p><br></a>";
                }
                else
                {
                    echo "<a href='coachLogin.php' style='text-decoration: none; color: black;'><img id='t' src='img/teacher-feature-science-2-640.jpg' style='border-top-left-radius: 3px; border-top-right-radius: 3px; width: 100%; height: auto;'><p style='margin-top: auto; margin-bottom: auto;'><br><b>I'm A Coach</b></p><br></a>";
                }
            ?>
    </div>
    <div style="float:left; text-align: center; margin-left: 15%; margin-right: auto; border-radius: 3px; width: 30%; height: auto; background-color: white; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
             <?php
                $cookie_name = "User";
                if((isset($_COOKIE[$cookie_name])==TRUE)&&($_COOKIE[$cookie_name]!=NULL))
                {
                    echo "<a href='aHome.php' style='text-decoration: none; color: black;'><img id='t' src='img/photo.jpg' style='border-top-left-radius: 3px; border-top-right-radius: 3px; width: 100%; height: auto;'><p style='margin-top: auto; margin-bottom: auto;'><br><b>I'm An Admin</b></p><br></a>";
                }
                else
                {
                    echo "<a href='adminLogin.php' style='text-decoration: none; color: black;'><img id='t' src='img/photo.jpg' style='border-top-left-radius: 3px; border-top-right-radius: 3px; width: 100%; height: auto;'><p style='margin-top: auto; margin-bottom: auto;'><br><b>I'm An Admin</b></p><br></a>";
                }
            ?>
    </div>
    <?php echo "<button class='emOnHover' style='width: 95%; height: 60px; background-color: #ebebeb; text-align: left; border='none' padding: 2px;' onclick='window.location.assign(\"groups/".$groupName.".php\");'><b>".$date."</b><br><strong>".$sender."</strong> posted in <strong>".$groupName."</strong></button>"; ?>
    
    </div>
	</body>
</html>