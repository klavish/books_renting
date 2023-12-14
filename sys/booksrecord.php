   <?php
  require_once 'database.php';
   ?>
   
   <!DOCTYPE html>
   <html lang="en">
   <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../dist/output.css">
   </head>
   <body>
   <!-- code for books record -->
        <section class="grid grid-flow-row w-full">
        <?php
             $db = new Database();
             $db->sql("select * from books");
             while($rows =  $db->getResult()){
            ?>
            <div class="space-y-4 justify-between w-full border ">
            <div class="flex justify-between font-semibold border-b  rounded-md items-center pl-6 gap-4 py-3 w-full">
                <p>Image</p>
                <p>Title</p>
                <p>Author</p>
                <p>Category</p>
                <p>Description</p>
                <p>Quantity</p>
                <p>Rent</p>
                <p>Date_Added</p>
                <p>Date_updated</p>
                <p>Status</p>
                <p>Action</p>
                </div>
                <?php 
                foreach($rows as $row):?>
             
                <div class="flex justify-between border-b rounded-md items-center pl-6 py-3 gap-6">
                    <img class="w-12 h-14 rounded-md" src="<?php echo '../uploads/'.$row['display_name']; ?>"/>
                    <p class="font-semibold"><?php echo $row['title'];?></p>
                    <p class="text-sm text-gray-700"><?php echo $row['author'];?></p>
                    <p class="text-sm"><?php echo $row['category'];?></p>
                    <p class="text-sm"><?php echo $row['description'];?></p>
                    <p class="text-sm"><?php echo $row['quantity'];?></p>
                    <p class="text-sm"><?php echo $row['price'];?></p>
                    <p class="text-sm pr-2"><?php echo $row['date_added'];?></p>
                    <p class="text-sm pr-2"><?php echo $row['date_updated'];?></p>
                    <p class="font-medium text-sm text-green-800 bg-emerald-100 rounded-xl px-2">Active</p>
                    <div class="flex">
                    <a class="border bg-blue-800 text-white text-sm  px-4 py-2 rounded-md" href="updatebook.php?bookId=<?php echo $row['bookId'];?>">edit</a>
                    <a class="border bg-blue-800 text-white text-sm  px-4 py-2 rounded-md" href="deletebook.php?bookId=<?php echo $row['bookId'];?>">delete</a>
                   </div>
                <?php  endforeach ?>
                <?php }?> 
            </div>
            

        </section> 
        </body>
   </html>