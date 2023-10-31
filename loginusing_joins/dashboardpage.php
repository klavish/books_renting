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
            <li><?php echo $_SESSION['userlogin_data']->userId; ?></li>     
            <li><?php echo $_SESSION['userlogin_data']->name; ?></li>
            <li><?php echo $_SESSION['userlogin_data']->email; ?></li>
            <li><?php echo $_SESSION['userlogin_data']->phone; ?></li>
            <li><?php echo $_SESSION['userlogin_data']->gender; ?></li>
            <a href ="logout.php" class="border bg-blue-800 text-white text-sm px-4 py-2 rounded-md">Logout</a>
        </ul>
        
    </div>

    <h2 class="font-medium text-xl">All Registered Users</h2>
        <?php
        $sql = "select * from user_reg left join img_file on user_reg.userId = img_file.userId";
        $exec = $con->query($sql);
        while($data = $exec->fetch_object()){
            $users[] = $data;
        }
         ?>
        <div class="border bg-gray-400 p-4">
            <?php $i=1;
            foreach($users as $user):?>
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
                <li><?php echo $user->name;?></li>
                <li><?php echo $user->email;?></li>
                <li><?php echo $user->phone;?></li>
                <li><?php echo $user->gender;?></li>
                <li><img class="w-12 h-14 rounded-md" src="<?php echo 'uploads/'.$user->unique_name; ?>"/></li>
                <li><?php echo $user->date_created;?></li>
                <li><?php echo $user->date_modified;?></li>
                <div class="mb-2">
                <a class="border bg-blue-800 text-white text-sm  px-4 py-2 rounded-md" href="update.php?userId=<?php echo $user->userId;?>">edit</a>
                <a class="border bg-blue-800 text-white text-sm  px-4 py-2 rounded-md" href="delete.php?userId=<?php echo $user->userId;?>">delete</a>
                </div>
            </ul>
         <?php $i++; endforeach ?>
        </div> 
       
</body>
</html>

