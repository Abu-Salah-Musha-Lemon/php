<?php
include_once "header.php";
include_once "config.php";
if (isset($_GET['delete'])) {
    $delete = base64_decode($_GET['delete']);
    $sql = "DELETE FROM `post_table` WHERE `Post_ID` = $delete";
    $result = mysqli_query($conn, $sql) or dir("faild to delte ");
  }

?>
<div class="container md-5">
    <a href="./add-post.php?" role="button"><i class="bi bi-person-add btn btn-success my-2"></i></a>
    <?php 
       $limit = 3;
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
    } else {
      $page = 1;
    }
  
    $offset = ($page - 1) * $limit;

    // $sql = "SELECT * FROM post_table LEFT JOIN Categorytable ON post_table.category = Categorytable.Category_ID LEFT JOIN usertable ON post_table.Author = usertable.userId ORDER BY post_table.Post_ID DESC LIMIT {$offset},{$limit}";
    
    if ($_SESSION['role'] == 0) {
      $sql = "SELECT post_table.`Post_ID`, post_table.`Post_Title`, post_table.`Post_Description`, post_table.`Post_Date`, post_table.`Post_Image`,  post_table.`Category`, post_table.`Author`, categorytable.CategoryName, `usertable`.`userName` FROM post_table LEFT JOIN categorytable ON post_table.`category`= categorytable.Category_ID LEFT JOIN usertable ON `post_table`.`Author` = usertable.userId  ORDER BY post_table.Post_ID DESC LIMIT {$offset},{$limit}";
    }elseif($_SESSION['role'] == 1){

      $sql = "SELECT post_table.`Post_ID`, post_table.`Post_Title`, post_table.`Post_Description`, post_table.`Post_Date`, post_table.`Post_Image`,  post_table.`Category`, post_table.`Author`, categorytable.CategoryName, `usertable`.`userName` FROM post_table LEFT JOIN categorytable ON post_table.`Category`= categorytable.Category_ID LEFT JOIN usertable ON `post_table`.`Author` = usertable.userId  WHERE post_table.author = {$_SESSION['userID']}   ORDER BY post_table.Post_ID DESC LIMIT {$offset},{$limit}";
  }

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
       
    ?>
        <table class="table md-5">
            <thead>
                <tr>
                    <th scope="col">Post Id</th>
                    <th scope="col">Post Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Category</th>
                    <th scope="col">Authore</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
             <style>
                .cImage{
                    width: 80px;
                    height: 100px;
                }
             </style>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '
                    <tr>
                    <th scope="row">' . $row["Post_ID"] . '</th>
                    <td>' . $row["Post_Title"] . '</td>
                    <td>' . $row["Post_Description"] . '</td>

                    <td > <img class = "cImage" src="upload/'.$row['Post_Image'].'"></td>
                    <td>' . $row["CategoryName"] . '</td>

                    <td>' . $row["userName"] . '</td>
                    <td > 
                            <a  href="./edit-post.php?edit-post='.base64_encode($row["Post_ID"]).'" role="button"><i class="btn btn-primary bi bi-pencil-square"></i>
                            </a>
                            <a href="./post.php?delete='.base64_encode($row["Post_ID"]).'" role="button"><i class="btn btn-danger bi bi-trash"></i></a>
                        </td>
                       </tr>
                    ';
                    



                    }

                    ?>
             
            </tbody>
        </table>
        <?php
  $sql = "SELECT * FROM `post_table`";
  $result = mysqli_query($conn, $sql) or die("query unsuccessfull");
  if (mysqli_num_rows($result) > 0) {
    $total_record = mysqli_num_rows($result);
    // $limit = 3;
    $total_page = ceil($total_record / $limit);
    echo '<ul class="pagination admin-pagination">';

    if ($page > 1) {
      echo ' <li class=" btn btn-primary m-2"><a class="text-light" href ="post.php?page=' . ($page - 1) . '">Prev</a></li>';
    }
    for ($i = 1; $i <= $total_record; $i++) {
      if ($i == $page) {
        $active = "active";
      } else {
        $active = "";
      }

      echo ' <li class="' . $active . ' btn btn-primary m-2  "><a class="text-light" href="post.php?page=' . $i . '">' . $i . '</a></li>';
    }
    if ($total_page > $page) {
      echo ' <li class=" btn btn-primary m-2"><a class="text-light" href = "post.php?page=' . ($page + 1) . '">Next</a></li>';
    }
    echo '</ul>';
  }
  ?>

    <?php } ?>
</div>





<?php include_once "footer.php"; ?>