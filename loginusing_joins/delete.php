<?php
require_once 'connection.php';
$id = $_GET['userId'];
$sql1 = "delete from user_reg where userId = $id";
$sql2 = "delete from img_file where userId=$id";
$res =$con->query($sql1); 
$res1 = $con->query($sql2);
header('location:register.php');

?>