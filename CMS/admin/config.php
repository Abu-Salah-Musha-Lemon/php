<?php
  $host = "localhost";
  $user_id = "root";
  $password = "";
  $database = "CMS";
  $conn = mysqli_connect($host,$user_id,$password,$database);
  // if ($conn) {
  //  echo "conneecte succesfully";
  // }else{
  //   echo $conn;
  // }
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }