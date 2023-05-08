<?php
include_once("header.php");
include_once "config.php";
$delete = '';
$sql = "SELECT * FROM usertable";
$result = mysqli_query($conn, $sql) or die("query unsuccessfull");
?>


<div class="container">
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
      <?php if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {

          echo '
      <tr>
          <td>' . $row["userId"] . '</td>
          <td>' . $row["firstName"] . " " . $row["lastName"] . '</td>
          <td>' . $row["userName"] . '</td>
          <td>' . $row["email"] . '</td>
          <td>' . $row["role"] . '</td>
          <td> <a class="btn btn-primary text-light" href="./edit-user.php?editId=' . $row['userId'] . '" role="button">Edit</a></td>
          <td>
          <a class="btn btn-danger text-light" href="./delete.php?deleteId=' . $row['userId'] . '" role="button">Delete</a>
          </td>
      </tr>
      ';
        };
      } ?>

    </tbody>
  </table>
</div>

<?php
include_once("footer.php");

?>