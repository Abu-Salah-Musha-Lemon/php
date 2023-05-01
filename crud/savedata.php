<?php 
include_once("header.php");
include_once("connection.php");
if (isset($_POST['ssubmit'])) {
   
$stu_name = $_POST["sname"];
$stu_address = $_POST["saddress"];
$stu_class = $_POST["sclass"];
$stu_subject = $_POST["ssubject"];
$stu_phone = $_POST["sphone"];
// if(!empty($stu_name) && !empty($stu_address)&&!empty($stu_class) && !empty($stu_subject)&&!empty($stu_phone)){

$sql ="INSERT INTO `student`(sname,saddress,sclass, sphone, ssubject) VALUES ('$stu_name','$stu_address','$stu_class','$stu_phone','$stu_subject')"; 
$result = mysqli_query($conn,$sql) or die("query unsuccessfull");
// header("localhost: http://localhost/learnPhp/crud/index.php");

// mysqli_close($conn);
}else{ echo"error";}



?>