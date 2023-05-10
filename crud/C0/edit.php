<?php include_once "header.php";
include_once "conf.php";
$id = $_GET["edit"];
$sql = "SELECT * FROM `usertable` WHERE userId = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$f_name = $row["firstName"];
$l_name = $row["lastName"];
if (isset($_POST['submit'])) {

    $fname = $_POST['fistName'];
    $lname = $_POST['lastName'];
    $sql= "UPDATE `usertable` SET `userId`='$id',`firstName`='$fname',`lastName`='$lname' WHERE `userId`='$id' ";
    $result = mysqli_query($conn,$sql) or die('data did not submit');
    if ($result) {
        // echo"data inserted successfully";
        header("location:index.php");
    }
}

?>


<form method="Post">
    <div class="mb-3">
        <label for="" class="form-label">Fist Name</label>
        <input type="tex" class="form-control" name="fistName" value="<?php echo $f_name; ?>">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">last Name</label>
        <input type="tex" class="form-control" name="lastName"value="<?php echo $l_name; ?>">
    </div>

    <button type="submit" class="btn btn-primary" name="submit">Add User </button>
</form>


<?php include_once "footer.php"; ?>