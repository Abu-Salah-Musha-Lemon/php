<?
include_once "config.php";

if (isset($_GET['deleteId'])) {
    $id = $_GET['deleteId'];
    $delete = "DELETE FROM `usertable` WHERE `userId`=$id";
    $result = mysqli_query($conn,$delete);
    if ($result) {
        // echo"data delete successfully";
        header("location:http://localhost/learnPhp/CMS/admin/user.php");
    }else{
        die(mysqli_error($conn));
    }
}


?>