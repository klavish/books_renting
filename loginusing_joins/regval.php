<?php
 require_once 'connection.php';
$nameErr = $emailErr = $phoneErr = $passwordErr = $genderErr = $imageErr = "";
$name = $email = $phone = $password = $insert_data = $profile = "";

$sql = "select * from user_reg";
$result = $con->query($sql);
foreach($result as $val){
    $val['email'];
    $val['password'];
}

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

function validateImage(&$data){
    $allowed_types = array("jpg", "jpeg", "png");
    $extension  = strtolower(pathinfo($_FILES['profile']['name'])['extension']);
    if(!in_array($extension, $allowed_types)){
        return "Only JPG, JPEG, PNG files are allowed";
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
    $profile = $_FILES['profile'];
    if($imageErr = validateImage($profile)){
        $profile = '';
    }
    
}

if(isset($_POST['register'])){
    if ($nameErr == "" && $emailErr == "" && $phoneErr == "" && $passwordErr == "" && $genderErr == "" && $imageErr == "") {
        
        $insert_data = [
            $name = $_POST['name'],
            $email = $_POST['email'],
            $phone = $_POST['phone'],
            $password = $_POST['password'],
            $gender = $_POST['gender'],
            $profile = $_FILES['profile']
        ];
        $path = '../uploads/';
        $extension  = strtolower(pathinfo($_FILES['profile']['name'])['extension']);
        $file_name = pathinfo($_FILES['profile']['name'])['filename'] . "." . $extension ;
        $unique_name  = uniqid() . "." .  $extension;
        $profile = (file_exists($_FILES['profile']['tmp_name']))? $file_name:null;
        $date_created = date('Y-m-d H:i:s');
        $sql1 = "insert into user_reg(name,email,phone,password,gender) values('$name','$email','$phone','$password','$gender')";
        $sql2 ="insert into img_file(userId,unique_name,display_name,date_created,date_modified) values((SELECT userId from user_reg where email ='$email'),'$unique_name','$file_name','$date_created','$date_created')";
       
        // echo $sql1;
        // echo $sql2;
        if($con->query($sql1) === true && $con->query($sql2) === true){
            if(!is_null($profile)){
                move_uploaded_file($_FILES['profile']['tmp_name'],  $path.$unique_name);
            }
        }
        else{
            echo "Something went wrong!";
            header("refresh:3;url:register.php");
        }

    }
    
    
}


?>