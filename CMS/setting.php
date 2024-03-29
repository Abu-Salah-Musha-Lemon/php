<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<!-- <?php //header("refresh:2") 
        ?> -->
<div class="container">
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 ">
        <div class="panel panel-info shadow">
            <div class="panel-heading">
                <div class="panel-title"> <i class="bi bi-gear"> Setting</i></div>
            </div>

            <div style="padding-top:30px" class="panel-body">

                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>


                <?php
                include_once "./admin/config.php";

                $sql = "SELECT *FROM setting";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_assoc($result)) {

                ?>
                        <!-- form -->
                        <form action="save_setting.php" class="form-horizontal" role="form" enctype="multipart/form-data">
                            <!-- website Name -->
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="bi bi-window-sidebar"></i></span>
                                <input type="text" class="form-control" name="webName" value="<?php echo $row["webSiteName"] ?>" placeholder="Website Name">
                            </div>
                            <!-- footer name -->
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="text" class="form-control" name="footer" value="<?php echo $row["footer"] ?>" placeholder="Footer desc">
                            </div>
                            <!-- logo -->
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon">
                                    <i class="bi bi-file-earmark-image-fill"></i>
                                </span>
                                <input type="file" name="logo">
                                <input type="hidden" name="old_logo" value="<?php echo $row["logo"] ?>">
                            </div>


                            <div style="margin-top:10px" class="form-group">
                                <!-- Button -->

                                <div class="col-sm-12 controls">
                                    <button type="submit" name="update" class="btn btn-success">Update</button>
                                </div>
                            </div>

                        </form>

                <?php }
                } ?>



            </div>
        </div>
    </div>
    <!--   <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Sign Up</div>
                <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>
            </div>
            <div class="panel-body">
                <form id="signupform" class="form-horizontal" role="form">

                    <div id="signupalert" style="display:none" class="alert alert-danger">
                        <p>Error:</p>
                        <span></span>
                    </div>



                    <div class="form-group">
                        <label for="email" class="col-md-3 control-label">Email</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="email" placeholder="Email Address">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="firstname" class="col-md-3 control-label">First Name</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="firstname" placeholder="First Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-md-3 control-label">Last Name</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="lastname" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-md-3 control-label">Password</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="passwd" placeholder="Password">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="icode" class="col-md-3 control-label">Invitation Code</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="icode" placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                        Button
                        <div class="col-md-offset-3 col-md-9">
                            <button id="btn-signup" type="button" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Sign Up</button>
                            <span style="margin-left:8px;">or</span>
                        </div>
                    </div>

                    <div style="border-top: 1px solid #999; padding-top:20px" class="form-group">

                        <div class="col-md-offset-3 col-md-9">
                            <button id="btn-fbsignup" type="button" class="btn btn-primary"><i class="icon-facebook"></i>   Sign Up with Facebook</button>
                        </div>

                    </div>



                </form>
            </div>
        </div> -->




</div>
</div>