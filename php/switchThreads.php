<?php
	$threadLoc = $_GET["threadLoc"];
	$type = $_GET["type"];
	fclose($thread);
	echo "<form method='get' action='messenger.php' id='switchThread'>
			<input type='hidden' name='switch' value='true'>
			<input type='hidden' name='threadLoc' value='".$threadloc."'>
		</form>
		<script>
			window.onload = document.getElementById(\"switchThread\").submit();
		</script>";
?>