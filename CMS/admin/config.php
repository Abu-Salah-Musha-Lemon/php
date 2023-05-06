<?php
  $host = "localhost";
  $user_id = "root";
  $password = "";
  $database = "cms";
  $conn = mysqli_connect(
    $host, $user_id, $password, $database
  );
  if (!$conn) {
    echo "Error: " . $sql . "<br>" . $conn;
  }