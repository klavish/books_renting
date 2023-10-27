<?php
 require_once 'connection.php';
$nameErr = $emailErr = $phoneErr = $passwordErr = $genderErr = "";
$name = $email = $phone = $password = $insert_data = "";



function clean($data){
    $data = trim($data);//remove whitespace from both sides
    $data = stripslashes($data);//remove backslashes
    $data = htmlspecialchars($data);//convert to html entities

}

function validateName(&$data){
    clean($data);
    if(empty($data)){
    return 'Name cannot be empty';
    }elseif(strlen($data) < 3){
    return'Name must contain more than 3 characters';
    }elseif(strlen($data) > 20){
    return "Name cannot contain more than 20 characters";
    }elseif(!preg_match("/^[A-Za-z-'&@() ]*$/", $data)){
    return "*Only letters, white spaces and ('-', ''', '&', '@', '(', ')') are allowed";
    }

}

function validateEmail(&$data){
    clean($data);
    if(empty($data)){
        return "Email is required";
    }
    elseif(!filter_var($data,FILTER_VALIDATE_EMAIL)){
            return "Invalid email format please enter correct email address";
    }
}

function validatePhone(&$data){
    clean($data);
    if(empty($data)){
        return "Phone number cannnot be empty";
    }elseif(!filter_var($data, FILTER_VALIDATE_INT) || filter_var($data, FILTER_VALIDATE_INT) == 0){
        return "Phone number must be integer"; 
    }elseif(!preg_match("/^[0-9]{10}$/", $data)){
        return "Invalid phone number";
    }
}

function validatePassword(&$data){
    clean($data);
    if(empty($data)){
        return "Password cannnot be empty";
    }
    elseif(!preg_match("/^[A-Za-z0-9@#]*$/", $data)){
        return "Password must contain letters, numbers and special characters('@','#')";
    }elseif(strlen($data) < 8 || strlen($data) > 15){
        return "Password length must be between 8 - 15";
    }
}

function validateGender(&$data){
    clean($data);
    if (empty($_POST['gender'])) {
        return "Please select a gender";
    }
}

if(isset($_POST['register'])){

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

if(isset($_POST['register'])){
    if ($nameErr == "" && $emailErr == "" && $phoneErr == "" && $passwordErr == "" && $genderErr == "") {
        $insert_data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'password' => $_POST['password'],
            'gender' => $_POST['gender']
        ];
        $cols = implode(',', array_keys($insert_data));
        $vals = implode("','", array_values($insert_data));  
        $sql = "insert into registr($cols) values('$vals')";
        $res = $con->query($sql);

    }
    
    
}

?>