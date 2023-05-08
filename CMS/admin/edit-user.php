<?php
include_once("config.php");
include_once("header.php");

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

  $firstName=mysqli_real_escape_string($conn, $_POST["firstName"]);
  $lastName=mysqli_real_escape_string($conn,$_POST["lastName"]);
  $email=mysqli_real_escape_string($conn,$_POST["email"]);
  $userName=mysqli_real_escape_string($conn,$_POST["userName"]);
  $role=mysqli_real_escape_string($conn,$_POST["role"]);
  //$pass=mysqli_real_escape_string($conn,md5($_POST["pass"]) );

  // $firstName = $_POST["firstName"];
  // $lastName = $_POST["lastName"];
  // $email = $_POST["email"];
  // $userName = $_POST["userName"];
  // $role =  $_POST["role"];
  //$pass = md5($_POST["pass"]);


  $sql = "UPDATE `usertable` SET `firstName`='$firstName',`lastName`='$lastName',`userName`='$userName',`email`='$email',`role`='$role' WHERE $id = 'id'";
  $result = mysqli_query($conn, $sql) or die("query not exist");
  header("localhost:{$hostName}/admin/user.php");
}
?>

<div class="container my-5">
  <form class="shadow-sm p-3 mb-5 bg-white rounded" method="POST">
    <h2>Updat Data</h2>
    <div class="form-group">
      <label for="">First Name</label>
      <input type="text" class="form-control" name="firstName" placeholder="First Name" value="<?php echo $firstName; ?>">
    </div>


    <div class="form-group">
      <label for="">Last Name</label>
      <input type="text" class="form-control" name="lastName" placeholder="last Name" value="<?php echo $lastName; ?>">
    </div>


    <div class="form-group">
      <label for="">User Name</label>
      <input type="text" class="form-control" name="userName" placeholder="User Name" value="<?php echo $userName; ?>">
    </div>

    <div class="form-group">
      <label for="">Email</label>
      <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $email; ?>">
    </div>

    <!-- 
    <div class="form-group">
      <label for="">Password</label>
      <input type="password" class="form-control" name="pass" value="<?php echo $email; ?>" required>
    </div><br> -->
    <div class="form-group form-inlinere">
      <label class="my-1 mr-2">User Role</label>
      <select class="custom-select my-1 mr-sm-2" name="role" value="<?php echo $role; ?>">
        <?php
        if ($row['role'] == 1) {
          echo ' 
          <option value="0" selected >Admin</option>
          <option value="1" >Member</option>';
        } else {
          echo ' 
          <option value="0" >Admin</option>
          <option value="1" selected >Member</option>';
        } ?>
      </select><br>

      <input type="submit" value="Update" name="save" class="btn btn-primary">
    </div>
  </form>
</div>
<?php
include_once("footer.php");

?>