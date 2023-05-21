<?php
include_once "config.php";


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


<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <form action="" method="post">
              <div class="mb-md-5 mt-md-4 pb-5">

                <h2 class="fw-bold mb-2 text-uppercase text-white">Login</h2>
                <p class="text-white-50 mb-5">Please enter your login and password!</p>

                <div class="form-outline form-white mb-4">
                  <input type="text" name="userName" class="form-control" />
                  <label class="form-label">User Name</label>
                </div>

                <div class="form-outline form-white mb-4">
                  <input type="password" name="pass" class="form-control" />
                  <label class="form-label">Password</label>
                </div>

                <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>

                <button type="submit" class="btn btn-primary btn-block mb-4 shadow-none" name="logIn">Log in</button>
                <?php
                if (isset($_POST['logIn'])) {
                  $userName = $_POST['userName'];
                  $pass = md5($_POST['pass']);
                  $role = $_POST['role'];
                  $sql = "SELECT  * FROM `usertable` WHERE `userName`='$userName' AND `password`='$pass'";

                  $result = mysqli_query($conn, $sql) or die("query faild");
                  if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                      session_start();
                      $_SESSION['userName'] = $row['userName'];
                      $_SESSION['userID'] = $row['userId'];
                      $_SESSION['role'] = $row['role'];
                      header("location:user.php");
                    }
                  } else {
                    echo ' <div class="alert alert-danger">
                      user Name and password is not match.
              </div>';
                  }
                }
                ?>
                <!-- <div class="d-flex justify-content-center text-center mt-4 pt-1">
                    <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                    <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                    <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                 </div> -->

                </div>
                <div>
                  <p class="mb-0">Don't have an account? <a href="#!" class="text-white-50 fw-bold">Sign Up</a>
                  </p>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 
<?php include_once "footer.php"; ?> -->