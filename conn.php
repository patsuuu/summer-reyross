<?php

$host = "localhost"; // Change this to your MySQL server host
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$database = "z_dbnew"; // Change this to your MySQL database name

$con = mysqli_connect($host, $username, $password, $database);

if (!$con) {
  die("Connection error: " . mysqli_connect_error());
}

?>
