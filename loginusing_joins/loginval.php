<?php
session_start();
require 'regval.php';
require_once 'connection.php';


if(isset($_POST['login'])){

$email = $_POST['email'];
if($emailErr = validateEmail($email)){
    $email = '';
}

$password = $_POST['password'];
if($passwordErr = validatePassword($password)){
    $password = '';
}
}


if(isset($_POST['login'])){

$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['password']);

$sql = "SELECT * FROM user_reg WHERE email = '$email' AND password = '$password'";
$exec = $con->query($sql);
if($exec->num_rows > 0){
    $_SESSION['userlogin_data'] = $exec->fetch_object();
    header("location: dashboardpage.php");
 
}else{
    echo "Email or password is Invalid";
}
}


?>