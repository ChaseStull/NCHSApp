<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
    <title>NCHS</title>
    <link href="lib/ionic/css/ionic.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="lib/ionic/js/ionic.bundle.js"></script>
    <script src="cordova.js"></script>
    <script>
      function dropDown(ID)
      {
        var current = document.getElementById(ID).style.display;
        if (current=="none")
        {
          document.getElementById(ID).style.display = "block";
        }
        else if(current="block")
        {
          document.getElementById(ID).style.display = "none"
        }
      }
    </script
  </head>
  <body bgcolor="#2d2d2d">
    <div class="header">
		<b>Welcome, Chase</b>
	</div>
    <br>
    <br>
    <br>
    <div class="butto"><br><button onclick='dropDown("classes")'>Classes</button></div>
    <div id="classes" style="width: 95%; height: auto; display: none; text-align: center;">
      <a href="classes.php">
        <div style="align: center; width: 90%; height: 30px; background-color: #666666; color: white;">Calculus</div>
      </a>
    </div>
    <br>
    <div class="butto">i</div>
    <div class="spacer">i</div>
    <div class="butto">i</div>
    <div class="spacer">i</div>
    <div class="butto">i</div>
    <div class="spacer">i</div>
    <div class="butto">i</div>
    <div class="spacer">i</div>
    <div class="butto">i</div>
    <div class="spacer">i</div>
    <div class="butto">i</div>
    <div class="spacer">i</div>
    <div class="butto">i</div>
    <div class="spacer">i</div>
    <div class="butto">i</div>
  </body>
</html>
