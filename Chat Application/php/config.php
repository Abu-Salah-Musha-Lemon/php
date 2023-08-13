<?php
$con = mysqli_connect('localhost','root', "","chat");
if(!$con){
    echo "error";
}
session_start();
?>