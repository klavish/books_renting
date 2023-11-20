<?php
session_start();
require_once 'validations.php';
include_once 'database.php';
require_once 'user.php';

#handle update form
if(isset($_POST['update'])){
    print_r($loguser = $_SESSION['loginUser']['userId']);
    echo "This is session userid ".$loguser;
    echo "this is post id ".$_POST['Id'];
    // $validation = new UserValidate($_POST);
    //  $errors = $validation->validupdateForm();
    //  if(empty($errors)){
    //  $user=new User();
    //  $user->updateUser($_POST);
    // }
}

if(isset($_GET['userId'])){
    $uid =  $_GET['userId'];
    $object = new Database();
    $object->sql("select * from user_register left join image_file on user_register.userId = image_file.userId where Id='$uid'");
    $res = $object->getResult();
    foreach($res as $row){

    }
  
}else{
    header('location:dasboard.php');
    
}


