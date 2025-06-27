<?php
  $hostname = "localhost";
  $username = "root";
  $password = "password2$";
  $dbname = "sparkchat";

  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  if(!$conn){
    echo "Database connection error".mysqli_connect_error();
  }
?>
