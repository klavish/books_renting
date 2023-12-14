<?php   
session_start();
require_once 'validation.php';
require_once 'database.php';

if (isset($_POST['submit'])) {
    $validate = new Validation($_POST);
    $errors = $validate->validate_ForgotPassword_Details();
    if(empty($errors)){   
        $name = $_POST['name'];
        $email = $_POST['email'];
        
        $ob = new Database();
        $ob->sql("select * from users where email='{$email}'");
        $res = $ob->getResult();
        foreach($res as $key=> $val){
            $val['name'];
            $val['email'];
            
        }
    
        if($_POST['name'] == $val['name'] && ($_POST['email'] == $val['email'])){
            $_SESSION['resetPassword'] = $res;
            header('location:passwordResetmail.php');
        }
        else{
            echo "Details not matched";
        }
    }
}
    

class ForgotPass{
    public function resetPassword($data)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $insert_data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],

            ];

            $email = $_POST['email'];
            $obj1 = new Database();
            $obj1->insert('users', $insert_data);

            $obj = new Database();
            $id  =  $obj->selectId("SELECT userId FROM users WHERE email = '$email'");
            $userId = $id;
            //echo $id;

            
        }
    }

}

?>