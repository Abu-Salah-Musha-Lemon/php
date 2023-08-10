<?php
include_once "config.php";
if (!isset($_SESSION['userName'])) {
    header("location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <link href="../templatemo_style.css" rel="stylesheet" type="text/css" />
    <title>Admin</title>
</head>

<body>
    <div id="templatemo_header_wrapper">
        <div id="templatemo_header">

            <div id="site_title">
                <h1><a href="index.php">ASM Lemon</a></h1>
            </div>

            <div id="templatemo_rss">
                <a href="../admin/logout.php">LogOut<br /></a>
            </div>

        </div> <!-- end of header -->

        <div id="templatemo_menu">

            <ul> 
                <?php
                if ($_SESSION['role'] == 0) {
                ?>
                    <li><a href="../admin/user.php" >User</a></li>
                    <li><a href="../admin/category.php">category</a></li>

                <?php }else{
                     ?>
                     <li><a href="../admin/post.php">Post</a></li>
                 <?php
                }
                ?>

            </ul>

        </div> <!-- end of templatemo_menu -->



    </div>