<?php
include_once "header.php";
include_once "config.php";
?>

<div class="container md-5">

    <form method="post">
        <div class="form-group">
            <h4>Add Cetegory</h4>
            <label>Category Name.</label>
            <input type="text area" class="form-control" name="cName" placeholder="Category Name">
        </div><br>
        <button type="button" class="btn btn-success" name="cSave">Save</button>

    </form>
</div>
    <?php
    if (isset($_POST['cSave'])) {
        $cName = $_POST['cName'];
        $sql = "INSERT INTO `categorytable` (`Category-Name`) VALUES ('$cName')";
        $result = mysqli_query($conn, $sql) or die($result);
        print_r($result);
        if ($result) {
            header("Localhost:http://localhost/learnPhp/CMS/admin/category.php"); //it's not work 
        }
    }
    ?>


<?php include_once "footer.php"; ?>