<?php

require_once 'database.php';
 ?>

    <li class="flex gap-2 justify-center items-center">
        <div class="relative">
            <a href="">
            <svg class="w-7 h-7   text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor">
                <path d="M220.61,60.16A6,6,0,0,0,216,58H53L47.83,29.5A14,14,0,0,0,34.05,18H16a6,6,0,0,0,0,12h18a2,2,0,0,1,2,1.64l25.51,140.3a21.93,21.93,0,0,0,6.24,11.77A26,26,0,1,0,105.89,190h52.22A26,26,0,1,0,180,178H83.17a10,10,0,0,1-9.84-8.21L69.73,150H188.1a22,22,0,0,0,21.65-18.06L221.9,65.07A6,6,0,0,0,220.61,60.16ZM98,204a14,14,0,1,1-14-14A14,14,0,0,1,98,204Zm96,0a14,14,0,1,1-14-14A14,14,0,0,1,194,204Zm3.94-74.21A10,10,0,0,1,188.1,138H67.55L55.19,70H208.81Z">
                </path>
            </svg>

            <span class="px-1 w-6 h-6 absolute -top-3 -right-1 flex items-center justify-center rounded-full   text-white"><?php //if (isset($_SESSION['loginUser']) && ($_SESSION['loginUser']['book'])) { // $object = new Database();
                                                                                                                                        //$object->sql("select count(bookId) from rent where userId =''"); 
                                                                                                                                        //}?></span>
        </div>
                                                                                                                                    </a>
        <!-- <span class="text-white text-lg">Cart</span> -->
    </li>
