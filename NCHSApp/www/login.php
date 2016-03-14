<?php
// define variables and set to empty values
$Username = $Password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $Username = test_input($_POST["Username"]);
  $Password = test_input($_POST["Password"]);
}
?>