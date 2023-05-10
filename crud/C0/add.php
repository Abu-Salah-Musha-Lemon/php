<?php include_once "header.php";
include_once "conf.php";

if (isset($_POST['submit'])) {
    $fname = $_POST['fistName'];
    $lname = $_POST['lastName'];
    $sql= "INSERT INTO `usertable`( `firstName`, `lastName`) VALUES ('$fname','$lname')";
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
        <input type="tex" class="form-control" name="fistName">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">last Name</label>
        <input type="tex" class="form-control" name="lastName">
    </div>

    <button type="submit" class="btn btn-primary" name="submit">Add User </button>
</form>


<?php include_once "footer.php"; ?>