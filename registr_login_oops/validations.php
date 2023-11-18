<?php

 class UserValidate{
    private $data;
    private $errors = [];

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function validForm()
    {
        $this->validateName();
        $this->validateEmail();
        $this->validatePhone();
        $this->validatePassword();
        $this->validateGender();
        $this->validateProfile();
       

        return $this->errors;
    }

    private function clean(&$data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
    }

    private function validateName()
    {
        $name = $this->data['name'];
        // $name = $this->clean($uname);
        if(empty($name)){
            $this->addError('name', 'Name cannot be empty');
        }elseif(strlen($name) < 3){
            $this->addError('name', 'Name must contain more than 3 characters');
        }elseif(strlen($name) > 20){
            $this->addError('name',"Name cannot contain more than 20 characters");
        }elseif(!preg_match("/^[A-Za-z-'&@() ]*$/", $name)){
            $this->addError('name', "Only letters, white spaces and ('-', ''', '&', '@', '(', ')') are allowed");
            
        }
    }

    private function validateEmail()
    {
        $email = $this->data['email'];
        //$email = $this->clean($uemail);
        if (empty($email)) {
            $this->addError('email', 'Email is required.');
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->addError('email', 'Invalid email format.');
        }
    }

    private function validatePhone(){
        $phone = $this->data['phone'];
        //$phone = $this->clean($uphone);
        if(empty($phone)){
            $this->addError('phone', "Phone number cannnot be empty");
        }elseif(!filter_var($phone, FILTER_VALIDATE_INT) || filter_var($phone, FILTER_VALIDATE_INT) == 0){
            $this->addError('phone', "Phone number must be integer"); 
        }elseif(!preg_match("/^[0-9]{10}$/", $phone)){
            $this->addError('phone', "Invalid phone number");
        }
        
    }


    private function validatePassword(){
        $password = $this->data['password'];
        //$password = clean($upassword);
        if(empty($password)){
            $this->addError('password',"Password cannnot be empty");
        }
        elseif(!preg_match("/^[A-Za-z0-9@#]*$/", $password)){
            $this->addError('password',"Password must contain letters, numbers and special characters('@','#')");
        }elseif(strlen($password) < 8 || strlen($password) > 15){
            $this->addError('password',"Password length must be between 8 - 15");
        }
        
    }

    private function validateGender(){
        $gender = $this->data['gender'];

        if (empty($gender)) {
            $this->addError('gender', "Please select a gender");
        }
        
    }

    private function validateProfile() {
    if (!isset($_FILES['profile'])) {
        return "Profile picture is required.";
    }

    $profile = $_FILES['profile'];

    if ($profile['error'] !== UPLOAD_ERR_OK) {
        return "Error uploading profile picture.";
    }

    $allowed_types = array("jpg", "jpeg", "png");
    $extension = strtolower(pathinfo($profile['name'], PATHINFO_EXTENSION));

    if (!in_array($extension, $allowed_types)) {
        return "Only JPG, JPEG, PNG files are allowed.";
    }
    return null;  // Return null if validation passes
}


    private function addError($key, $message)
    {
        $this->errors[$key] = $message;
    }


    public function validateLoginData()
    {
        $this->validateEmail();
        $this->validatePassword();
        return $this->errors;
    }
   


}

?>