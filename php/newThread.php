<?php
	require("functions.php");
	newThread($_POST["type"], $_POST["sender"], $_POST["reciever"]);
?>
<script>
	window.onload = window.location.assign("messenger.php");
</script>