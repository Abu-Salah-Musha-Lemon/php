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

  echo $sql = "SELECT UserName  FROM `usertable` WHERE `UserName`='{$userName}'";
  $result = mysqli_query($conn,$sql) or die("query not exist");

  if (mysqli_num_rows($result)) {
    echo" <p> User name already exists </p>";
  } else {
    $sql1 = "INSERT INTO `usertable`(`UserId`, `FirstName`, `LastName`, `UserName`, `Password`, `Role`) VALUES ('$firstName','$lastName','$userName','$pass','$role')";
    if (mysqli_query($conn,$sql1)) {
      header("Localhost:http://localhost/learnPhp/CMS/admin/add-user.php");
    }
  }
  

}
?>

<div class="container my-5">
      <form class="shadow-sm p-3 mb-5 bg-white rounded" action="<?php $_server
      ["PHP_SELF"];?>" method="POST">
        <h2>Add User</h2>
        <div class="form-group">
          <label for="">First Name</label>
          <input type="text" class="form-control" name="firstName" placeholder="First Name">
        </div>
      
        
        <div class="form-group">
          <label for="">Last Name</label>
          <input type="text" class="form-control" name="lasttName" placeholder="last Name">
        </div>
      
        
        <div class="form-group">
          <label for="">User Name</label>
          <input type="text" class="form-control" name="userName" placeholder="User Name">
        </div>
      
        
        <div class="form-group">
          <label for="">Password</label>
          <input type="password" class="form-control" name="pass" required>
        </div><br>
          <div class="form-group form-inlinere">
              <label class="my-1 mr-2" >User Role</label>
              <select class="custom-select my-1 mr-sm-2">
                <option selected>Choose...</option>
                <option value="1">Admin</option>
                <option value="2">Member</option>
                <option value="3">Three</option>
              </select>
          </div><br>
          <input type="submit" value="Save"name="save" class="btn btn-primary">

      </form>
</div>
<?php 
    include_once("footer.php");

?>
