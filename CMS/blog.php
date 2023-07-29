<?php
include_once "./admin/config.php";
include_once "./header.php";
header("Refresh:3");
if (isset($_GET["blogId"])) {


    $post_id = $_GET["blogId"];
    $sql = "SELECT post_table.`Post_ID`, post_table.`Post_Title`, post_table.`Post_Description`, post_table.`Post_Date`, post_table.`Post_Image`,  post_table.`Category`, post_table.`Author`, categorytable.CategoryName, `usertable`.`userName` FROM post_table LEFT JOIN categorytable ON post_table.`category`= categorytable.Category_ID LEFT JOIN usertable ON `post_table`.`Author` = usertable.userId  WHERE post_table.`Post_ID` = {$post_id}";

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
?>


            <div id="templatemo_content_wrapper">

                <div id="templatemo_content">

                    <div class="post_section"><span class="bottom"></span>

                        <h2><a href="blog.php?blogId=<?php echo $row["Post_ID"] ?>" class="more"> <?php echo strtoupper($row["Post_Title"]); ?></a></h2>

                        <strong>Date:</strong> <?php echo $row["Post_Date"]; ?> | <a href="author.php?author=<?php echo $row["Author"]; ?>"><strong>Author:</strong> <?php echo $row["userName"]; ?></a>

                        <img style="width:420px; height: 340px;" src="./admin/upload/<?php echo $row["Post_Image"]; ?> " />

                        <p><?php echo $row["Post_Description"]; ?></p>
                        <div class="cleaner"></div>


                    </div>

                </div> <!-- end of content -->
                <!-- side Bar -->
                <?php include_once "sidebar.php"; ?>

                <div class="cleaner"></div>
            </div> <!-- end of content wrapper -->

<?php
        }
    }
}
?>
<div id="templatemo_footer_wrapper">
    <div id="templatemo_footer">

        Copyright © 2023 <a href="#">lemon</a> |

    </div> <!-- end of templatemo_copyright -->
</div> <!-- end of copyright wrapper -->

</body>

</html>