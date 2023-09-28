<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./dist/output.css">
</head>

<body class="w-full h-full flex flex-col items-center justify-center">
    <?php
    // define variables and set to empty values
    $nameErr = $emailErr = $phoneErr = $passwordErr = $genderErr =  "";
    $name = $email = $phone = $password = $gender = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // validation for name
        if (empty($_POST['name'])) {
            $nameErr = 'Name is required';
        } else {
            $name = test_input($_POST['name']);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $nameErr = 'Only letters are allowed';
            }
            //check if name contains white spaces
            if (str_contains(' ', $name)) {
                $nameErr = 'White spaces are not allowed';
            }
        }

        // validation for email 
        if (empty($_POST['email'])) {
            $emailErr = 'Email is required';
        } else {
            $email = test_input($_POST['email']);

            // check if e-mail address is in well-format
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = 'Invalid email format';
            }
        }

        // validation for phone number 
        if (empty($_POST['phone'])) {
            $phoneErr = 'Phone Number is required';
        } else {
            $phone = test_input($_POST['phone']);
            
            if (strlen($phone) != 10) {
                $phoneErr = 'Phone number must have 10 digits.';
            }
        }

        // validation for password
        if (empty($_POST['password'])) {
            $passwordErr = 'Password is required';
        } else {
            $password = test_input($_POST['password']);

            $len = strlen($password);
            if ($len < 8 || $len > 10) {
                $passwordErr = 'Password should be of 8-10 digits';
            }
        }

        //validation for gender
        if (empty($_POST['gender'])) {
            $genderErr = "Please select a gender";
        } else {
            $gender = test_input($_POST['gender']);
        }
    }

    function test_input($data)
    {

        $data = trim($data); //remove whitespace from both sides
        $data = stripslashes($data); //remove backslashes
        $data = htmlspecialchars($data); //convert to html entities
        return $data;
    }
    ?>

    <form method="post" class="flex flex-col justify-center space-y-2 bg-slate-100 w-72 p-4" name="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="name" class="text-sm font-medium">Name<span class="text-red-600">*</span>
        </label>
        <div>
            <input type="text" name="name" class="border rounded-md w-full px-4 py-1" placeholder="Enter Name">
            <span class="text-sm text-red-600"><?php echo $nameErr; ?></span>
        </div>

        <label for="email" class="text-sm font-medium">E-mail <span class="text-red-600">*</span> </label>
        <div>
            <input type="text" name="email" class="border rounded-md w-full px-4 py-1" placeholder="Enter Email">
            <span class="text-sm text-red-600"><?php echo $emailErr ?></span>
        </div>

        <label for="phone" class="text-sm font-medium">Phone <span class="text-red-600">*</span> </label>
        <div>
            <input type="number" name="phone" class="border rounded-md w-full px-4 py-1" placeholder="Enter Phone Number">
            <span class="text-sm text-red-600"><?php echo $phoneErr; ?></span>
        </div>
        <label for="password" class="text-sm font-medium">Password <span class="text-red-600">*</span> </label>
        <div>
            <input type="password" name="password" class="border rounded-md w-full px-4 py-1" placeholder="Enter Password">
            <span class="text-sm text-red-600"><?php echo $passwordErr; ?></span>
        </div>


        <label for="gender" class="text-sm font-medium">Gender <span class="text-red-600">*</span> </label>
        <div class="space-x-6">
            <input type="radio" name="gender" value="male">Male
            <input type="radio" name="gender" value="female">Female
            <input type="radio" name="gender" value="other">Other
            <span class="text-sm text-red-600"><?php echo $genderErr; ?></span>
        </div>
        <button type="submit" value="submit" class="bg-blue-800 text-white px-4 py-2 rounded-md">Submit</button>
    </form>

    <?php

    if ($nameErr == "" && $emailErr == "" && $phoneErr == "" && $passwordErr == "" && $genderErr == "") {
        echo "Name:$name<br>";
        echo "Email:$email<br>";
        echo "Phone:$phone<br>";
        // echo "Password:$password<br>";
        echo "Gender:$gender";
    } 

    ?>


</body>

</html>