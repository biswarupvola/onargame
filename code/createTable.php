<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "onargame";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql1 = "CREATE TABLE runtimebet (
id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
timeofbet VARCHAR(100) NOT NULL, /** bet session ID timeofbet **/
betid VARCHAR(100) NOT NULL,
ticketnumber VARCHAR(100) NOT NULL UNIQUE,
betdata VARCHAR(100) NOT NULL,
totallamount VARCHAR(100) NOT NULL,
counterno VARCHAR(100),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

//counter table
$sql2 = "CREATE TABLE countertable (
  id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  counterid VARCHAR(10000) NOT NULL UNIQUE,
  counterno VARCHAR(10000) NOT NULL UNIQUE,
  addresss VARCHAR(10000) NOT NULL,
  balance VARCHAR(10000) NOT NULL,
  islogin VARCHAR(10),
  isactive VARCHAR(10) NOT NULL,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";

//Win table
$sql3 = "CREATE TABLE wintable (
  id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  betid VARCHAR(100) NOT NULL,
  winticket VARCHAR(100) NOT NULL,
  timeofbet VARCHAR(10) NOT NULL,
  bonusnumber VARCHAR(10) NOT NULL, #1X, 2X, 3X multiply number
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";

//Vendor table
$sql2 = "CREATE TABLE countertable (
  id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  vendorid VARCHAR(100) NOT NULL,
  vendorname VARCHAR(100) NOT NULL,
  addresss VARCHAR(100) NOT NULL,
  balance VARCHAR(100) NOT NULL,
  islogin VARCHAR(10) NOT NULL,
  isactive VARCHAR(10) NOT NULL,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";

if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE) {
  echo "All Tables created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>