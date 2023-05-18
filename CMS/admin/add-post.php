<?php
include_once "header.php";
include_once "config.php";

?>
<div class="container md-5 mt-3 mb-4">
  <?php
  if (isset( $_POST['submit'])) {
    $pTitle = mysqli_real_escape_string($conn, $_POST['post-title']);
    $pDesc = mysqli_real_escape_string($conn, $_POST['Desc']);
    $pCategory = mysqli_real_escape_string($conn, $_POST['Category']);
    $pAuthor = mysqli_real_escape_string($conn, $_POST['author']);
    $sql = "INSERT INTO `post-table`(`Post-Title`, `Post-Description`, `Category`, `Author`) VALUES ('$pTitle','$pDesc','$pCategory','$pAuthor') ";
    $result = mysqli_query($conn, $sql) ;
    header("Localhost:post.php");
  }
  $sql1="SELECT * FROM `post-table`";
  $result = mysqli_query($conn, $sql1) or die("query unsuccessfull");
  if (mysqli_num_rows($result) > 0) {
  ?>

    <form method="post">
      <div class="form-group">
        <label for="exampleInputEmail1">Post Title</label>
        <input type="text" class="form-control" name="post-title" placeholder="post title">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Description</label>
        <input type="text area" class="form-control" name="Desc" placeholder="Description">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Category</label>
        <input type="text" class="form-control" name="Category" placeholder="Category">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Author</label>
        <input type="text" class="form-control" name="author" placeholder="Category">
      </div>

      <div class="form-group">
        <label for="exampleFormControlFile1">Example file input</label><br>
        <input type="file" class="form-control-file" name="image">
      </div>
      <br>
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>

  <?php }
  ?>
</div>




<?php include_once "footer.php"; ?>