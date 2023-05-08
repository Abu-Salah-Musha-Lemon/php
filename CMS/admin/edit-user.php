<?php
include_once("header.php");
include_once("config.php");
$id = $_GET['editId'];
$sql = "SELECT * FROM `usertable` WHERE `userId` = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$firstName = $row["firstName"];
$lastName = $row["lastName"];
$email = $row["email"];
$userName = $row["userName"];
//$pass = md5($row["pass"]);
$role =  $row["role"];
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


   $sql = "UPDATE `usertable` SET `firstName`='$firstName',`lastName`='$lastName',`userName`='$userName',`password`='$pass',`role`='$role',`email`='$email' WHERE $id = 'id'";
  $result = mysqli_query($conn, $sql) or die("query not exist");
}
?>

<div class="container my-5">
  <form class="shadow-sm p-3 mb-5 bg-white rounded"  method="POST">
    <h2>Updat Data</h2>
    <div class="form-group">
      <label for="">First Name</label>
      <input type="text" class="form-control" name="firstName" placeholder="First Name" value="<?php echo $firstName;?>">
    </div>


    <div class="form-group">
      <label for="">Last Name</label>
      <input type="text" class="form-control" name="lasttName" placeholder="last Name" value="<?php echo $lastName;?>">
    </div>


    <div class="form-group">
      <label for="">User Name</label>
      <input type="text" class="form-control" name="userName" placeholder="User Name" value="<?php echo $userName;?>">
    </div>

    <div class="form-group">
      <label for="">Email</label>
      <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $email;?>">
    </div>

<!-- 
    <div class="form-group">
      <label for="">Password</label>
      <input type="password" class="form-control" name="pass" value="<?php echo $email;?>" required>
    </div><br> -->
    <div class="form-group form-inlinere">
      <label class="my-1 mr-2">User Role</label>
      <select class="custom-select my-1 mr-sm-2">
      <?php
        if ($row['role']==1) {
          echo' 
          <option value="0" selected >Admin</option>
          <option value="1" >Member</option>';
        } else {
          echo' 
          <option value="0" >Admin</option>
          <option value="1" selected >Member</option>';
        }?>
      </select>
    </div><br>
    <input type="submit" value="Update" name="save" class="btn btn-primary">

  </form>
</div>
<?php
include_once("footer.php");

?>