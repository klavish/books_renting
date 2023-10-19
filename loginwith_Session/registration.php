<?php require 'regvalidation.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="./dist/output.css">
</head>
<body class="w-full h-full flex flex-col  justify-center items-center">
   
        <form class="bg-slate-100 flex flex-col justify-center px-4 py-6 w-1/3  space-y-3"  name="registeration" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h1 class="font-semibold text-xl text-center">Registeration Form</h1>
        <label for="name" class="text-sm font-medium">Name<span class="text-red-600">*</span></label>
        <div>
            <input type="text" name="name" class="border rounded-md w-full px-4 py-2 text-sm" placeholder="Enter Name">
            <span class="text-sm text-red-600"><?php echo $nameErr; ?></span>
        </div>
        <label for="email" class="text-sm font-medium">E-mail <span class="text-red-600">*</span> </label>
        <div>
            <input type="text" name="email" class="border rounded-md w-full px-4 py-2 text-sm" placeholder="Enter Email">
            <span class="text-sm text-red-600"><?php echo $emailErr ?></span>
        </div>

        <label for="phone" class="text-sm font-medium">Phone <span class="text-red-600">*</span> </label>
        <div>
            <input type="number" name="phone" class="border rounded-md w-full px-4 py-2 text-sm" placeholder="Enter Phone Number">
            <span class="text-sm text-red-600"><?php echo $phoneErr; ?></span>
        </div>

        <label for="password" class="text-sm font-medium">Password <span class="text-red-600">*</span> </label>
        <div>
            <input type="password" name="password" class="border rounded-md w-full px-4 py-2 text-sm mb-2" placeholder="Enter Password">
            <span class="text-sm text-red-600"><?php echo $passwordErr; ?></span>
        </div>
        <button type="submit" name="submit" value="submit" class="bg-blue-800 text-white w-full  px-4 py-2  rounded-md">SignUp</button>
        </form>
        <footer>
            <p class="text-lg">Already a user? <a href="./login.php" class="text-blue-800 font-medium">Login here</a></p>
        </footer>
   
</body>
</html>