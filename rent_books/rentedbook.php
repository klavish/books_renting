<?php

include_once 'database.php';

class RentedBook
{

    public function addrentedbook($data)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $rentDate = date('Y-m-d H:i:s');
            $days = $_POST['days'];
            $due_date = date('Y-m-d H:i:s', strtotime("+$days days"));
            $insert_data = [
                'userId'=>$_POST['userId'],
                'bookId'=>$_POST['bookId'],
                'categoryId'=>$_POST['categoryId'],
                'days'=>$_POST['days'],
                'price'=>$_POST['price'],
                'fine'=>$_POST['fine'],
                'rentDate'=> $rentDate,
                'dueDate'=>$due_date,
                'paymentStatus'=>'unpaid'  

            ]; 
            $bookId = $_POST['bookId'];
            $recordInserted = new Database();
            $recordInserted->insert('rentedbooks', $insert_data);

            if ($recordInserted) {
                $recordupdate = new Database();
                $recordupdate->sql("update books set quantity = quantity - 1 where bookId='$bookId'");
               header("location:home.php");
            }
        }
    }
    
    public function return_bookandmake_Payment($data)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $transactionDate = date('Y-m-d H:i:s');
            // $returnDate = date('Y-m-d H:i:s');
 
             $payment_data = [
                 'userId'=> $_POST['userId'],
                 'cardnumber' => $_POST['cardnumber'],
                 'name_on_Card' => $_POST['name'],
                 'email'=> $_POST['email'],
                 'expiryDate' => $_POST['expiryDate'],
                 'cvv' => $_POST['cvv'],
                 'amount' =>$_POST['amount'],
                 'transactionDate' => $transactionDate
             ];
               $userId= $_POST['userId'];

               $returnDate  = date('Y-m-d H:i:s');
           
                $returnedbook_data = [
                 'userId' => $userId,
                 'bookId' => $_POST['bookId'],
                 'categoryId' => $_POST['categoryId'],
                 'rentDate' => $_POST['rentDate'],
                 'dueDate' => $_POST['dueDate'],
                 'returnDate' => $returnDate,
                 'paymentStatus' => 'paid',
                ];
                $recordInsert = new Database();
                $recordInsert->insert('payment',  $payment_data);
                if($recordInsert){
                $recordInsert = new Database();
                $recordInsert->insert('returnedbooks',  $returnedbook_data);
                header("location:home.php");
            }
            
        }
    }

   
}
    
?>