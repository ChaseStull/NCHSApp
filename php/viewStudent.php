<?php
	$student = $_GET["id"];
	$f = fopen("students/".$student.".json", "r");
	$rawStudentInfo = fread($f, filesize("students/".$student.".json"));
	$studentInfo = json_decode($rawStudentInfo, TRUE, filesize("students/".$student.".json"));
	fclose($f);
	$studentFirstName = $studentInfo["Fname"];
	$studentLastName = $studentInfo["Lname"];
	$studentEmail = $studentInfo["Email"];
	if($studentEmail == "")
	{
		$studentEmail = "No email registered with this user";
	}
	
	if($_COOKIE["User"]=="Admin")
	{
		echo "
		<html>
			<head>
				<link rel='stylesheet' type='text/css' href='css/style.css'>
				<script>
					function show(id)
					{
						document.getElementById(id).style.display = \"block\";
					}
					function hide(id)
					{
						document.getElementById(id).style.display = \"none\";
					}
				</script>
			</head>
			<body style='background-color: #9f9f9f;'>
			<div style='width: 100%; height: auto; background-color: transparent;' id='a'>
				<div style='width: 100%; height: 21px; background-color: #bf1d32;'>
					<button style='float: left; border: none; height: 100%; color: white; background-color: black;' onclick='window.history.back();'>back</button>
					<button style='float: right; border: none; height: 100%; color: white; background-color: black;' onclick='show(\"auth\"); hide(\"a\");'>edit</button>
				</div>
				<br>
				First Name
				<div class='userInfo'>
					".$studentFirstName."
				</div>
				<br>
				Last Name
				<div class='userInfo'>
					".$studentLastName."
				</div>
				<br>
				Email
				<div class='userInfo'>
					".$studentEmail."
				</div>
				<br>
				<form method='post' action='delAccount.php'>
					<input type='hidden' name='user' value='".$student."'>
					<input type='hidden' name='type' value='s'>
					<input style='width: 100%; margin-left: auto; margin-right: auto;' type='submit' value='Delete This Account'>
				</form>
			</div>
			<div id='auth' style='margin-top: -75px; display: none; position: fixed; width: 100%; height: auto; background-color: rgba(0, 0, 0, 0.7)'>
				<form action='changeUserInfo.php' method='post'>
            		<input type='hidden' name='type' value='s'>
					<input type='hidden' name='user' value='".$student."'>
					<input type='hidden' name='userFirstName' value='".$studentFirstName."'>
					<input type='hidden' name='userLastName' value='".$studentLastName."'>
					<input type='hidden' name='userEmail' value='".$studentEmail."'>
		   			<div class='container'>
               			<div class='LoginContainer'>
                   			<br>
                   			<span style='color: #bf1d32'><b>Administrative Login</b></span>
                   			<br>
   		        			<br>
		        			<input type='password' name='password' placeholder='Password' class='UI'>
                   			<br>
   		        			<br>
							<button type='button' onclick='show(\"a\"); hide(\"auth\");' class='cancel' style='width: 40%; float: left; margin-left: 5%;'>Cancel</button>
   		        			<button class='UILogin' style='width: 40%; float: right; margin-right: 5%; color: white; background-color: #bf1d32;'>Edit</button>
                   			<br>
                   			<br>
               			</div>
	    			</div>
       			</form>
			</div>
			</body>
		</html>
			";
	}
?>