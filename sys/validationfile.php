<?php
require_once 'database.php';
 class UserValidate{
    private $data;
    private $errors = [];

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function validate_registration_details()
    {
        $this->validateName();
        $this->validateEmail();
        $this->validatePhone();
        $this->validatePassword();
        $this->validateGender();
        $this->validateAddress();
        $this->validateProfile();
        $this->duplicateData();
        
       
        return $this->errors;
    }

    private function clean($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    private function validateName()
    {
        $name = $this->clean($this->data['name']);
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
        $email = $this->clean($this->data['email']);
        $this->duplicateData();
        if (empty($email)) {
            $this->addError('email', 'Email is required.');
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->addError('email', 'Invalid email format.');
        } 
       
    }

    private function validatePhone(){
        $phone = $this->clean($this->data['phone']);
    
        if(empty($phone)){
            $this->addError('phone', "Phone number cannnot be empty");
        }elseif(!filter_var($phone, FILTER_VALIDATE_INT) || filter_var($phone, FILTER_VALIDATE_INT) == 0){
            $this->addError('phone', "Phone number must be integer"); 
        }elseif(!preg_match("/^[0-9]{10}$/", $phone)){
            $this->addError('phone', "Invalid phone number");
        }
       
    }


    private function validatePassword(){
        $password = $this->clean($this->data['password']);
        $this->duplicateData();
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
        

        if (!isset($this->data['gender'])) {
            $this->addError('gender', "Please select a gender");
        }
        
    }

    private function validateAddress(){
        $address = $this->clean($this->data['address']);
     
        if(empty($address)){
            $this->addError('address',"Address cannnot be empty");
        }
        elseif(strlen($address) < 10 || strlen($address) > 40){
            $this->addError('address',"Address length must be between 10 - 40");
        }
        
        
    }


private function  validateProfile()
{
    if (!isset($_FILES['profile']['error']) || $_FILES['profile']['error'] == UPLOAD_ERR_NO_FILE) {
        $this->addError('profile',"Profile picture is required.");
    } else {
        $profile = $_FILES['profile'];
        $allowed_types = array("jpg", "jpeg", "png");
        $extension = strtolower(pathinfo($profile['name'], PATHINFO_EXTENSION));

        // if the uploaded file is an image
        if (!getimagesize($profile['tmp_name'])) {
            $this->addError('profile', "The uploaded file is not a valid image.");
        }

        // if the file extension is allowed
        elseif (!in_array($extension, $allowed_types)) {
            $this->addError('profile', "Only JPG, JPEG, PNG files are allowed.");
        }
    }

    // Return null if validation passes
    return null;
}


private function validate_login_Email()
{
    $email = $this->clean($this->data['email']);
    if (empty($email)) {
        $this->addError('email', 'Email is required.');
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $this->addError('email', 'Invalid email format.');
    }
}

private function validate_login_Password(){
    $password = $this->clean($this->data['password']);
    if(empty($password)){
        $this->addError('password',"Password cannnot be empty");
    }
    elseif(!preg_match("/^[A-Za-z0-9@#]*$/", $password)){
        $this->addError('password',"Password must contain letters, numbers and special characters('@','#')");
    }elseif(strlen($password) < 8 || strlen($password) > 15){
        $this->addError('password',"Password length must be between 8 - 15");
    }
    
}

public function validate_Login_Details()
{
    $this->validate_login_Email();
    $this->validate_login_Password();
    return $this->errors;
}

private function duplicateData(){
    $useremail = $this->data['email'];
    $db = new Database();
    $redundent_email = $db->selectId("select email from users where email = '$useremail'");
    if($redundent_email) {
        $this->addError('email', "This email has already taken");    
            
    }
    $userpass = $this->data['password'];
    $redundent_pass = $db->selectId("select password from users where password = '$userpass'");
    if($redundent_pass) {
        $this->addError('password', "This password has already taken");    
            
    }
}
    

public function validate_update_details()
{
    $this->validateName();
    $this->validateEmail();
    $this->validatePhone();
    $this->validatePassword();
    $this->validateGender();
    $this->validateAddress();
    $this->validateProfile();
    $this->duplicateData();
    return $this->errors;
}


private function addError($key, $message)
    {
        $this->errors[$key] = $message;
    }


}

?>