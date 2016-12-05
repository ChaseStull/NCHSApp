<?php
	if(isset($_COOKIE["user"]))
	{
		
	}
	else
	{
		echo "<script>onload = location.assign(\"/login\");</script>";
	}
?>