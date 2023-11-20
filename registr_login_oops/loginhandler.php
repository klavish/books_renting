<?php
session_start();
require_once 'validations.php';
//require_once 'user.php';
require_once 'database.php';


if (isset($_POST['login'])) {
    $validate = new UserValidate($_POST);
    $errors = $validate->validateLoginData();
    if(empty($errors)){    
       
        $email = $_POST['email'];
        $password = $_POST['password'];
        $ob = new Database();
        $ob->sql("select * from user_register where email='{$email}'");
        $res = $ob->getResult();
        foreach($res as $key=> $val){
            $val['email'];
            $val['password'];
        }
        $_SESSION['loginUser'] = $_POST;
        if($_SESSION['loginUser']['email'] == $val['email'] && $_SESSION['loginUser']['password'] == $val['password']){
            $_SESSION['loginUser'] = $res;
            header("Location:dasboard.php");
        }
        else{
            echo "Details not matched";
        }
    }
    }
    
?>