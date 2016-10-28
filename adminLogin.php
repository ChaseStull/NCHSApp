<?php
    if(!isset($_COOKIE["user"]))
  {
      echo "<html>
	<head>
		<meta charset='utf-8'>
		<meta name='viewport' content='initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width'>
        <link rel='stylesheet' type='text/css' href='css/style.css'>
		<title>NCHS</title>
	</head>
	<body style='background-color: #ebebeb;'>
        <div style='width: 100%;'><a href='http://northcountyhs.org'><img alt='This Image Cannot Be Loaded' src='img/nclogo.jpg' class='logo'></a></div>
        <form action='alogin.php' method='post'>
            <input type='hidden' name='Type' value='A'>
		    <div class='container'>
                <div class='LoginContainer'>
                    <br>
                    <span style='color: #bf1d32'><b>Administrative Login</b></span>
                    <br>
      		        <br>
			        <input type='password' name='Password' placeholder='Password' class='UI'>
                    <br>
      		        <br>
      		        <input type='submit' value='Log In' class='UILogin'>
                    <br>
                    <br>
                </div>
		    </div>
        </form>
	</body>
</html>";
  }
  else
  {
      echo "<script>
      function goto(link)
      {
        window.location.assign(link);
      }
      goto(\"aHome.php\");
      </script>";
  }
?>