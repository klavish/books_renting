<?php
require_once 'validation.php';
require_once 'books_crud.php';



if(isset($_GET['bookId'])){
    $bid =  $_GET['bookId'];
    $object = new Database();
    $object->sql("select * from books left join categories on books.categoryId=categories.categoryId where bookId ='$bid'");
    $res = $object->getResult();
    foreach($res as $row){
    }
 
 }
#handle update form
if (isset($_POST['update'])) {
    echo "This is post bookId".$_POST['Id'];
    $validation = new Validation($_POST);
    $errors = $validation->validate_book_details();
    if (empty($errors)) {
        $book = new Books();
        $errors = $book->updateBook($_POST);
    }
}


//else{
//     echo "Did not get bookId";
    
// }

?>