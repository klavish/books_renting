<?php
session_start();
require_once 'validation.php';
require_once 'database.php';



if (isset($_POST['login'])) {
    $validate = new Validation($_POST);
    $errors = $validate->validate_Login_Details();
    if(empty($errors)){    
        $email = $_POST['email'];
        $password = $_POST['password'];
        $ob = new Database();
        $ob->sql("select * from users where email='{$email}'");
        $res = $ob->getResult();
        foreach($res as $key=> $val){
            $val['email'];
            $val['password'];
        }
    
        if($_POST['email'] == $val['email'] &&  password_verify(($_POST['password']),$val['password'])){
            $_SESSION['loginUser'] = $res;
            header('location:homepge.php');
            
        }
        else{
            echo "Details not matched";
        }
    }
}
    
?>