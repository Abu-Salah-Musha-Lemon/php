<?php
include_once "header.php";
include_once "config.php";

?>
<div class="container md-5 mt-3 mb-4">


  <form action="save-post.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="exampleInputEmail1">Post Title</label>
      <input type="text" class="form-control" name="post-title" placeholder="post title">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Description</label>
      <input type="text area" class="form-control" name="Desc" placeholder="Description">
    </div>

    <!-- <div class="form-group">
      <label for="exampleInputEmail1">Author</label>
      <input type="text" class="form-control" name="author" placeholder="Authore">
    </div> -->
    <div class="form-group form-inlinere">
      <label class="my-1 mr-2">Category</label>
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

    <div class="form-group">
      <label >Example file input</label><br>
      <input type="file" class="form-control-file" name="image">
    </div>

    <br>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  </form>

  <?php // }
  ?>
</div>




<?php include_once "footer.php"; ?>