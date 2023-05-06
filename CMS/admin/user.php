<?php 
    include_once("header.php");

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
      <th scope="col">Role</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td><button type="button" class="btn btn-secondary">Edit</button></td>
      <td><button type="button" class="btn btn-danger">Delete</button></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td><button type="button" class="btn btn-secondary">Edit</button></td>
      <td><button type="button" class="btn btn-danger">Delete</button></td>
    </tr>
  </tbody>
</table>
</div>

<?php 
    include_once("footer.php");

?>
