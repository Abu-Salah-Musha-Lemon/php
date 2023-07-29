
<!-- side Bar -->
<?php //include_once "search.php";
// header("Refresh:3");

?>
<div id="templatemo_sidebar_two">
    <div class="banner_250x200">
        <form class="form-inline  my-lg-0 d-flex" method="$_POST" action="./search.php">
            <input class="form-control mr-sm-2 shadow-none mx-2" type="search" name="search_input" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0 shadow-none" name="search" type="submit">Search</button>
        </form>
    </div>
</div>

<div id="templatemo_sidebar_two">
    <!-- <div class="cleaner_h40"></div> -->
    <div class="recent-post-container p-4 shadow-sm bg">
        <style>
            .bg{
                background-color: #F7FFE5;
            }
            .recent-post{
                background-color: #DDE6ED;
                border-radius: 2px;
            }
            .recent {
                border-left: 2px solid greenyellow;
                padding-left: 4px;
                border-bottom: 1px solid rgba(0, 0, 0, .09);
               

            }

            a {
                text-decoration: none;
            }

            .recent:hover {
                background-color: rgba(0, 0, 0, .09);
            }
        </style>
        <h4 class="recent">Recent Post</h4>
        <?php
        include_once "./admin/config.php";
        $limit = 3;
            $sql = "SELECT post_table.`Post_ID`, post_table.`Post_Title`, post_table.`Post_Description`, post_table.`Post_Date`, post_table.`Post_Image`,  post_table.`Category`, post_table.`Author`, categorytable.CategoryName, `usertable`.`userName` FROM post_table LEFT JOIN categorytable ON post_table.`category`= categorytable.Category_ID LEFT JOIN usertable ON `post_table`.`Author` = usertable.userId  ORDER BY post_table.Post_ID DESC LIMIT {$limit}";

        $result = mysqli_query($conn, $sql) or die("recent POst");
        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="recent-post d-flex flex-row shadow-sm my-2 p-2">
            <div>
                <a href="">
                    <img style="width:50px;height:50px;" src="./admin/upload/<?php echo $row["Post_Image"]; ?>" alt="" srcset="">
                </a>
            </div>
            <div class="post-content mx-2">
                <h5><a href="blog.php?blogId=<?php echo $row["Post_ID"] ?>" class="more"> <?php echo strtoupper($row["Post_Title"]); ?></a></h5>
                <span>
                    <i class="fa fa-tags"> <?php echo $row["Post_Date"]; ?></i>
                    <a href="author.php?author=<?php echo $row["Author"]; ?>">
                                <strong>Author:</strong> <?php echo $row["userName"]; ?></a>
                </span>
                <span>
                    <i class="fa-fa-calender"></i>
                </span>
                <a href="blog.php?blogId=<?php echo $row["Post_ID"] ?>" class="more">Read more ..</a>
            </div>
        </div>
        <?php }}?>
    </div>
</div>