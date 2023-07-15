<?php
include_once "./admin/config.php";
include_once "header.php"
?>
<div id="templatemo_main_wrapper">
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
 ?>
<style>
    .main{background:none;}
</style>
<div id="templatemo_main_wrapper main">
    <div id="templatemo_content_wrapper">

        <div id="templatemo_content">

            <div class="post_section"><span class="bottom"></span>
                <?php if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_assoc($result)) {

                ?>
                        <h2><a href="blog.php?blogId=<?php echo $row["Post_ID"] ?>" class="more"> <?php echo $row["Post_Title"]; ?></a></h2>

                        <strong>Date:</strong> <?php echo $row["Post_Date"]; ?> | <strong>Author:</strong> <?php echo $row["userName"]; ?>

                        <a href="#"><img style="width:420px; height: 340px;" src="./admin/upload/<?php echo $row["Post_Image"]; ?> " /></a>

                        <p> <?php echo  substr($row["Post_Description"], 0, 100); ?> </p>

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



        <div id="templatemo_sidebar_two">

            <div class="banner_250x200">
                <a href="http://www.templatemo.com" target="_parent"><img src="images/250x200_banner.jpg" alt="templates" /></a>
            </div>

            <div class="banner_125x125">
                <a href="http://www.templatemo.com/page/1" target="_parent"><img src="images/templatemo_ads.jpg" alt="web 1" /></a>
                <a href="http://www.templatemo.com/page/2" target="_parent"><img src="images/templatemo_ads.jpg" alt="web 2" /></a>
                <a href="http://www.templatemo.com/page/3" target="_parent"><img src="images/templatemo_ads.jpg" alt="templates 2" /></a>
                <a href="http://www.templatemo.com/page/4" target="_parent"><img src="images/templatemo_ads.jpg" alt="templates 1" /></a>
            </div>

            <div class="cleaner_h40"></div>

            <div class="sidebar_two_box">

                <h4>Useful Resources</h4>
                <ul class="templatemo_list">
                    <li><a href="http://www.templatemo.com" target="_parent">Free CSS Templates</a></li>
                    <li><a href="http://www.flashmo.com" target="_parent">Flash Templates</a></li>
                    <li><a href="http://www.templatemo.com/page/1" target="_parent">Website Templates</a></li>
                    <li><a href="http://www.webdesignmo.com" target="_parent">Web Design Blog</a></li>
                    <li><a href="http://www.koflash.com" target="_parent">Flash Web Gallery</a></li>
                    <li><a href="#">Curabitur sed lacinia</a></li>
                    <li><a href="#">Vestibulum laoreet tincidunt</a></li>
                    <li><a href="#">Nullam nec mi enim</a></li>
                    <li><a href="#">Aliquam quam nulla</a></li>
                    <li><a href="#">Curabitur non felis massa</a></li>
                </ul>
            </div>

        </div>

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

        echo ' <li class="' . $active . ' btn btn-primary m-2  "><a class="text-light" href="post.php?page=' . $i . '">' . $i . '</a></li>';
    }
    if ($total_page > $page) {
        echo ' <li class=" btn btn-primary m-2"><a class="text-light" href = "post.php?page=' . ($page + 1) . '">Next</a></li>';
    }
    echo '</ul>
            </nav>
            ';
}
?>

<?php include_once "footer.php" ?>