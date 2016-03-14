<?php
// define variables and set to empty values
$Username = $Password = "";

  $Username = $_POST["Username"];
  $Password = $_POST["Password"];

  $file = fopen(sha1(sha1("Accounts"))/$Username.txt, r);

  if ($Password == fread($file, 512)) {
  	
  }
?>