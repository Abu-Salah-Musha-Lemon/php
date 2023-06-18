<?php
include_once "header.php";
include_once "config.php";

?>
<div class="container md-5 mt-3 mb-4">
  <?php
  if (isset($_FILES['image'])) {
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_ext = strtolower(end(explode('.', $file_name)));
    $extensions = array('jpeg', 'jpg', 'png');
    $error = array();
    if (in_array($file_ext, $extensions) === false) {
      $error[] = "this extension file is not allowed !";
    }
    if ($file_size > 2097152) {
      $error[] = "file size must be 2mb only allowed ";
    }
    if (empty($error) == true) {
      move_uploaded_file($file_tmp, 'uplode/' . $file_name);
    } else {
      print_r($error);
      die();
    }
  }
  if (isset($_POST['submit'])) {
    $pTitle = mysqli_real_escape_string($conn, $_POST['post-title']);
    $pDesc = mysqli_real_escape_string($conn, $_POST['Desc']);
    $pCategory = mysqli_real_escape_string($conn, $_POST['Category']);
    $pAuthor = mysqli_real_escape_string($conn, $_POST['author']);
    $pDate = date("D M Y");

    $sql = "INSERT INTO `post-table`(`Post-Title`, `Post-Description`, `Post-Date`, `Post-Image`, `Category`, `Author`)  VALUES ('$pTitle','$pDesc','$pDate','$file_name'$pCategory','$pAuthor'); ";

    $sql .= "UPDATE `categorytable` SET `Post`= post +1 Where `Category-ID`='$pCategory' ";

    $result = mysqli_multi_query($conn, $sql);

    header("Localhost:post.php");
  }
  $sql1 = "SELECT * FROM `post-table`";
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
        <label for="exampleInputEmail1">Author</label>
        <input type="text" class="form-control" name="author" placeholder="Authore">
      </div>
      <div class="form-group form-inlinere">
        <label class="my-1 mr-2">Category</label>
        <select class="custom-select my-1 mr-sm-2" name="Category">
          <option selected>Choose...</option>
          <option value="1">phone</option>
          <option value="2">helth</option>
        </select>
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