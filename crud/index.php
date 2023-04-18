<?php 
include_once("header.php");
$conn = mysqli_connect("localhost","root","","crud",3306) or die("connection faild");

  $sql ="SELECT * FROM student JOIN studentclass WHERE student.sclass = studentclass.cid"; 
  $result = mysqli_query($conn,$sql) or die("query unsuccessfull");

 // if(mysqli_num_rows($result) > 0) {

?>
<div class="container shadow-none p-3 mb-5 bg-body-tertiary rounded">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Class</th>
      <th scope="col">subject</th>
      <th scope="col">Phone</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php  while ($row = mysqli_fetch_assoc($result)) {?>
      <tr>
          <td><?php echo $row['sid'];?></td>
          <td><?php echo $row["sname"];?></td>
          <td><?php echo $row["saddress"];?></td>
          <td><?php echo $row["sclass"];?></td>
          <td><?php echo $row["sclass"];?></td>
          <td><?php echo $row["sphone"];?></td>

          <td>
            <button type="button" class="btn btn-warning">Edit</button>
            <button type="button" class="btn btn-danger">Delete</button>
          </td>
      </tr>
    <?php };?>
   
  </tbody>
</table>

<?php  //}?>
</div>

<?php
include_once("footer.php");

?>