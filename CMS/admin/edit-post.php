<?php
include_once "header.php";
include_once "config.php";
$id = base64_decode($_GET["edit-post"]);
?>
<div class="container md-5 mt-3 mb-4">
  <?php
  if (isset( $_POST['submit'])) {
    $pTitle = mysqli_real_escape_string($conn, $_POST['post-title']);
    $pDesc = mysqli_real_escape_string($conn, $_POST['Desc']);
    $pCategory = mysqli_real_escape_string($conn, $_POST['Category']);
    $pAuthor = mysqli_real_escape_string($conn, $_POST['author']);
    $sql = "UPDATE `post-table` SET `Post-Title`='$pTitle',`Post-Description`='$pDesc',`Category`='$pCategory',`Author`='$pAuthor' WHERE `Post-ID`='$id'";
    
    $result = mysqli_query($conn, $sql) ;
    if ($result) {
      header("location:post.php");
    }
  }
  // $sql1="SELECT * FROM `post-table`WHERE `Post-ID`=`$id`";
  // $result = mysqli_query($conn, $sql1) or die("query faild");
  // // if (mysqli_num_rows($result) > 0) {
  //   while ($row = mysqli_fetch_assoc($result)) {
  //         $pTitle =  $row['Post-Title'];
  //         $pDesc = $row['Post-Description'];
  //         $pCategory = $row['Category'];
  //         $pAuthor =  $row['Author'];
  ?>

    <form method="post">
      <div class="form-group">
        <label for="exampleInputEmail1">Post Title</label>
        <input type="text" class="form-control" name="post-title" value="<?php // echo $row[$pTitle];?>">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Description</label>
        <input type="text area" class="form-control" name="Desc" value="<?php // echo $row[$pDesc];?>">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Category</label>
        <input type="text" class="form-control" name="Category" value="<?php // echo $row[$pCategory];?>">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Author</label>
        <input type="text" class="form-control" name="author" value="<?php // echo $row[$pAuthor];?>">
      </div>

      <div class="form-group">
        <label for="exampleFormControlFile1">Example file input</label><br>
        <input type="file" class="form-control-file" name="image">
      </div>
      <br>
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
<!-- 
  <?php //}
  // }
  ?> -->
</div>




<?php include_once "footer.php"; ?>