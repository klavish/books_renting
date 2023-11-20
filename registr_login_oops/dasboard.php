<?php
require_once 'loginhandler.php';
require_once 'database.php';
if(!isset($_SESSION['loginUser'])){
    header('location:login.php');
}

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <link rel="stylesheet" href="../dist/output.css">
</head>
<body class="bg-gray-50">
    <h1 class="font-medium text-xl">Logged In User</h1>
    <p class="font-medium text-lg">Welcome, user you have login successfully</p>
    <div class="bg-green-300 p-4">
       
        <ul class="flex justify-evenly font-medium text-base">
            <li>userId</li>
            <li>Name</li>
            <li>Email</li>
            <li>Phone</li>
            <li>Gender</li>
            <li>Action</li>
            
        </ul>
        <ul class="flex justify-evenly">
        <?php foreach($_SESSION['loginUser'] as $k=>$val):?>
            <li><?php echo $val['userId']; ?></li>
            <li><?php echo $val['name']; ?></li>
            <li><?php echo $val['email']; ?></li>
            <li><?php echo $val['phone']; ?></li>
            <li><?php echo $val['gender']; ?></li>
            <a href ="logout.php" class="border bg-blue-800 text-white text-sm px-4 py-2 rounded-md">Logout</a>
            <?php endforeach?>
        </ul>
       
    </div>

    <h2 class="font-medium text-xl">All Registered Users</h2>
        <?php
        $db = new Database();
         $db->sql("select * from user_register left join image_file on user_register.userId = image_file.userId");
        
        while($rows =  $db->getResult()){
         
         ?>
        <div class="border bg-gray-400 p-4"> 
            <?php 
             foreach($rows as $row):?>
             <ul class="flex justify-evenly  font-medium text-base">
                 <li>Name</li>
                 <li>Email</li>
                 <li>Phone</li>
                 <li>Gender</li>
                 <li>Profile</li>
                 <li>Date_created</li>
                 <li>Date_modified</li>
                 <li>Action</li>
             </ul> 
            
        <ul class="flex justify-evenly   text-base" >
                <li><?php echo $row['name'];?></li>
                <li><?php echo $row['email'];?></li>
                <li><?php echo $row['phone'];?></li>
                <li><?php echo $row['gender'];?></li>
                <li><img class="w-12 h-14 rounded-md" src="<?php echo '../uploads/'.$row['unique_name']; ?>"/></li>
                <li><?php echo $row['date_created'];?></li>
                <li><?php echo $row['date_modified'];?></li>
                <div class="mb-2">
                <a class="border bg-blue-800 text-white text-sm  px-4 py-2 rounded-md" href="update.php?userId=<?php echo $row['userId'];?>">edit</a>
                <a class="border bg-blue-800 text-white text-sm  px-4 py-2 rounded-md" href="delete.php?userId=<?php echo $row['userId'];?>">delete</a>
                </div>
            </ul>
         <?php   endforeach ?>
        </div> 
        <?php }?> 
       
</body>
</html>

