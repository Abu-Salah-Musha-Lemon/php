<?php
include_once "header.php";
include_once "config.php";

if (isset($_POST['cSave'])) {
    $cName = $_POST['cName'];
    $sql = "INSERT INTO `categorytable`( `CategoryName`) VALUES ('$cName');";
    $result = mysqli_query($conn , $sql);

}


?>

<div class="container md-5">
    <form action="" method="post">
        <div class="form-group">
            <label > address Category</label>
            <input type="text" class="form-control" name="cName"  placeholder="Enter Category">
        </div>
        <button type="submit" class="btn btn-primary" name="cSave">Save</button>
    </form>

</div>


<?php include_once "footer.php"; ?>