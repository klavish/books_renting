 <?php
require 'loginval.php';
require_once 'connection.php';
if(!isset($_SESSION['userlogin_data'])){
    header('location:login.php');
}

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome</title>
    <link rel="stylesheet" href="./dist/output.css">
</head>
<body class="bg-gray-200">
    <h1 class="font-medium text-xl">Logged In User</h1>
    <p class="font-medium text-lg">Welcome, user you have login successfully</p>
    <div class="border-black p-4">
        
        <ul class="flex gap-6 font-medium text-base">
            <li>Id</li>
            <li>Name</li>
            <li>Email</li>
            <li>Phone</li>
            <li>Gender</li>
            <li>Action</li>
            
        </ul>
        <ul class="flex gap-1">
            <li><?php echo $_SESSION['userlogin_data']->id; ?></li>     
            <li><?php echo $_SESSION['userlogin_data']->name; ?></li>
            <li><?php echo $_SESSION['userlogin_data']->email; ?></li>
            <li><?php echo $_SESSION['userlogin_data']->phone; ?></li>
            <li><?php echo $_SESSION['userlogin_data']->gender; ?></li>
            <a href ="logout.php" class="border bg-blue-800 text-white text-sm px-2 py-2">Logout</a>
        </ul>
        
    </div>

    <h2 class="font-medium text-xl">All Registered Users</h2>
        <?php
        $sql = "select * from registr";
        $exec = $con->query($sql);
        while($data = $exec->fetch_object()){
            $users[] = $data;
        }
        
         ?>
        <div class="border p-4">
            <?php $i=1;
            foreach($users as $user):?>
            <ul class="flex gap-6 justify-stretch  font-medium text-base">
            <li>Name</li>
            <li>Email</li>
            <li>Phone</li>
            <li>Gender</li>
            <li>Action</li>
        </ul>
            
           <ul class="flex gap-4  text-base" >
                <li><?php echo $user->name?></li>
                <li><?php echo $user->email?></li>
                <li><?php echo $user->phone?></li>
                <li><?php echo $user->gender?></li>
                <a class="border bg-blue-800 text-white text-sm px-2 py-2" href="edit.php?userid=<?php echo $user->id;?>">edit</a>
                <a class="border bg-blue-800 text-white text-sm px-2 py-2" href="delete.php?id=<?php echo $user->id;?>">delete</a>
               
        </ul>
         <?php $i++; endforeach ?>
        </div> 
</body>
</html>

