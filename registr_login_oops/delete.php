<?php
require_once 'user.php';

 #handle delete
 if (isset($_POST['delete'])) {
    $user=new User();
    $user->deleteUser();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete</title>
    <link rel="stylesheet" href="../dist/output.css">
</head>
<body class="w-full h-full flex flex-col  justify-center items-center">
    <h1 class="font-semibold text-xl text-center">Delete Form</h1>
        <form class="bg-slate-100 flex flex-col justify-center px-4 py-6 w-1/3  space-y-3"  name="delete"  method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div>
        <input type="hidden" name="userId" class="border rounded-md w-full px-4 py-2 text-sm" value="<?php  echo $_GET['userId'];?>">
        </div>
               
        <button type="submit" name="delete" class="bg-blue-800 text-white w-full  px-4 py-2  rounded-md">Delete</button>
     
       
    </form>

</body>
</html>
