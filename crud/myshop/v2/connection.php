<?php
// Connect to our MySQL server
  $host = "localhost";
  $user_id = "root";
  $password = "";
  $database = "myshop";
  $conn = mysqli_connect(
    $host, $user_id, $password, $database
  );
  if (!$conn) {
    echo "Error: " . $sql . "<br>" . $conn;
  }