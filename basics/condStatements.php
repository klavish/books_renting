<?php
    #First question
        $x = 0;
    if ($x == 1)
        if ($x >= 0)
        print "true";
    else
        print "false";

    echo "<br>";
    //Result :-No output because condition is false so inner loop will not execute
   
   
    #Second question
    $x = 40;
    $y = 20;
    if ($x == $y) {
        echo "1";

    }elseif($x > $y) {
        echo  "2";
    } 
    else{
        echo  "3";
    }
    echo "<br>";
    //Result :-it will print 2 because value of $x is greater than $y so elseif condition will execute
    

    #Third question
    $color = "violet";
    switch ($color) {
    case "blue":
        echo "Hello";
        break;
    case "yellow":
        echo "W3docs";
        break;
    default:
        echo "None";

   } 
   
   //Result :- If color is neither blue or yellow then default case will be execute
?>
