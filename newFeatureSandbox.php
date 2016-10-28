<form method='post' action='newThread.php'>
	<input type='text' name='sender'>
	<input type='text' name='reciever'>
	<input type='text' name='type'>
	<button>submit</button>
</form>

<div id='messenger'>
	<div id='threadContainer' style='float: left; overflow: scroll; background-color: white; width: 15%; height: 100%; position: fixed;'>
		
	</div>
	<div id='messages' style='width: 85%; height: 40em; position: fixed;'>
		<iframe src='viewThread.php' frameborder='none' width='40em' height='40em'>
	</div>
</div>