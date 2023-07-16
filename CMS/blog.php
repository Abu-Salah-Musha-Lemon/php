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

            <strong>Date:</strong> <?php echo $row["Post_Date"] ; ?> | <a href="author.php?author=<?php echo $row["Author"]; ?>"><strong>Author:</strong> <?php echo $row["userName"]; ?></a>

            <img style="width:420px; height: 340px;"src="./admin/upload/<?php echo $row["Post_Image"] ; ?> "/>

            <p><?php echo $row["Post_Description"]; ?></p>
            <div class="cleaner"></div>


        </div>

    </div> <!-- end of content -->

    <div id="templatemo_sidebar_two">
                <div class="banner_250x200">
                    <form class="form-inline  my-lg-0 d-flex" method="$_POST">
                        <input class="form-control mr-sm-2 shadow-none mx-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0 shadow-none" name="search" type="submit">Search</button>
                    </form>
                </div>

                <div class="cleaner_h40"></div>

                <div class="sidebar_two_box">

                    <h4>Useful Resources</h4>
                    <ul class="templatemo_list">
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