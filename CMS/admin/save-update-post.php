<?php
include_once "config.php";

if (isset($_POST['submit'])) {

  $file_name = $_POST['old_image'];
  if (empty($_FILES['new_image'])) {
    $file_name = $_POST['old_image'];
  } else {
    $file_name = $_FILES['new_image']['name'];
    $file_size = $_FILES['new_image']['size'];
    $file_tmp = $_FILES['new_image']['tmp_name'];
    $file_type = $_FILES['new_image']['type'];
    $file_ext = strtolower(end(explode('.', $file_name)));
    $extensions = ['jpeg', 'jpg', 'png'];
    $error = [];
    if (in_array($file_ext, $extensions) === false) {
      $error[] = "this extension file is not allowed !";
    }
    if ($file_size > 2097152) {
      $error[] = "file size must be 2mb only allowed ";
    }
    if (empty($error) == false) {
      move_uploaded_file($file_tmp, 'upload/' . $file_name);
      $sql3 = "UPDATE `post_table` SET `Post_Title`='{$_POST['post-title']}',`Post_Description`='{$_POST['Desc']}',`Post_Image`={$file_name},`Category`={$_POST['Category']} WHERE `Post_ID`= {$_POST['edit_post']}";
      $result3 = mysqli_query($conn, $sql3);
      if ($result3) {
        // header('Location: post.php');
      }
    } else {
      print_r($error);
      die();
    }
  }
}
