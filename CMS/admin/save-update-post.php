<?php
include_once "config.php";
//$file_name;
if (empty($_FILES['new_image']['name'])) {
  $file_name = $_POST['old_image'];
}else {
  $error = array();
  $file_name = $_FILES['new_image']['name'];
  $file_size = $_FILES['new_image']['size'];
  $file_tmp = $_FILES['new_image']['tmp_name'];
  $file_type = $_FILES['new_image']['type'];
  $file_export = explode('.', $file_name);
  $file_end = end($file_export);
  $file_ext = strtolower($file_end);
  $extensions = array('jpeg', 'jpg', 'png');

  if (in_array($file_ext, $extensions) === false) {
    $error[] = "this extension file is not allowed !";
  }
  if ($file_size > 2097152) {
    $error[] = "file size must be 2mb only allowed ";
  }
  if (empty($error) == true) {
    move_uploaded_file($file_tmp, './upload/' . $file_name);
  } else {
    print_r($error);
    die();
  }
}
 
$post_title = $_POST['post-title'];
$post_desc = $_POST['Desc'];
//$post_img = $_POST['Post_Image'];
$post_cat = $_POST['Category'];
//$post_author = $_POST['Post_Author'];
$post_id = $_POST["edit_post"]; // it's comming from hiden field top 

  $sql = "UPDATE `post_table` SET `Post_Title`='{$post_title}',`Post_Description`='{$post_desc}',`Post_Image`='$file_name',`Category`={$post_cat} WHERE `Post_ID`=$post_id";
echo $sql;
$result = mysqli_query($conn,$sql);
if($result){
  header('location:post.php');
}else{
  echo"error";
}