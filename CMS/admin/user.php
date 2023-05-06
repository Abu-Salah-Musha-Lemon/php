<?php 
    include_once("header.php");
    include_once "config.php";

    $sql ="SELECT * FROM usertable"; 
    $result = mysqli_query($conn,$sql) or die("query unsuccessfull");
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
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  <?php  if($result) {
     while ($row = mysqli_fetch_assoc($result)) {
      $sid = $_POST["userID"];
      $firstName = $_POST["firstName"];
      $lastName = $_POST["lastName"];
      $email = $_POST["email"];
      $userName = $_POST["userName"];
      $pass = md5($_POST["pass"]);
      $role =  $_POST["role"];
      echo'
      <tr>
          <td>'.$sid.'</td>
          <td>'.$firstName.' '.$lastName.'</td>
          <td>'.$userName.'</td>
          <td>'.$email.'</td>
          <td>'.$role.'</td>
          <td><button type="button" class="btn btn-warning">Edit</button></td>
          <td>
            <button type="button" class="btn btn-danger">Delete <a href="/crud/delete.php"></a> </button>
          </td>
      </tr>
      '

     ;};
     
     
     }?>
  </tbody>
</table>
</div>

<?php 
    include_once("footer.php");

?>
