<?php
include_once "header.php";
 include_once "./admin/config.php";
// SELECT `Post_ID`, `Post_Title`, `Post_Description`, `Post_Date`, `Post_Image`, `Category`, `Author` FROM `post_table` WHERE 1
if (isset($_POST['submit'])) {
    $search = $_POST['search'];
    echo $searchQuery = "SELECT * FROM `post_table` WHERE `Post_Title` like '%$search%' or `Post_ID` like '%$search%'";
    echo $result = mysqli_query($conn, $searchQuery);
    if (mysqli_num_rows($result)>0) {
        ?>
<table class="table">
   
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
        </tr>
    </thead>

    <tbody>
        <?php while($row = mysqli_fetch_assoc($result)>0){?>

        <tr>
            <th scope="row"><?php $row["Post_ID"];?></th>
            <td><?php $row["Post_Title"];?></td>
            <td><?php $row["Post_Description"];?></td>
        </tr><?php }?>
        <thead>


            <?php
    } else {
        echo "data is not found";
    }?>
</table>
<?php
}



?>
<form action="" method="post"></form>

<form method="POST">
    <div class="mb-3">
        <input type="text" class="form-control" placeholder="Search" name="search">
        <button type="submit" class="btn btn-primary" name="submit">Search</button>
</form>