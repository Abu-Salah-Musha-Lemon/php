<?php
// Connect to our MySQL server
  $host = "localhost";
  $user_id = "root";
  $password = "";
  $database = "myshop";
  $conn = new mysqli(
    $host, $user_id, $password, $database
  );

  if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: (" 
      . $conn->connect_errno 
      . ") " 
      . $conn->connect_error
    ;
  }
  echo $conn->host_info . "\n";