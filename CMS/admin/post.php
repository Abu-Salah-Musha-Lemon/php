<?php
include_once "header.php";
include_once "config.php";
if (isset($_GET['delete'])) {
    $delete = base64_decode($_GET['delete']);
    $sql = "DELETE FROM `post-table` WHERE `Post-ID` = $delete";
    $result = mysqli_query($conn, $sql) or dir("faild to delte ");
  }

?>
<div class="container md-5">
    <a href="./add-post.php?" role="button"><i class="bi bi-person-add btn btn-success my-2"></i></a>
    <?php
    $sql = "SELECT * FROM `post-table`ORDER BY`Post-ID`DESC ";
    $result = mysqli_query($conn, $sql) or die("query unsuccessfull");
    if (mysqli_num_rows($result) > 0) {
       
    ?>
        <table class="table md-5">
            <thead>
                <tr>
                    <th scope="col">Post Id</th>
                    <th scope="col">Post Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Date</th>
                    <th scope="col">Image</th>
                    <th scope="col">Category</th>
                    <th scope="col">Authore</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
             
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '
                    <tr>
                    <th scope="row">' . $row["Post-ID"] . '</th>
                    <td>' . $row["Post-Title"] . '</td>
                    <td>' . $row["Post-Description"] . '</td>
                    <td>' . $row["Post-Date"] . '</td>
                    <td>' . $row["Post-image"] . '</td>
                    <td>' . $row["Category"] . '</td>
                    <td>' . $row["Author"] . '</td>
                    <td > 
                            <a  href="./edit-post.php?edit-post='.base64_encode($row["Post-ID"]).'" role="button"><i class="btn btn-primary bi bi-pencil-square"></i>
                            </a>
                            <a href="./post.php?delete='.base64_encode($row["Post-ID"]).'" role="button"><i class="btn btn-danger bi bi-trash"></i></a>
                        </td>
                       </tr>
                    ';
                    }

                    ?>
             
            </tbody>
        </table>

    <?php } ?>
</div>





<?php include_once "footer.php"; ?>