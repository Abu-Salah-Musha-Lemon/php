<?php include_once "header.php";
include_once "conf.php";

// delete 
if (isset( $_GET["delete"])) {
    $id = $_GET["delete"];
    $sql= "DELETE FROM `usertable` WHERE `userId`='$id' ";
    $result = mysqli_query($conn,$sql) or die('data did not submit');
    if ($result) {
        header("location:index.php");
    }
}



?>

<table class="table table-striped">
<a href="./add.php?" role="button"><i class="bi bi-person-add btn btn-primary"></i></a>
   

    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $sql = "SELECT * FROM usertable";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {

        ?> <tr>
                    <th scope="row"><?php echo $row["userId"]; ?></th>
                    <td scope="row"><?php echo $row["firstName"]; ?></td>
                    <td scope="row"><?php echo $row["lastName"]; ?></td>
                    <td > <a class="btn btn-primary" href="./edit.php?edit=<?php echo $row['userId'];?>" role="button"><i class="bi bi-pencil-square"></i></a>
                     <a class="btn btn-primary" href="./index.php?delete=<?php echo $row['userId'];?>" role="button"><i class="bi bi-trash"></i></a></td>
                </tr>
        <?php }
        } ?>

    </tbody>
</table>

<?php include_once "footer.php"; ?>