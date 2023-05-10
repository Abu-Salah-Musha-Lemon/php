<?php

    $host= "localhost";
    $user = "root";
    $pass = "";
    $dbName = "CMS";
    $conn = mysqli_connect($host,$user, $pass,$dbName);
    if (!$conn) {
        echo $conn;
    }
