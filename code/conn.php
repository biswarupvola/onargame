<?php
$dataBaseName = "onargame";
$conn = mysqli_connect("localhost","root","root",$dataBaseName);
 
// Check connection
if (mysqli_connect_errno())
  {
  #echo "Failed to connect to MySQL: " . mysqli_connect_error();
  die("Connection failed: " . $conn->connect_error);
  }