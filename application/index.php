<?php
	if(isset($_COOKIE["user"]))
	{
		
	}
	else
	{
		echo "<script>onload = location.assign(\"functions/login\");</script>";
	}
?>