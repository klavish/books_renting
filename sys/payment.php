<?php

include_once 'database.php';
class Payment{
    public function makePayment()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
           $transactionDate = date('Y-m-d H:i:s');
           // $returnDate = date('Y-m-d H:i:s');

            $insert_data = [
                'userId'=> $_POST['userId'],
                'cardnumber' => $_POST['cardnumber'],
                'name_on_Card' => $_POST['name'],
                'expiryDate' => $_POST['expiryDate'],
                'cvv' => $_POST['cvv'],
                'amount' =>$_POST['amount'],
                'transactionDate' => $transactionDate
            ];
            $userId= $_POST['userId'];
            $recordInsert = new Database();
            $recordInsert->insert('payment', $insert_data);
            if($recordInsert){
                $recordInsert->sql("update payment set paymentStatus ='successful' where userId = '$userId'");
            }

        }
    }

       // Function to calculate rent and fine
       function calculateRentAndFine($rentPerDay, $finePerDay, $daysKept, $dueDate, $returnDate)
       {
           // Calculate initial rent
           $initialRent = $rentPerDay * $daysKept;
       
           // Check if the book was returned late
           $overdueDays = max(0, strtotime($returnDate) - strtotime($dueDate)) / (60 * 60 * 24);
           $fine = ($overdueDays > 0) ? ($finePerDay * $overdueDays) : 0;
       
           // Calculate total amount
           $totalAmount = $initialRent + $fine;
       
           return array(
               'initialRent' => $initialRent,
               'fine' => $fine,
               'totalAmount' => $totalAmount
           );
       }
       
       // Example usage
    //    $rentPerDay = 2; // Rent per day
    //    $finePerDay = 1; // Fine per day for late return
    //    $daysKept = 5; // Number of days the user kept the book
    //    $dueDate = '2023-01-10'; // Due date
    //    $returnDateOnTime = '2023-01-15'; // Return date on time
    //    $returnDateLate = '2023-01-20'; // Return date after due date
       
    //    $rentDetailsOnTime = calculateRentAndFine($rentPerDay, $finePerDay, $daysKept, $dueDate, $returnDateOnTime);
    //    $rentDetailsLate = calculateRentAndFine($rentPerDay, $finePerDay, $daysKept, $dueDate, $returnDateLate);
       
    //    // Display the results
    //    echo "Rent Details for On Time Return:<br>";
    //    echo "Initial Rent: $" . $rentDetailsOnTime['initialRent'] . "<br>";
    //    echo "Fine: $" . $rentDetailsOnTime['fine'] . "<br>";
    //    echo "Total Amount: $" . $rentDetailsOnTime['totalAmount'] . "<br>";
       
    //    echo "<br>";
       
    //    echo "Rent Details for Late Return:<br>";
    //    echo "Initial Rent: $" . $rentDetailsLate['initialRent'] . "<br>";
    //    echo "Fine: $" . $rentDetailsLate['fine'] . "<br>";
    //    echo "Total Amount: $" . $rentDetailsLate['totalAmount'] . "<br>";



}




?>