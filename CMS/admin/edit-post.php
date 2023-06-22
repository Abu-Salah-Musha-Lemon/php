<?php
include_once "header.php";
include_once "config.php";
$post_id = base64_decode($_GET["edit-post"]);
?>
<div class="container md-5 mt-3 mb-4">
  <?php
  $sql = "SELECT post_table.`Post_ID`, post_table.`Post_Title`, post_table.`Post_Description`, post_table.`Post_Date`, post_table.`Post_Image`,  post_table.`Category`, post_table.`Author`, categorytable.CategoryName, `usertable`.`userName` FROM post_table LEFT JOIN categorytable ON post_table.`category`= categorytable.Category_ID LEFT JOIN usertable ON `post_table`.`Author` = usertable.userId  WHERE post_table.post_ID = {$post_id}";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

  ?>

      <form method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">Post Title</label>
          <input type="text" class="form-control" name="post-title" value="<?php echo $row['Post_Title']; ?>">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Description</label>
          <input type="text area" class="form-control" name="Desc" value="<?php echo $row['Post_Description']; ?>">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Category</label>
          <select class="custom-select my-1 mr-sm-2" name="Category">
            <?php
            $category = "SELECT * FROM `categorytable`";
            $result = mysqli_query($conn, $category);
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                echo ' <option class="dropdown-item" value=' . $row["Category_ID"] . '>' . $row["CategoryName"] . '</option>';
              }
            }
            ?>
          </select>
        </div>
        <!--    <div class="form-group">
        <label for="exampleInputEmail1">Author</label>
        <input type="text" class="form-control" name="author" value="<?php // echo $row[$pAuthor];
                                                                      ?>">
      </div> -->

        <div class="form-group">
          <label for="exampleFormControlFile1">Example file input</label><br>
          <img src="upload/<?php echo $row['Post_Image']; ?>" alt="" srcset="">
          <input type="file" class="form-control-file" name="image">

        </div>
        <br>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </form>
  <?php }
  } else {
    echo "result is not found";
  } ?>
</div>




<?php include_once "footer.php"; ?>