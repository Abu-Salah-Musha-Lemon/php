<?php
include_once "header.php";
include_once "config.php";
if (isset($_GET['delete'])) {
    $delete = base64_decode($_GET['delete']);
    $sql = "DELETE FROM `post_table` WHERE `Post_ID` = $delete";
    $result = mysqli_query($conn, $sql) or dir("faild to delte ");
}

  $file_name;
  if (isset($_FILES['image'])) {
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_export = explode('.', $file_name);
    $file_end = end($file_export);
    $file_ext = strtolower($file_end);
    $extensions = array('jpeg', 'jpg', 'png');
    $error = array();
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


  ?>

<style>
    .leftcolumn {
        float: left;
        width: 75%;
        margin-left: 10px;
    }

    .rightcolumn {
        float: left;
        width: 25%;
        padding-left: 20px;
    }

    .fakeimg {
        background-color: #aaa;
        width: 100%;
        padding: 20px;
    }
    .card {
        background-color: white;
        padding: 20px;
        margin-top: 20px;
    }
    .row:after {
        content: "";
        display: table;
        clear: both;
    }
    @media screen and (max-width: 800px) {

        .leftcolumn,
        .rightcolumn {
            width: 100%;
            padding: 0;
        }
    }
</style>
<div class="container">
    <div class="row">
        <div class="leftcolumn">
            <div class="card">
                <h2>lemon</h2>
                <h5><i class="bi bi-person-circle">Admin</i> <i class="bi bi-calendar-event"></i> Dec 7, 2017</h5>
                <div class="fakeimg" style="height:200px;">Image</div>
                <p>Some text..</p>
                <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
            </div>
        </div>
    </div>
</div>





<?php include_once "footer.php"; ?>