<?php
include_once "config.php";
// include_once "header.php";

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    
    <link href="../templatemo_style.css" rel="stylesheet" type="text/css" />
    <title>Admin</title>
</head>
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
  <div class="card mb-3 md-6 mt-2">
    <div class="row g-0 d-flex align-items-center">
      <div class="col-lg-4 d-none d-lg-flex">
        <!-- <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg" alt="Trendy Pants and Shoes"
          class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" /> -->
      </div>
      <div class="col-lg-8">
        <div class="card-body py-5 px-md-5">

          <form method="POST">
            <!-- Email input -->
            <div class="form-outline mb-4">
              <label class="form-label" >User Name</label>
              <input type="text"name ="userName"  class="form-control" />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <label class="form-label"  >Password</label>
              <input type="password" name ="pass" class="form-control" />
            </div>

              <div class="col">
                <!-- Simple link -->
                <a href="#!">Forgot password?</a>
              </div>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4 shadow-none" name="logIn">Log in</button>

          </form>
          <?php
            if (isset($_POST['logIn'])) {
              $userName =$_POST['userName'];
              $pass = md5($_POST['pass']);
              $role = $_POST['role'];
              $sql = "SELECT  * FROM `usertable` WHERE `userName`='$userName' AND `password`='$pass'";

              $result = mysqli_query($conn, $sql) or die("query faild");
              if(mysqli_num_rows($result)>0 ){
                while ($row = mysqli_fetch_assoc($result)) {
                  session_start();
                  $_SESSION['userName'] = $row ['userName'];
                  $_SESSION['userID'] = $row ['userId'];
                  $_SESSION['role'] = $row ['role'];
                  header("location:user.php");
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