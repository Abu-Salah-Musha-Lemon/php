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
    $file_ext = strtolower(end(explode('.',$file_name)));
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
  if (isset($_POST['submit'])) {

    $pTitle = mysqli_real_escape_string($conn, $_POST['post-title']);
    $pDesc = mysqli_real_escape_string($conn, $_POST['Desc']);
    $pCategory = mysqli_real_escape_string($conn, $_POST['Category']);
    $pDate = date("m.d.y");
    $pAuthor =$_SESSION['userID'] ;

    $sql = "INSERT INTO `post_table`( `Post_Title`, `Post_Description`, `Post_Date`, `Post_Image`,  `Category`, `Author`) VALUES ('$pTitle','$pDesc','$pDate','$file_name','$pCategory','$pAuthor');";

    $sql .= "UPDATE `categorytable` SET `Post`= Post +1 Where `Category_ID`='$pCategory' ";

    $result = mysqli_multi_query($conn, $sql);

    header("Localhost:post.php");
 }

  ?>

<style>
    /* Left column */
    .leftcolumn {
        float: left;
        width: 75%;
        margin-left: 10px;
    }

    /* Right column */
    .rightcolumn {
        float: left;
        width: 25%;
        padding-left: 20px;
    }

    /* Fake image */
    .fakeimg {
        background-color: #aaa;
        width: 100%;
        padding: 20px;
    }

    /* Add a card effect for articles */
    .card {
        background-color: white;
        padding: 20px;
        margin-top: 20px;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }


    /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
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
                <h2>TITLE HEADING</h2>
                <h5><i class="bi bi-person-circle">Admin</i> <i class="bi bi-calendar-event"></i> Dec 7, 2017</h5>
                <div class="fakeimg" style="height:200px;">Image</div>
                <p>Some text..</p>
                <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
            </div>
        </div>
        <!--
         <div class="rightcolumn">
    <div class="card">
      <h2>About Me</h2>
      <div class="fakeimg" style="height:100px;">Image</div>
      <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
    </div>
    <div class="card">
      <h3>Popular Post</h3>
      <div class="fakeimg">Image</div><br>
      <div class="fakeimg">Image</div><br>
      <div class="fakeimg">Image</div>
    </div>
    <div class="card">
      <h3>Follow Me</h3>
      <p>Some text..</p>
    </div>
 -->
    </div>
</div>





<?php include_once "footer.php"; ?>