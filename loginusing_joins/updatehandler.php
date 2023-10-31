<?php
session_start();
require_once 'connection.php';
require 'regval.php';


if(isset($_GET['userId'])){
    $uid = mysqli_real_escape_string($con, $_GET['userId']);
    $select_user = "select * from user_reg left join img_file on user_reg.userId = img_file.userId where Id='$uid'";
    $select_exec = $con->query($select_user);
    $user_data = $select_exec->fetch_object();
   
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
    $userid = $_POST['userId'];
    
    if ($nameErr == "" && $emailErr == "" && $phoneErr == "" && $passwordErr == "" && $genderErr == "" && $imageErr == "") {
        $update_data = [
            $name =  $_POST['name'],
            $email = $_POST['email'],
            $phone = $_POST['phone'],
            $password = $_POST['password'],
            $gender = $_POST['gender'],
            $profile = $_FILES['profile']
        ];
      
        $path = 'uploads/';
        $extension = strtolower(pathinfo($_FILES['profile']['name'],PATHINFO_EXTENSION));
        $file_name = pathinfo($_FILES['profile']['name'])['filename'] . "." . $extension;
        $unique_name = uniqid() . "." . $extension;
        $profile = (file_exists($_FILES['profile']['tmp_name']))? $file_name:null;
        $date_modified = date('Y-m-d H:i:s');
        $sql1 = "update user_reg set name='$name',email='$email',phone='$phone',password='$password',gender='$gender' where userId = $userid";
        $sql2 = "update img_file set unique_name='$unique_name',display_name='$file_name',date_modified='$date_modified' where userId = $userid";
        $res = $con->query($sql1) ;
    
        if($con->query($sql1) === true && $con->query($sql2) === true ){
            if(!is_null($profile)){
                move_uploaded_file($_FILES['profile']['tmp_name'],  $path.$unique_name);
            }
        }else{
            echo "Something went wrong!";
           
        }



    }
  
    
}

?>