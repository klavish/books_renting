<?php
session_start();
require_once 'connection.php';
require 'regvalidation.php';


if(isset($_GET['userid'])){
    $uid = mysqli_real_escape_string($con, $_GET['userid']);
    $select_user = "select * from registr where id=$uid";
    $select_exec = $con->query($select_user);
    $user_data = $select_exec->fetch_object();
  
}
else{
   
    header('location:welcome.php');    
}

if(isset($_POST['update'])){

    $name = $_POST['name'];
    if($nameErr = validateName($name)){
        $name = '';
    }

    $email = $_POST['email'];
    if($emailErr = validateEmail($email)){
        $email = '';
    }

    $phone = $_POST['phone'];
    if($phoneErr = validatePhone($phone)){
        $phone = '';
    }

    $password = $_POST['password'];
    if($passwordErr = validatePassword($password)){
        $password = '';
    }

    $gender = $_POST['gender'];
    if($genderErr = validateGender($gender)){
        $gender = '';
    }
}

if(isset($_POST['update'])){
    if ($nameErr == "" && $emailErr == "" && $phoneErr == "" && $passwordErr == "" && $genderErr == "") {
        $update_data = [
            'name' =>mysqli_real_escape_string($con, $_POST['name']),
            'email' => mysqli_real_escape_string($con,$_POST['email']),
            'phone' => mysqli_real_escape_string($con,$_POST['phone']),
            'password' => mysqli_real_escape_string($con,$_POST['password']),
            'gender' => mysqli_real_escape_string($con,$_POST['gender'])
        ];
        $sql = " update registr set ";
        foreach($update_data as $key=>$value){
            $sql .= "$key = '$value',";
        }
        $sql = rtrim($sql,',');
        $sql .= " where id =".$uid;
        $exec = $con->query($sql);
        if($exec){
            header('location:register.php');
        }

    }
  
    
}

?>