<?php

  include_once "config.php";
?>

<!-- Section: Design Block -->
<section class=" text-center text-lg-start">
  <style>
    .rounded-t-5 {
      border-top-left-radius: 0.5rem;
      border-top-right-radius: 0.5rem;
    }

    @media (min-width: 992px) {
      .rounded-tr-lg-0 {
        border-top-right-radius: 0;
      }

      .rounded-bl-lg-5 {
        border-bottom-left-radius: 0.5rem;
      }
    }
  </style>
  <div class="card mb-3 container md-5 mt-2">
    <div class="row g-0 d-flex align-items-center">
      <div class="col-lg-4 d-none d-lg-flex">
        <!-- <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg" alt="Trendy Pants and Shoes"
          class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" /> -->
      </div>
      <div class="col-lg-8">
        <div class="card-body py-5 px-md-5">

          <form method="post">
            <!-- Email input -->
            <div class="form-outline mb-4">
              <label class="form-label" name = "userName">User Name</label>
              <input type="text"  class="form-control" />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <label class="form-label"  name = "pass">Password</label>
              <input type="password"  class="form-control" />
            </div>

              <div class="col">
                <!-- Simple link -->
                <a href="#!">Forgot password?</a>
              </div>
            </div>

            <!-- Submit button -->
            <button type="button" class="btn btn-primary btn-block mb-4 shadow-none" name="logIn">Log in</button>

          </form>
          <?php
            if (isset($_POST['logIn'])) {
              $userName = mysqli_real_escape_string($conn,$_POST['userName']);
              $pass = md5($_POST['pass']);
              echo $sql = "SELECT `userId`, `userName`, `password`, `role`FROM `usertable` WHERE `userName`=$userName,`password`=$pass";
              die('quer faild');
              $result = mysqli_query($conn, $sql) or die("query faild");
              if(mysqli_num_rows($result)>0 ){
                while ($row = mysqli_fetch_assoc($result)) {
                  session_start();
                  $_SESSION['userName'] = $row ['userName'];
                  $_SESSION['userID'] = $row ['userID'];
                  $_SESSION['role'] = $row ['role'];
                  header("location:add-post.php");
                }
              }else{
                echo' <div class="alert alert-danger">
                      user Name and password is not match.
              </div>';
              }
            }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->


<?php include_once "footer.php";?>