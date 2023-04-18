<?php 
include_once("header.php");

?>
<div class="container shadow-sm p-3 mb-5 bg-white rounded ">

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">ID</label>
    <input type="number" class="form-control" id="ID" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Student Name</label>
    <input type="text" class="form-control" id="sname" aria-describedby="emailHelp">
  </div>
  <button type="button" class="btn btn-danger">Delete</button>
</div>

<?php
include_once("footer.php");

?>