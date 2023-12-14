<?php
include_once 'database.php';

class User
{

    public function addUser($data)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $insert_data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                'gender' => $_POST['gender'],
                'address' => $_POST['address']
            ];

            $path = '../uploads/';
            $extension  = strtolower(pathinfo($_FILES['profile']['name'])['extension']);
            $file_name = pathinfo($_FILES['profile']['name'])['filename'] . "." . $extension;
            $display_name = $file_name;
            $unique_name  = uniqid() . "." .  $extension;
            $profile = (file_exists($_FILES['profile']['tmp_name'])) ? $file_name : null;
            $date_created = date('Y-m-d H:i:s');
            $date_modified = date('Y-m-d H:i:s');
            $email = $_POST['email'];
            $obj1 = new Database();
            $obj1->insert('users', $insert_data);

            $obj = new Database();
            $id  =  $obj->selectId("SELECT userId FROM users WHERE email = '$email'");
            $userId = $id;
            //echo $id;

            if ($obj1) {
                $img_data = [
                    'userId' => $userId,
                    'unique_name' => $unique_name,
                    'display_name' => $display_name,
                    'date_created' => $date_created,
                    'date_modified' => $date_modified
                ];
                $obj2 = new Database();
                $obj2->insertImage('image_file', $img_data);
            }

            if ($obj2) {
                if (!is_null($profile)) {
                    move_uploaded_file($_FILES['profile']['tmp_name'],  $path . $unique_name);
                    header("location:user_login.php");
                }
            } else {
                echo "Something went wrong!";
                header("refresh:3;url:user_registration.php");
            }
        }
    }


    public function updateUser()
    {
        if (isset($_POST['update'])) {
            $id = $_POST['Id'];
            $update_data = [
                'name' =>  $_POST['name'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
                'password' => $_POST['password'],
                'gender' => $_POST['gender'],
                'address' => $_POST['address']

            ];

            $path = '../uploads/';
            $extension  = strtolower(pathinfo($_FILES['profile']['name'])['extension']);
            $file_name = pathinfo($_FILES['profile']['name'])['filename'] . "." . $extension;
            $unique_name  = uniqid() . "." .  $extension;
            $profile = (file_exists($_FILES['profile']['tmp_name'])) ? $file_name : $row['profile'];
            $date_modified = date('Y-m-d H:i:s');
            $display_name = $file_name;
            if ($id) {
                $object = new Database();
                $object->update('users', $update_data, "userId = '$id'");
            } else {
                header('Location:userpanel.php');
            }
            if ($object) {
                $img_data = [
                    'unique_name' => $unique_name,
                    'display_name' => $display_name,
                    'date_modified' => $date_modified
                ];
          

                $object1 = new Database();
                $object1->update('image_file', $img_data, "userId = '$id'");

                if ($object1) {
                    if (!is_null($profile)) {
                        move_uploaded_file($_FILES['profile']['tmp_name'],  $path . $unique_name);
                    }
                }
            }
        }
    }



    public function deleteUser()
    {
        if (isset($_GET['userId'])) {
            $uid = $_GET['userId'];
            $dbobj = new Database();
            $dbobj->selectId("select userId from users where Id='$uid'");
            
        }
      
        if (isset($_POST['userId'])) {
            $id = $_POST['userId'];
            $dbobject = new Database();
            //$bookId = $dbobject->selectId("select bookId from rentedbooks where userId = '$id'");
            // var_dump($bookId);
            //if(!$bookId){
            $dbobject->delete('image_file', "userId = $id");
            $dbobject->delete('users', "userId = $id");
            unset($_SESSION['loginUser']);
            header('Location:user_registration.php');
            //}
        } else {
            echo "You cannot delete this user.";
        }
    }
}
?>