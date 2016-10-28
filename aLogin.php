<?php
  $Type = $_POST["Type"];
  $Password = $_POST["Password"];
  $File = fopen(sha1("Administratoer").".txt", "r");
  $content = fread($File, filesize(sha1("Administratoer").".txt"));
  fclose($File);
  if(isset($_COOKIE["user"]))
  {
      if($_COOKIE["user"]=="Admin")
      {
        exit();
      }
  }
  if($Type == "A")
  {
      if($Password == $content)
      {
          setcookie("User", "Admin", time()+600, "/");
      }
      else
      {
          echo"<html>
        <head>
            <script>
                window.onload = window.location.assign('http://nchsapp.azurewebsites.net/adminLogin.php');
            </script>
        </head>
        <body>
        </body>
    </html>";
      }
  }
?>
<html>
  <head>
<script>
window.onload = window.location.assign("aHome.php");
</script>
</head>
<body>
  </body>
  </html>