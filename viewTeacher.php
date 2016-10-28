<?php
	$teacher = $_GET["id"];
	$index = $_GET["index"];
	$f = "teachers/teachers.json";
    $file = fopen($f, "r");
    $rawData = fread($file, filesize($f));
    $data = json_decode($rawData, true, filesize($f));
    fclose($file);
	
	$teacherFirstName = $data[$index][1];
	$teacherLastName = $data[$index][2];
	$teacherEmail = $data[$index][3];
	
	if($teacherEmail == "")
	{
		$teacherEmail = "No email registered with this user";
	}
	
	if($_COOKIE["User"]=="Admin")
	{
		echo "
		<html>
			<head>
				<link rel='stylesheet' type='text/css' href='css/style.css'>
				<script>
					function show(\"id\")
					{
						document.getElementById(id).style.display = \"block\";
					}
					function hide(\"id\")
					{
						document.getElementById(id).style.display = \"none\";
					}
				</script>
			</head>
			<body style='background-color: #9f9f9f;'>
				<div style='width: 100%; height: 21px; background-color: #bf1d32;'>
					<button style='float: left; border: none; height: 100%; color: white; background-color: black;' onclick='window.history.back();'>back</button>
					<button style='float: right; border: none; height: 100%; color: white; background-color: black;' onclick='show(\"auth\");'>edit</button>
				</div>
				<br>
				First Name
				<div class='userInfo'>
					".$teacherFirstName."
				</div>
				<br>
				Last Name
				<div class='userInfo'>
					".$teacherLastName."
				</div>
				<br>
				Email
				<div class='userInfo'>
					".$teacherEmail."
				</div>
				<br>
				<form method='post' action='delAccount.php'>
					<input type='hidden' name='user' value='".$teacher."'>
					<input type='hidden' name='index' value='".$index."'>
					<input type='hidden' name='type' value='t'>
					<input style='width: 100%; margin-left: auto; margin-right: auto;' type='submit' value='Delete This Account'>
				</form>
			</body>
		</html>
			";
	}
?>