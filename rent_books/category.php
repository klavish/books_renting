<?php

include_once 'database.php';

class Category
{

    public function addCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $date_added = date('Y-m-d H:i:s');
            $date_updated = date('Y-m-d H:i:s');
            $insert_data = [
                'category' => $_POST['category'],
                'date_added' =>  $date_added,
                'date_updated' => $date_updated
            ];

            $obj1 = new Database();
            $obj1->insert('categories', $insert_data);
            header('Location:dashboard.php');
        }
    }


    public function updateCategory()
    {
        if (isset($_POST['update'])) {
            $categoryid = $_POST['categoryId'];
            $date_updated = date('Y-m-d H:i:s');
            $update_data = [
                'category' => $_POST['category'],
                'date_updated' => $date_updated
            ];
            $object = new Database();
            $object->selectId("select categoryId from books where Id = '$categoryid'");
            $resultingId = $object->getResult();
            if (!$resultingId) {
                $object->update('categories', $update_data, "categoryId = '$categoryid'");
                header('Location:dashboard.php');
            }
        }   echo "Did not get Id";

    }


    public function deleteCategory()
    {
        if (isset($_GET['categoryId'])) {
            $cid = $_GET['categoryId'];
            $dbobj = new Database();
            $dbobj->selectId("select categoryId from categories where categoryId='$cid'");
        }

        if (isset($_POST['categoryId'])) {
            $categoryid = $_POST['categoryId'];
            $dbobject = new Database();
            $dbobject->selectId("select categoryId from books where categoryId='$categoryid'");
            $categoryId = $dbobject->getResult();
            if (!$categoryId) {
            $dbobject->delete('categories', "categoryId = '$categoryid'");
            header('Location:dashboard.php');
            }
        }  echo "You cannot delete this category";
        
    }
}
