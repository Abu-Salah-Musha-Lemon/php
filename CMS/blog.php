<?php
include_once "./admin/config.php";
include_once "./header.php";
header("Refresh:3");
$post_id = $_GET["blogId"];
$sql = "SELECT post_table.`Post_ID`, post_table.`Post_Title`, post_table.`Post_Description`, post_table.`Post_Date`, post_table.`Post_Image`,  post_table.`Category`, post_table.`Author`, categorytable.CategoryName, `usertable`.`userName` FROM post_table LEFT JOIN categorytable ON post_table.`category`= categorytable.Category_ID LEFT JOIN usertable ON `post_table`.`Author` = usertable.userId  WHERE post_table.`Post_ID` = {$post_id}";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
?>


<div id="templatemo_content_wrapper">

    <div id="templatemo_content">

        <div class="post_section"><span class="bottom"></span>

            <h2><?php echo $row["Post_Title"] ; ?> </h2>

            <strong>Date:</strong> <?php echo $row["Post_Date"] ; ?> | <strong>Author:<?php echo $row["userName"] ; ?></strong>

            <img style="width:420px; height: 340px;"src="./admin/upload/<?php echo $row["Post_Image"] ; ?> "/>

            <p><?php echo $row["Post_Description"]; ?></p>
            <div class="cleaner"></div>
            <!-- <div class="category">Category: <a href="#">Freebies</a>, <a href="#">Templates</a></div>
            <div class="cleaner"></div>

            <div class="comment_tab">
                5 Comments
            </div>

            <div id="comment_section">
                <ol class="comments first_level">

                    <li>
                        <div class="comment_box commentbox1">

                            <div class="gravatar">
                                <img src="images/avator1.png" alt="author 1" />
                            </div>

                            <div class="comment_text">
                                <div class="comment_author">Gates<span class="date">24 August 2048</span><span class="time">12:12 pm</span></div>
                                <p>Phasellus dictum ornare nulla ac laoreet. Phasellus mattis tellus eu risusLorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus dictum ornare nulla ac laoreet. Phasellus mattis tellus eu risus</p>
                                <div class="reply"><a href="#">Reply</a></div>
                            </div>
                            <div class="cleaner"></div>
                        </div>

                    </li>

                    <li>


                        <ol class="comments">

                            <li>
                                <div class="comment_box commentbox2">

                                    <div class="gravatar">
                                        <img src="images/avator2.png" alt="author 2" />
                                    </div>
                                    <div class="comment_text">
                                        <div class="comment_author">John<span class="date">25 August 2048</span><span class="time">11:44 am</span></div>
                                        <p>Donec eget lacus eros, et blandit odio. Maecenas et urna vitae sapien dictum dapibus. Aliquam id sem metus.</p>
                                        <div class="reply"><a href="#">Reply</a></div>
                                    </div>

                                    <div class="cleaner"></div>
                                </div>


                            </li>

                            <li>


                                <ol class="comments">

                                    <li>
                                        <div class="comment_box commentbox1">

                                            <div class="gravatar">
                                                <img src="images/avator1.png" alt="author 3" />
                                            </div>
                                            <div class="comment_text">
                                                <div class="comment_author">Michael<span class="date">26 August 2048</span><span class="time">12:06 pm</span></div>
                                                <p>Aliquam id sem metus. Aenean sapien felis, congue porttitor elementum quis, pretium sit amet urna.</p>
                                                <div class="reply"><a href="#">Reply</a></div>
                                            </div>

                                            <div class="cleaner"></div>
                                        </div>


                                    </li>

                                </ol>

                            </li>
                        </ol>

                    </li>

                    <li>
                        <div class="comment_box commentbox1">


                            <div class="gravatar">
                                <img src="images/avator2.png" alt="author 4" />
                            </div>
                            <div class="comment_text">
                                <div class="comment_author">Smith<span class="date">27 August 2048</span><span class="time">11:10 am</span></div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus dictum ornare nulla ac laoreet.</p>
                                <div class="reply"><a href="#">Reply</a></div>
                            </div>

                            <div class="cleaner"></div>
                        </div>


                    </li>

                    <li>
                        <div class="comment_box commentbox1">

                            <div class="gravatar">
                                <img src="images/avator1.png" alt="author 5" />
                            </div>
                            <div class="comment_text">
                                <div class="comment_author">Michael<span class="date">28 August 2048</span><span class="time">11:25 pm</span></div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur libero sapien, sollicitudin in pellentesque id, auctor id nisl.</p>
                                <div class="reply"><a href="#">Reply</a></div>
                            </div>

                            <div class="cleaner"></div>
                        </div>


                    </li>

                </ol>
            </div>

            <div id="comment_form">
                <h3>Leave A Comment</h3>

                <form action="#" method="post">
                    <div class="form_row">
                        <label>Name ( Required )</label><br />
                        <input type="text" name="name" />
                    </div>
                    <div class="form_row">
                        <label>Email ( Required, will not be published )</label><br />
                        <input type="text" name="name" />
                    </div>
                    <div class="form_row">
                        <label>Your comment</label><br />
                        <textarea name="comment" rows="" cols=""></textarea>
                    </div>

                    <input type="submit" name="Submit" value="Submit" class="submit_btn" />
                </form>

            </div> -->

        </div>

    </div> <!-- end of content -->

    <div id="templatemo_sidebar_one">

        <h4>Categories</h4>
        <ul class="templatemo_list">
            <li><a href="#">Curabitur sed</a></li>
            <li><a href="#">Praesent adipiscing</a></li>
            <li><a href="#">Duis sed justo</a></li>
            <li><a href="#">Mauris vulputate</a></li>
            <li><a href="#">Nam auctor</a></li>
            <li><a href="#">Aliquam quam</a></li>
        </ul>

        <div class="cleaner_h40"></div>

        <h4>Archives</h4>
        <ul class="templatemo_list">
            <li><a href="#">November 2048</a></li>
            <li><a href="#">October 2048</a></li>
            <li><a href="#">September 2048</a></li>
            <li><a href="#">August 2048</a></li>
            <li><a href="#">July 2048</a></li>
            <li><a href="#">June 2048</a></li>
            <li><a href="#">May 2048</a></li>
            <li><a href="#">April 2048</a></li>
            <li><a href="#">March 2048</a></li>
        </ul>

        <div class="cleaner_h40"></div>

        <h4>Recent Posts</h4>
        <div class="recent_comment_box">
            <a href="#">Lorem ipsum dolor si</a>
            <p>Maecenas tellus erat, dictum vel semper a, dapibus ac elit. Nunc rutrum pretium porta.</p>
        </div>

        <div class="recent_comment_box">
            <a href="#">Aenean feugiat mattis </a>
            <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p>
        </div>

        <div class="recent_comment_box">
            <a href="#"> Lacus enim id lacinia in</a>
            <p>Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus.</p>
        </div>

    </div>

    <div class="cleaner"></div>
</div> <!-- end of content wrapper -->

<?php
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