<?php
include_once "./admin/config.php";
include_once "header.php";
// header("Refresh:3");
?>
<h1></h1>
<div id="templatemo_main_wrapper">
    <?php
    $aid = $_GET["author"];
    $sql1 = "SELECT * from post_table join usertable ON `post_table`.`Author` = usertable.userId  where `post_table`.`Author` = {$aid}";
    $result1 = mysqli_query($conn, $sql1) or die("query faild");
    $row1 = mysqli_fetch_assoc($result1);
    echo ' <div class="shadow-sm p-3 mb-5 bg-white rounded fs-3">' . $row1["userName"] . '</div>';
    $limit = 3;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }

    $offset = ($page - 1) * $limit;

    $sql = "SELECT post_table.`Post_ID`, post_table.`Post_Title`, post_table.`Post_Description`, post_table.`Post_Date`, post_table.`Post_Image`,  post_table.`Category`, post_table.`Author`, categorytable.CategoryName, `usertable`.`userName` FROM post_table LEFT JOIN categorytable ON post_table.`category`= categorytable.Category_ID LEFT JOIN usertable ON `post_table`.`Author` = usertable.userId where `post_table`.`Author` = {$aid}   ORDER BY post_table.Post_ID DESC LIMIT {$offset},{$limit}  ";

    $result = mysqli_query($conn, $sql);
    ?>
    <style>
        .main {
            background: none;
        }
    </style>
    <div id="templatemo_main_wrapper main">
        <div id="templatemo_content_wrapper">

            <div id="templatemo_content">
                <div class="shadow-sm p-3 mb-5 bg-white rounded fs-3"><?php $row1["userName"] ?></div>
                <div class="post_section"><span class="bottom"></span>
                    <?php
                    if (mysqli_num_rows($result) > 0) {

                        while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                            <h2><a href="blog.php?blogId=<?php echo $row["Post_ID"] ?>" class="more"> <?php echo strtoupper($row["Post_Title"]); ?></a></h2>

                            <strong>Date:</strong> <?php echo $row["Post_Date"]; ?> | <a href="author.php?author=<?php echo $row["Author"]; ?>"><strong>Author:</strong> <?php echo $row["userName"]; ?></a>

                            <a href="#"><img style="width:420px; height: 340px;" src="./admin/upload/<?php echo $row["Post_Image"]; ?> " /></a>

                            <p> <?php echo  substr($row["Post_Description"], 0, 100)  ?>.... </p>

                            <div class="cleaner"></div>
                            <div class="button float_r"><a href="blog.php?blogId=<?php echo $row["Post_ID"] ?>" class="more">Read more</a></div>
                            <div class="cleaner"></div>
                            <div class="cleaner"></div>
                            <br>
                    <?php }
                    } ?>
                </div>


                <div class="cleaner_h40">
                    <!-- a spacing between 2 posts -->
                </div>

            </div>



<!-- side Bar -->
<?php include_once "sidebar.php"; ?>

            <div class="cleaner"></div>
        </div> <!-- end of content wrapper -->
    </div>


    <!-- pagination -->
    <?php
    if (mysqli_num_rows($result) > 0) {
        $total_record = mysqli_num_rows($result);
        // $limit = 3;
        $total_page = ceil($total_record / $limit);
        echo '
            <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">';

        if ($page > 1) {
            echo ' <li class=" btn btn-primary m-2"><a class="text-light" href ="post.php?page=' . ($page - 1) . '">Prev</a></li>';
        }
        for ($i = 1; $i <= $total_record; $i++) {
            if ($i == $page) {
                $active = "active";
            } else {
                $active = "";
            }

            echo ' <li class="' . $active . ' btn btn-primary m-2  "><a class="text-light" href="author?page=' . $i . '">' . $i . '</a></li>';
        }
        if ($total_page > $page) {
            echo ' <li class=" btn btn-primary m-2"><a class="text-light" href = "author?page=' . ($page + 1) . '">Next</a></li>';
        }
        echo '</ul>
            </nav>
            ';
    }
    ?>

    <?php include_once "footer.php" ?>