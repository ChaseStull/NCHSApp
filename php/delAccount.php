<?php
	require("functions.php");
	$index = $_POST["index"];
	setcookie("Student", "");
	setcookie("Teacher", "");
	$user = $_POST["user"];
	if($_POST["type"] == "s")
	{
		delStudent($user);
	}
	if($_POST["type"] == "s")
	{
		delTeacher($user, $index);
	}
	echo "working";
?>