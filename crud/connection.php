<?php
$conn = mysqli_connect("localhost","root","","crud") or die("connection faild");

// $sql ="SELECT * FROM student JOIN studentclass WHERE student.sclass = studentclass.cid"; 
$sql ="SELECT * FROM student"; 
$result = mysqli_query($conn,$sql) or die("query unsuccessfull");