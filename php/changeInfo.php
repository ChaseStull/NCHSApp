<?php
	$student = $_POST["student"];
	$newFirstName = $_POST["newFirstName"];
	$newLastName = $_POST["newLastName"];
	$newEmail = $_POST["newEmail"];
	if(isset($_COOKIE["User"]))
	{
		if($_COOKIE["User"]=="Admin")
		{
			$info = array("Fname" => $newFirstName, "Lname" => $newLastName, "Email" => $newEmail);
			$exInfo = json_encode($info);
			$f = "students/".$student.".json";
			$file = fopen($f, "w");
			fwrite($file, $exInfo);
			echo "<script>
					window.location.assign(\"studentSearch.php\");
				</script>";
		}
	}
?>