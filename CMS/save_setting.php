<?php
include_once "./admin/config.php";
if (isset($_POST["update"])) {
    $settingUpdate = $_POST["update"];
    if (empty($_FILES["logo"]["name"])) {
        $file_name = $_POST["old_img"];
    } else {
        $errors = array();

        echo $file_name = $_FILES["logo"]["name"];
        $file_size = $_FILES["logo"]["size"];
        $file_tmp = $_FILES["logo"]["tmp_name"];
        $file_type = $_FILES["logo"]["type"];
        $file_ext = end(explode('.', $file_name));

        $extensions = array('jpeg', 'jpg', 'png');
        if (in_array($file_ext, $extensions) == false) {
            $errors[] = "This extension file not allowed , please input JPEG, JPG, PNG";
        }
        if ($file_size > 2097152) {
            $errors[] = "File size must be 2mb or lower";
        }
        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, "admin/upload/" . $file_name);
        } else {
            print_r($errors);
            die();
        }
    }

    // $webName = $_POST["webName"];
    // $logo = $_POST["logo"];
    // $Footer = $_POST["footer"];
    // $sql = "UPDATE setting SET webSiteName = {$webName} ,logo = {$log} ,footerdesc = {$Footer }";
    echo $sql = "UPDATE setting SET webSiteName='{$_POST["webName"]}',footer='{$_POST["footer"]}',logo='{$_POST["logo"]}'";die;
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location:http://localhost/learnPhp/CMS/setting.php");
        echo "success";
    } else {
        echo "Query Faild";
    }
}
