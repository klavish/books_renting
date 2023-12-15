<?php

include_once 'database.php';

class Books
{

    public function addBook()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $path = '../uploads/';
            $extension  = strtolower(pathinfo($_FILES['image']['name'])['extension']);
            $file_name = pathinfo($_FILES['image']['name'])['filename'] . "." . $extension;
            $display_name = $file_name;
            $image = (file_exists($_FILES['image']['tmp_name'])) ? $file_name : null;
            $date_added = date('Y-m-d H:i:s');
            $date_updated = date('Y-m-d H:i:s');

            $insert_data = [
                'title' => $_POST['title'],
                'author' => $_POST['author'],
                'categoryId' => $_POST['category'],
                'description' => $_POST['description'],
                'quantity' => $_POST['quantity'],
                'price' => $_POST['price'],
                'fine' => $_POST['fine'],
                'display_name' => $display_name,
                'date_added' => $date_added,
                'date_updated' => $date_updated,
                'availableStatus'=> $_POST['availableStatus']
            ];

            $object = new Database();
            $object->insert('books', $insert_data);

            if ($object) {
                if (!is_null($image)) {
                    move_uploaded_file($_FILES['image']['tmp_name'],  $path . $display_name);
                    header('Location:dashboard.php');
                }
            } else {
                echo "Something went wrong!";
               
            }
        }
    }


    public function updateBook()
    {
        if (isset($_POST['update'])) {
            $id = $_POST['Id'];

            $path = '../uploads/';
            $extension  = strtolower(pathinfo($_FILES['image']['name'])['extension']);
            $file_name = pathinfo($_FILES['image']['name'])['filename'] . "." . $extension;
            $image = (file_exists($_FILES['image']['tmp_name'])) ? $file_name : $row['image'];
            $date_updated = date('Y-m-d H:i:s');
            $display_name = $file_name;

            $update_data = [
                'title' => $_POST['title'],
                'author' => $_POST['author'],
                'categoryId' => $_POST['category'],
                'description' => $_POST['description'],
                'quantity' => $_POST['quantity'],
                'price' => $_POST['price'],
                'fine' => $_POST['fine'],
                'display_name' => $display_name,
                'date_updated' => $date_updated,
                'availableStatus'=> $_POST['availableStatus']

            ];

            if ($id) {
                $object = new Database();
                $object->update('books', $update_data, "bookId = '$id'");
            } else {
                header('Location:dashboard.php');
            }

                if ($object) {
                    if (!is_null($image)) {
                        move_uploaded_file($_FILES['image']['tmp_name'],  $path . $display_name);
                    }
                }
            }
        }
    


    public function deleteBook()
    {
        if (isset($_GET['bookId'])) {
            $bookid = $_GET['bookId'];
            $dbobj = new Database();
            $dbobj->selectId("select bookId from books where Id='$bookid'");
            
        }

        if (isset($_POST['bookId'])) {
            $id = $_POST['bookId'];
            $dbobject = new Database();
            $dbobject->selectId("select bookId from rentedbooks where Id = '$id'");
            $bookId =$dbobject->getResult();
            if(!$bookId){
            $dbobject->delete('books', "bookId = $id");
            header('Location:addbook.php');
            }
        } 
        
        echo "You cannot delete this book.";
        
    }
}
?>