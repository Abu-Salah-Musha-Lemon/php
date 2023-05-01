<?php
include_once "connection.php";

if (isset($_GET['deleteid'])) {
    $id =$_GET["deleteid"];
        $sql = "DELETE FROM clients WHERE id = $id";
        $result = mysqli_query($conn,$sql);
        if ($result) {
            // echo"data delete successfully";
            header("location:index_v2.php");
        }else{
            die(mysqli_error($conn));
        }
    }

?>
