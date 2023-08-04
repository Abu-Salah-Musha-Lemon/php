<?php
include_once "./admin/config.php";
$page_title = basename($_SERVER['PHP_SELF']);
switch($page_title){
    case "blog.php":
        if(isset($_GET['blogId'])){
            $url_id=$_GET["blogId"];
            $sql_title = "SELECT * FROM post_table WHERE Post_ID= {$url_id}";
            $result_title = mysqli_query($conn,$sql_title);
            $row_title = mysqli_fetch_assoc($result_title);
            $page_title = $row_title["Post_Title"];
        }else{
            $post_title = "No post Found";
        }
        break;
    case "author.php":
        if(isset($_GET['author'])){
            $url_id=$_GET["author"];
            $sql_title = "SELECT * FROM usertable WHERE userId= {$url_id}";
            $result_title = mysqli_query($conn,$sql_title);
            $row_title = mysqli_fetch_assoc($result_title);
            $page_title = $row_title["userName"];
        }else{
            $post_title = "No post Found";
        }
        break;
    case "category.php":
        if(isset($_GET['category'])){
            $url_id=$_GET["cateogry"];
            $sql_title = "SELECT * FROM post_table WHERE Post_ID= {$url_id}";
            $result_title = mysqli_query($conn,$sql_title);
            $row_title = mysqli_fetch_assoc($result_title);
            $page_title = $row_title["title"];
        }else{
            $post_title = "No post Found";
        }
        break;
    case "search":
        if(isset($_GET['search'])){
            $url_id=$_GET["search"];
            $sql_title = "SELECT * FROM post_table WHERE Post_ID= {$url_id}";
            $page_title = $row_title["search"];
        }else{
            $post_title = "No post Found";
        }
        break;
    case "index.php":
            $page_title = "Home";

        break;
        default:
            $post_title ="No result found";
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="refresh" content="5"> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CMS/templatemo_style.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title><?php echo  $page_title  ?></title>
</head>

<body>
    <div id="templatemo_header_wrapper">
        <div id="templatemo_header">

            <div id="site_title">
                <h1><a href="index.php">ASM Lemon</a></h1>
            </div>

            <div id="templatemo_rss">
                <a href="../admin/signup.php">signup<br></a>
            </div>

        </div>

        <div id="templatemo_menu">

            <ul>
                <li><a href="../CMS/index.php" class="current">Home</a></li>
                <!-- <li><a href="../CMS/blog.php">Blog</a></li> -->
                <li><a href="../CMS/por">Portfolio</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="contact.html">Contact Us</a></li>
            </ul>

        </div> <!-- end of templatemo_menu -->



    </div>