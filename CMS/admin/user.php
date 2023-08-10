<?php
include_once "config.php";
if ($_SESSION['role'] == 1) {
  header("localhost:http://localhost/learnPhp/CMS/admin/post.php");
}
include_once("header.php");
// base64 is incerpted system.
if (isset($_GET['deleteId'])) {
  $delete = base64_decode($_GET['deleteId']);
  $sql = "DELETE FROM `usertable` WHERE `userId` = $delete";
  $result = mysqli_query($conn, $sql) or dir("faild to delte ");
}
?>

<div class="container">
  <h2 class=" align-item-left md-5 mt-1">All User</h2>
  <!-- <a href="./add-user.php" type="button" class="btn btn-success text-white mb-2">Add User</a> -->
  <a href="./add-user.php" role="button"><i class="bi bi-person-add btn btn-success mb-2"></i></a>
  <?php
  $limit = 3;
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  } else {
    $page = 1;
  }

  $offset = ($page - 1) * $limit;
  $sql = "SELECT * FROM `usertable` ORDER BY`userId`DESC LIMIT {$offset},{$limit}";
  $result = mysqli_query($conn, $sql) or die("query unsuccessfull");
  if (mysqli_num_rows($result) > 0) {
  ?>
    <table class="table table-striped">
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
  <!-- pasitination -->
  <?php
  $sql = "SELECT * FROM `usertable`";
  $result = mysqli_query($conn, $sql) or die("query unsuccessfull");
  if (mysqli_num_rows($result) > 0) {
    $total_record = mysqli_num_rows($result);
    // $limit = 3;
    $total_page = ceil($total_record / $limit);
    echo '<ul class="pagination admin-pagination">';

    if ($page > 1) {
      echo ' <li class=" btn btn-primary m-2"><a class="text-light" href ="user.php?page=' . ($page - 1) . '">Prev</a></li>';
    }
    for ($i = 1; $i < $total_record; $i++) {
      if ($i == $page) {
        $active = "active";
      } else {
        $active = "";
      }

      echo ' <li class="' . $active . ' btn btn-primary m-2  "><a class="text-light" href="user.php?page=' . $i . '">' . $i . '</a></li>';
    }
    if ($total_page > $page) {
      echo ' <li class=" btn btn-primary m-2"><a class="text-light" href = "user.php?page=' . ($page + 1) . '">Next</a></li>';
    }
    echo '</ul>';
  }
  ?>


</div>

<?php
include_once("footer.php");

?>