<?php
include_once("header.php");
include_once("config.php");
if (isset($_POST["save"])) {
  include "config.php";
  $firstName=mysqli_real_escape_string($conn, $_POST["firstName"]);
  $lastName=mysqli_real_escape_string($conn,$_POST["lastName"]);
  $email=mysqli_real_escape_string($conn,$_POST["email"]);
  $userName=mysqli_real_escape_string($conn,$_POST["userName"]);
  $pass=mysqli_real_escape_string($conn,md5($_POST["pass"]) );
  $role=mysqli_real_escape_string($conn,$_POST["role"]);

  // $firstName = $_POST["firstName"];
  // $lastName = $_POST["lastName"];
  // $email = $_POST["email"];
  // $userName = $_POST["userName"];
  // $pass = md5($_POST["pass"]);
  // $role =  $_POST["role"];


   $sql = "SELECT userName  FROM `usertable` WHERE `userName`='{$userName}'";
  $result = mysqli_query($conn, $sql) or die("query not exist");

  if (mysqli_num_rows($result)>0) {
    echo " <p> User name already exists </p>";
  } else {
    $sql1 = "INSERT INTO `usertable`( `firstName`, `lastName`, `userName`, `password`, `role`, `email`) VALUES ('$firstName','$lastName','$userName','$pass','$role','$email')";
    if (mysqli_query($conn, $sql1)) {
      header("localhost:http://localhost/learnPhp/CMS/admin/user.php");
    }
  }
}
?>

<div class="container my-5">
  <form class="shadow-sm p-3 mb-5 bg-white rounded" action="<?php //$_SERVER["PHP_SELF"]?>"  method="POST">
    <h2>Add User</h2>
    <div class="form-group">
      <label for="">First Name</label>
      <input type="text" class="form-control" name="firstName" placeholder="First Name">
    </div>


    <div class="form-group">
      <label for="">Last Name</label>
      <input type="text" class="form-control" name="lastName" placeholder="last Name">
    </div>


    <div class="form-group">
      <label for="">User Name</label>
      <input type="text" class="form-control" name="userName" placeholder="User Name">
    </div>

    <div class="form-group">
      <label for="">Email</label>
      <input type="email" class="form-control" name="email" placeholder="Email">
    </div>


    <div class="form-group">
      <label for="">Password</label>
      <input type="password" class="form-control" name="pass" required>
    </div><br>
    <div class="form-group form-inlinere">
      <label class="my-1 mr-2">User Role</label>
      <select class="custom-select my-1 mr-sm-2" name="role">
        <option selected>Choose...</option>
        <option value="0" >Admin</option>
        <option value="1" >Member</option>
      </select>
    </div><br>
    <input type="submit" value="Save" name="save" class="btn btn-primary">

  </form>
</div>
<?php
include_once("footer.php");

?>