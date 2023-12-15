<?php


class RentCalculation{
     
    /**
     * This function will calculate Total rent amount using parameters 
     * @param $rentPerDay
     * @param $finePerDay
     * @param $daysKept
     * @param $dueDate
     * @param $returnDate
     * @return int
     */
    function calculateRentAndFine($rentPerDay, $finePerDay, $daysKept, $dueDate, $returnDate)
    {
        # it will find initial rent
        $initialRent = $rentPerDay * $daysKept;
    
        # it will check if the book returned late
        $overdueDays = max(0, strtotime($returnDate) - strtotime($dueDate)) / (60 * 60 * 24);
        $fine = ($overdueDays > 0) ? ($finePerDay * $overdueDays) : 0;
    
        # it calculate total amount
        $totalAmount = $initialRent + $fine;
       return $totalAmount;
    }
    
}

?>