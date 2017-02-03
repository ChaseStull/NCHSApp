<?php
	if(isset($_COOKIE["userid"]))
	{
		echo "<script>onload = location.assign(\"/application\");</script>";
	}
?>

