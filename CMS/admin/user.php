<?php
include_once("header.php");
include_once "config.php";
// base64 is incerpted system.
if (isset($_GET['deleteId'])) {
  $delete = base64_decode($_GET['deleteId']);
  $sql = "DELETE FROM `usertable` WHERE `userId` = $delete";
  $result = mysqli_query($conn,$sql) or dir("faild to delte ");
}
?>

<div class="container">
  <?php
  $sql = "SELECT * FROM `usertable` ORDER BY`userId`DESC";
  $result = mysqli_query($conn, $sql) or die("query unsuccessfull");
  if (mysqli_num_rows($result) > 0) {
  ?>
    <table class="table table-striped">
      <h2>All User</h2>
      <a href="./add-user.php" type="button" class="btn btn-success text-white">Add User</a>
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Full Name</th>
          <th scope="col">User Name</th>
          <th scope="col">Email</th>
          <th scope="col">Role</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
              <td><?php echo $row["userId"]; ?></td>
              <td><?php echo $row["firstName"] . " " . $row["lastName"]; ?></td>
              <td><?php echo $row["userName"]; ?></td>
              <td><?php echo $row["email"]; ?></td>
              <td>
                <?php
                if ($row['role'] == 0) {
                  echo ' 
                   <option value="0" selected >Admin</option>';
                } else {
                  echo ' 
                 <option value="1" selected >Member</option>';
                } ?>
              </td>
              <td> <a class="btn btn-primary text-light" href="edit-user.php?edit=<?php echo base64_encode($row['userId']) ?>" role="button">Edit</a></td>
              <td>
                <a class="btn btn-danger text-light" href="user.php?deleteId=<?php echo base64_encode($row['userId']) ?>" role="button">Delete</a>
              </td>
            </tr>
        <?php
          };
        ?>

      </tbody>
    </table>
  <?php
  };
  ?>
</div>

<?php
include_once("footer.php");

?>