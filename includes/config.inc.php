<?php
  session_start();
  $servername = "127.0.0.1:3307";
  $dBUsername = "root";
  $dBPassword = "";
  $dBName = "sms";

  $conn=mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

  if (!$conn) {
    die("Connection Failed: ".mysqli_connect_error());
  }
?>
