<?php
session_start();
require_once 'validations.php';
//require_once 'user.php';
require_once 'database.php';


if (isset($_POST['login'])) {
    $validate = new UserValidate($_POST);
    $validate->validateLoginData(); 
    if(empty($errors)){    
       
        $email = $_POST['email'];
        $password = $_POST['password'];
        $ob = new Database();
        $ob->sql("select * from user_register where email='{$email}'");
        $res = $ob->getResult();
        print_r($res);
        $_SESSION['loginUser'] = $res;
        header("Location:dasboard.php");
        }
        exit;
    }
    
?>