<?php
include_once "header.php";
include_once "config.php";
$post_id = $_GET["edit_post"];

?>
<div class="container md-5 mt-4 mb-6">

  <?php
  $sql = "SELECT post_table.`Post_ID`, post_table.`Post_Title`, post_table.`Post_Description`, post_table.`Post_Date`, post_table.`Post_Image`,  post_table.`Category`, post_table.`Author`, categorytable.CategoryName, `usertable`.`userName` FROM post_table LEFT JOIN categorytable ON post_table.`category`= categorytable.Category_ID LEFT JOIN usertable ON `post_table`.`Author` = usertable.userId  WHERE post_table.post_ID = {$post_id}";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

  ?>
      <form action="save-update-post.php" method="post" enctype="multipart/form-data">

        <section style=" ">
          <div class="container pb-2 ">
            <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                  <div class="card-body p-5 text-center">

                    <h3 class="mb-3">Update</h3>
                    <div class="form-group">
                      <label>Post Title</label>
                      <input type="text" class="form-control shadow-none" name="post-title" value="<?php echo $row['Post_Title']; ?>">
                    </div>
                    <div class="form-group">
                      <label>Description</label>
                      <input type="text-area" class="form-control shadow-none" name="Desc" value="<?php echo $row['Post_Description']; ?>">
                    </div>
                    <div class="form-group">
                      <label>Category</label>
                      <select class="custom-select my-1 mr-sm-2" name="Category">
                        <?php
                        $category1 = "SELECT * FROM `categorytable`";
                        $result1 = mysqli_query($conn, $category1);
                        if (mysqli_num_rows($result1) > 0) {
                          while ($row1 = mysqli_fetch_assoc($result1)) {
                            // it is not work poroperly
                            if ($row['Category'] == $row1['Category_ID']) {
                              $selected = 'selected';
                            } else {
                              $selected = "";
                            }
                            echo ' <option class="dropdown-item"' . $selected . ' value=' . $row1["Category_ID"] . '>' . $row1["CategoryName"] . '</option>';
                          }
                        }
                        ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <img class="my-2" style="width:150px;height:100px;" src="upload/<?php echo $row['Post_Image']; ?>" alt="" srcset="">
                      <input type="file" class="form-control-file" name="new_image">
                      <input type="hidden" class="form-control-file" name="old_image" value="<?php echo $row['Post_Image']; ?>">
                      <input type="text" class="form-control-file" name="edit_post" value="<?php echo $post_id; ?> ">

                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary" name="submit">Update</button>
      </form>
  <?php }
  } else {
    echo "result is not found";
  } ?>
  <hr class="my-4">

</div>
</div>
</div>
</div>
</div>
</section>

</form>
</div>





<?php include_once "footer.php"; ?>