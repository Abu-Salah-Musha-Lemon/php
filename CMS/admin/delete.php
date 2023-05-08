<?
include_once "config.php";


$id = $_GET['deleteId'];
$delete = "DELETE FROM `usertable` WHERE `userId`={$id}";
$result = mysqli_query($conn, $delete);
if ($result) {
    echo "data delete successfully";
    // header("location:{$hostName}/admin/user.php");
} else {
    die(mysqli_error($conn));
    echo "can't delete user ";
}
mysqli_close($conn);
