<?php
include_once "header.php";
include_once "config.php";

?>
<div class="container md-5 mt-3 mb-4">
<?php
$sql = "SELECT * FROM `post-table` ";
$result = mysqli_query($conn, $sql) or die("query unsuccessfull");
if (mysqli_num_rows($result) > 0) {
?>

<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Post Title</label>
    <input type="text" class="form-control" name="post-title" placeholder="post title">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Description</label>
    <input type="text area" class="form-control" name="Description" placeholder="Description">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Category</label>
    <input type="text" class="form-control" name="Category" placeholder="Category">
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">Example file input</label><br>
    <input type="file" class="form-control-file" name="image">
  </div>
<br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    
<?php } ?>
</div>




<?php include_once "footer.php"; ?>