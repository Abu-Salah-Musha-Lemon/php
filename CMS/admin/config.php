<?php
session_start();
$host = "localhost";
$user_id = "root";
$password = "";
$database = "CMS";
$hostName = "http://localhost/learnPhp/CMS/";
$conn = mysqli_connect($host, $user_id, $password, $database);
// if ($conn) {
//  echo "conneecte succesfully";
// }else{
//   echo $conn;
// }
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
