<?php
include_once "header.php";
include_once "./admin/config.php";
?>
<!-- <div class="container-xl shadow-sm my-2">
    <form method="POST">
        <div class="row">
            <div class="col-3">
                <input type="text" class="form-control" placeholder="Search" name="search">
            </div>
            <div class=" col-3">
                <button type="submit" class="btn btn-primary" name="submit">Search</button>
            </div>
        </div>
    </form>
</div> -->
<div id="templatemo_content_wrapper">

    <div id="templatemo_content">
        <?php
        $limit = 3;
        if (isset($_POST['search'])) {
            $search = $_POST['searchInput'];
            $searchQuery = "SELECT post_table.`Post_ID`, post_table.`Post_Title`, post_table.`Post_Description`, post_table.`Post_Date`, post_table.`Post_Image`,  post_table.`Category`, post_table.`Author`, categorytable.CategoryName, `usertable`.`userName` FROM post_table LEFT JOIN categorytable ON post_table.`category`= categorytable.Category_ID LEFT JOIN usertable ON `post_table`.`Author` = usertable.userId  ORDER BY post_table.Post_ID DESC LIMIT {$limit} WHERE `Post_ID`= '$search' or `Post_Title`= '$search' or `Post_Description` = '$search' ";
          echo  $result = mysqli_query($conn, $searchQuery) or die("query faild");
            if (mysqli_num_rows($result)>0 ) {
                // foreach ($result as $row) { 
                    while($row = mysqli_fetch_assoc($result)){?>

                    <div class="post_section">
                        <span class="bottom"></span>

                        <h2><?php echo $row["Post_Title"]; ?></h2>

                        <strong>Date:</strong> <?php echo $row["Post_Date"]; ?> |
                        <!-- <strong>Author:<a href="author.php?author=<?php echo $row["Author"]; ?>"></strong> Michael -->

                        <img style="width: 400px; height: 150px" src="./admin/upload/<?php echo $row["Post_Image"]; ?>" alt="image 1" />

                        <p><?php echo $row["Post_Title"]; ?></p>

                    </div>
        <?php }
            }
        } ?>
    </div>


<div id="templatemo_sidebar_two">
    <div class="banner_250x200">
        <form class="form-inline d-flex" method="post">
            <input class="form-control mr-sm-2 shadow-none mx-2" type="search" value="<?php if (isset($_POST["searchInput"])) {
                                                                                            echo $_POST["searchInput"];
                                                                                        } ?>" name="searchInput" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0 shadow-none" name="search" type="submit">Search</button>
        </form>
    </div>
    <div class="cleaner_h40"></div>
    <div class="recent-post-container p-4 shadow-sm bg">
        <style>
            .bg {
                background-color: #F7FFE5;
            }

            .recent-post {
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
        <?php }
        } ?>
    </div>
</div>

</div>


<!--  run -->

<!-- <table class="table">

        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
            </tr>
        </thead>

        <tbody>
            <?php
            if (isset($_POST['submit'])) {
                $search = $_POST['search'];
                $searchQuery = "SELECT * FROM `post_table` WHERE `Post_ID`= '$search' or `Post_Title`= '$search' or `Post_Description` = '$search' ";
                $result = mysqli_query($conn, $searchQuery) or die("query faild");
                if (mysqli_num_rows($result) > 0) {
                    foreach ($result as $row) { ?>

                        <tr>
                            <th scope="row"><?php echo $row['Post_ID']; ?></th>
                            <td><?php echo $row["Post_Title"]; ?></td>
                            <td><?php echo $row["Post_Description"]; ?></td>
                        </tr><?php } ?>
                    <thead>


                    <?php
                } else {
                    echo "data is not found";
                } ?>
    </table> -->




<?php
            }
?>