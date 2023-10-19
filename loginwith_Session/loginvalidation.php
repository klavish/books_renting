<?php
require 'regvalidation.php';

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
//get all emails
$allEmails = array_keys($_SESSION['regUser']);
  

//matching details
if(isset($_POST['login'])){
    if(!in_array($_POST['email'],$allEmails)){
        echo "Email not matched";
    }
    elseif(in_array($_POST['email'],$allEmails)){
            if($_SESSION['regUser'][$_POST['email']]['password'] == $_POST['password']){
                $_SESSION['loggedIn']=$_POST['email'];
                
                header("location: dashboard.php");
                
            }else{
                echo "Password not match";
                }
    }

}
?>