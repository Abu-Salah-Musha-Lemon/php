<?php 
include_once("header.php");
include_once("connection.php");
 
$sql ="SELECT * FROM studentclass"; 
$result = mysqli_query($conn,$sql) or die("query unsuccessfull");

?>
<div class="container ">
<form class="shadow-sm p-3 mb-5 bg-white rounded" action="savedata.php" method="$_POST">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Student Name</label>
      <input type="text" class="form-control" id="sname"name="sname" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Address</label>
      <input type="text" class="form-control" name="saddress" aria-describedby="emailHelp">
    </div>
    
    <div class="input-group mb-3">
        <div class="input-group-append">
          <label class="input-group-text" for="inputGroupSelect02">Class</label>
        </div>
        <select class="custom-select" id="inputGroupSelect02">
          <option selected>Choose...</option>
          <?php while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <option value="<?php echo $row["cid"];?>"><?php echo $row["cname"];?></option>
          <?php  };?>
        </select>

    </div>

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Subject</label>
      <input type="text" class="form-control" name="ssubject" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Phone</label>
      <input type="number" class="form-control" name="sphone" aria-describedby="emailHelp">
    </div>
    <button type="submit" class="btn btn-primary" name="ssubmit">Submit</button>
</form>
</div>

<?php
include_once("footer.php");

?>