<?php
include_once("config.php");
include_once("header.php");

?>

<div class="container my-5">
  <?php
  $id = $_GET["edit"];
  $sql = "SELECT * FROM usertable WHERE userId = $id";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
  ?>
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

        </div>
        <div class="form-group">
          <input type="submit" value="Update" name="update" class="btn btn-primary">
        </div>

      </form>
  <?php }
  } ?>
</div>
<?php
include_once("footer.php");

?>