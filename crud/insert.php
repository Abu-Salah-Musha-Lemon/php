<?php 
include_once("header.php");
include_once("connection.php");

?>
<div class="container ">
<form class="shadow-sm p-3 mb-5 bg-white rounded">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Student Name</label>
    <input type="text" class="form-control" id="sname" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Address</label>
    <input type="text" class="form-control" id="saddress" aria-describedby="emailHelp">
  </div>
  
  <div class="input-group mb-3">
      <div class="input-group-append">
        <label class="input-group-text" for="inputGroupSelect02">Class</label>
      </div>
      <select class="custom-select" id="inputGroupSelect02">
        <option selected>Choose...</option>
        <option value="1">CSE</option>
        <option value="2">BBA</option>
        <option value="3">EEE</option>
      </select>

  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Subject</label>
    <input type="text" class="form-control" id="ssubject" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Phone</label>
    <input type="number" class="form-control" id="sphone" aria-describedby="emailHelp">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

<?php
include_once("footer.php");

?>