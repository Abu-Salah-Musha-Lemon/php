<?php
include_once "./admin/config.php";
?>
<div class="container-fluid">
    <?php
    $limit = 3;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }

    $offset = ($page - 1) * $limit;

    $sql = "SELECT post_table.`Post_ID`, post_table.`Post_Title`, post_table.`Post_Description`, post_table.`Post_Date`, post_table.`Post_Image`,  post_table.`Category`, post_table.`Author`, categorytable.CategoryName, `usertable`.`userName` FROM post_table LEFT JOIN categorytable ON post_table.`category`= categorytable.Category_ID LEFT JOIN usertable ON `post_table`.`Author` = usertable.userId  ORDER BY post_table.Post_ID DESC LIMIT {$offset},{$limit}";

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            echo '
          <div id="templatemo_main_wrapper">
                <div id="templatemo_content_wrapper">
                            <div id="templatemo_content">

                                    <div class="post_section"><span class="bottom"></span>
                                            <h2><a href="blog_post.html">' . $row["Post_Title"] . '</a></h2>

                                            <strong>Date:</strong>' . $row["Post_Date"] . ' | <strong>Author:</strong> ' . $row["userName"] . '

                                            <a href="#"><img style="width:420px; height: 340px;"src="./admin/upload/' . $row["Post_Image"] . '"  /></a>

                                            <p>' . $row["Post_Description"] . '</p>

                                            <div class="cleaner"></div>
                                            <div class="category">Tags: <a href="#">Freebies</a>, <a href="#">Templates</a></div>
                                            <div class="button float_r"><a href="blog_post.html" class="more">Read more</a></div>
                                            <div class="cleaner"></div>

                                        </div>
                                </div>
                        
                    </div>
            </div>

      
      ';
        }

    ?>
       

        <!-- pasination  -->
        <?php
        $sql = "SELECT * FROM `post_table`";
        $result = mysqli_query($conn, $sql) or die("query unsuccessfull");
        if (mysqli_num_rows($result) > 0) {
            $total_record = mysqli_num_rows($result);
            // $limit = 3;
            $total_page = ceil($total_record / $limit);
            echo '<ul class="pagination admin-pagination">';

            if ($page > 1) {
                echo ' <li class=" btn btn-primary m-2"><a class="text-light" href ="post.php?page=' . ($page - 1) . '">Prev</a></li>';
            }
            for ($i = 1; $i <= $total_record; $i++) {
                if ($i == $page) {
                    $active = "active";
                } else {
                    $active = "";
                }

                echo ' <li class="' . $active . ' btn btn-primary m-2  "><a class="text-light" href="post.php?page=' . $i . '">' . $i . '</a></li>';
            }
            if ($total_page > $page) {
                echo ' <li class=" btn btn-primary m-2"><a class="text-light" href = "post.php?page=' . ($page + 1) . '">Next</a></li>';
            }
            echo '</ul>';
        }
        ?>

    <?php } ?>
    </div>
