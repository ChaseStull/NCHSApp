<html>
	<head>
		<title>Redirecting</title>
		<form id='form' method='post' action='<?php 
			switch(strlen($_GET["type"]))
			{
				case 20: echo substr($_GET["type"], 0, 19);
				break;
				case 21: echo substr($_GET["type"], 0, 20);
				break;
				case 25: echo $_GET["type"];
				break;
			}
			?>'>
			<input type='hidden' name='io' value='input'>
			<?php
				echo substr($_GET["type"], 19);
				switch(strlen($_GET["type"]))
				{
					case 20: switch(substr($_GET["type"], 19))
					{
						case 1: echo "<input type='hidden' name='type' value='student'>";
						break;
						case 2: echo "<input type='hidden' name='type' value='teacher'>";
						break;
						case 3: echo "<input type='hidden' name='type' value='admin'>";
						break;
						case 4: echo "<input type='hidden' name='type' value='coach'>";
						break;
					}
					break;
					case 21: switch(substr($_GET["type"], 20))
					{
						case 1: echo "<input type='hidden' name='type' value='class'>";
						break;
						case 2: echo "<input type='hidden' name='type' value='club'>";
						break;
						case 3: echo "<input type='hidden' name='type' value='team'>";
						break;
					}
					case 25: exit;
					break;
				}
			?>
		</form>
		<script>
			window.onload = document.getElementById("form").submit();
		</script>
	</head>
	<body>
		
	</body>
</html>