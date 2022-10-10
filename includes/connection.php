<?php
include('config.php');

session_start();

// Create connection
$conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
// ?>