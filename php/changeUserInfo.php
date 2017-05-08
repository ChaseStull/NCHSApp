<?php
	
	if(isset($_COOKIE["User"]))
	{
		switch($_POST["type"])
		{
			case "s": 
			$student = $_POST["user"];
			$studentFirstName = $_POST["userFirstName"];
			$studentLastName = $_POST["userLastName"];
			$studentEmail = $_POST["userEmail"];
			$password = $_POST["password"];
			$File = fopen(sha1("Administratoer").".txt", "r");
  			$content = fread($File, filesize(sha1("Administratoer").".txt"));
  			fclose($File);
			if($studentEmail == "No email registered with this user")
			{
				$studentEmail = "None";
			}
			if($password == $content)
			{
				echo "<html>
					<head>
						<link rel='stylesheet' type='text/css' href='css/style.css'>
					</head>
					<body style='background-color: #ebebeb;'>
						<div class='loginContainer'>
							<form method='post' action='changeInfo.php'>
								<input type='hidden' name='student' value='".$student."'>
								<input type='hidden' name='oldFirstName' value='".$studentFirstName."'>
								<input type='hidden' name='oldLastName' value='".$studentLastName."'>
								<input type='hidden' name='oldEmail' value='".$studentEmail."'>
								Current: ".$studentFirstName."
								<br>
								<input type='text' name='newFirstName' class='UI' value='".$studentFirstName."'>
								<br>
								Current: ".$studentLastName."
								<br>
								<input type='text' name='newLastName' class='UI' value='".$studentLastName."'>
								<br>
								Current: ".$studentEmail."
								<input type='text' name='newEmail' class='UI' value='".$studentEmail."'>
								<br>
								<br>
								<div style='width: 100%; background-color: transparent; height: auto; margin-left: auto; margin-right: auto;'>
                   					<button type='button' onclick='history.back();' class='cancel' style='width: 40%; margin-left: 5%;'>Cancel</button>
									<button class='UILogin' style='width: 40%; margin-right: 5%; float: right; background-color: #bf1d32;'>Update Info</button>
                				</div>
							</form>
						</div>
					</body>
				</html>";
			}
			else
			{
				echo "working";
			}
			break;
			case "t":
			break;
		}
	}
	else
	{
		echo "Access Denied";
	}
?>