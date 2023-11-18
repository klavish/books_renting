<?php 
require 'loginhandler.php';

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="../dist/output.css">

</head>
<body class="w-full h-full flex flex-col  justify-center items-center">
    <h1 class="font-semibold text-xl text-center">Login Form</h1>
    <form class="bg-slate-100 flex flex-col justify-center px-4 py-6 w-1/3  space-y-3" name="login"  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
     
        <label for="email" name="email" class="text-sm font-medium">Email <span class="text-red-600">*</span></label>
        <div>
            <input class="border rounded-md w-full px-4 py-2 text-sm" type="text" name="email" id="email" placeholder="Enter your email">
            <span class="text-sm text-red-600"><?php echo $errors['email'] ?? ''; ?></span>
        </div>
        <label for="password" class="text-sm font-medium">Password <span class="text-red-600">*</span> </label>
        <div>
            <input type="password" name="password" class="border rounded-md w-full px-4 py-2 text-sm mb-2" placeholder="Enter Password">
            <span class="text-sm text-red-600"><?php echo $errors['password'] ?? ''; ?></span>
        </div>
        <button type="submit" name="login" value="login" class="bg-blue-800 text-white w-full  px-4 py-2  rounded-md">Login</button>
    
    </form>
</body>
</html>