<?php 
include_once("header.php");
include_once("connection.php");

// $sql ="SELECT * FROM student JOIN studentclass WHERE student.sclass = studentclass.cid"; 
$sql ="SELECT * FROM student"; 
$result = mysqli_query($conn,$sql) or die("query unsuccessfull");

?>
<div class="container shadow-none p-3 mb-5 bg-body-tertiary rounded">
 methode 001
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

 
    <?php  if($result) {
     while ($row = mysqli_fetch_assoc($result)) {
      $sid= $row['sid'];
      $sname= $row['sname'];
      $saddress= $row['saddress'];
      $ssubject= $row['ssubject'];
      $sclass= $row['sclass'];
      $sphone= $row['sphone'];
      echo'
      <tr>
          <td>'.$sid.'</td>
          <td>'.$sname.'</td>
          <td>'.$saddress.'</td>
          <td>'.$sclass.'</td>
          <td>'.$ssubject.'</td>
          <td>'.$sphone.'</td>
          

          <td>
            <button type="button" class="btn btn-warning">Edit</button>
            <button type="button" class="btn btn-danger">Delete <a href="/crud/delete.php"></a> </button>
          </td>
      </tr>
      '

     ;};
     
     
     }?>
    
        </tbody>
      </table>
<!-- 
 metode 002  this foment didnot work
<?php  if(mysqli_num_fields($result) > 0 ) {?>
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
          <?php 
          while ($row = mysqli_fetch_assoc($result)) {?>
                  <tr>
                      <td><?php echo $row['sid'];?></td>
                      <td><?php echo $row["saddress"];?></td>
                      <td><?php echo $row["sclass"];?></td>
                      <td><?php echo $row["sname"];?></td>
                    <td><?php echo $row["sclass"];?></td>
                      <td><?php echo $row["sphone"];?></td>

                      <td>
                        <button type="button" class="btn btn-warning">Edit</button>
                        <button type="button" class="btn btn-danger">Delete</button>
                      </td>
                  </tr>
          <?php }; ?>
        
        </tbody>
      </table>
  <?php };?> 
-->
</div>

<?php
include_once("footer.php");

?>