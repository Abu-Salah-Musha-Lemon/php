<?php
include_once "../CMS/admin/config.php";

$submit = $_POST['submit'];

if (isset($submit)) {
  $errors=[] ;
  $img_path = "upload/";
  $img = $_FILES['img']['name'];
  $size = $_FILES['img']['size'];
  $temp_name = $_FILES['img']['tmp_name'];
  $img_type = $_FILES['img']['type'];
  $fileExtensionsAllowed = ['jpeg','jpg','png'];
  $fileExtension = strtolower(end(explode('.',$img)));
  $uploadPath = $currentDirectory . $uploadDirectory . basename($img); 
  if ($temp_name !='' ) { 

    if (! in_array($fileExtension,$fileExtensionsAllowed)) {
      $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
    }

    if ($fileSize > 4000000) {
      $errors[] = "File exceeds maximum size (4MB)";
    }

    if (empty($errors)) {
      $didUpload = move_uploaded_file($temp_name, $uploadPath);

      if ($didUpload) {
        echo "The file " . basename($fileName) . " has been uploaded";
      } else {
        echo "An error occurred. Please contact the administrator.";
      }
    } else {
      foreach ($errors as $error) {
        echo $error . "These are the errors" . "\n";
      }
    }

  }
}
