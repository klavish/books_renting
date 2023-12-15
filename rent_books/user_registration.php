<?php
require_once 'validation.php';
require_once 'user.php';
if (isset($_POST['register'])) {
    $validation = new Validation($_POST);
    $errors = $validation->validate_user_details();
    if (empty($errors)) {
        $user = new User();
        $errors = $user->addUser($_POST);
    }
}

?>
<?php require('views/partials/head.php') ?>

<body class="w-full h-full flex flex-col  justify-center items-center">
    <h1 class="font-semibold text-xl text-center">User Registration Form</h1>
    <?php ?>
    <form class="bg-slate-100 flex flex-col justify-center px-4 py-6 w-1/2" name="registration" enctype="multipart/form-data" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <div class="grid grid-cols-2 gap-4">
            <label for="name" class="text-sm font-medium">Name<span class="text-red-600">*</span></label>
            <div>
                <input type="text" name="name" class="border rounded-md w-full px-4 py-2 text-sm" placeholder="Enter Name" value="<?php echo $_POST['name'] ?? ''; ?>">
                <span class="text-sm text-red-600"><?php echo $errors['name'] ?? ''; ?></span>
            </div>
            <label for="email" class="text-sm font-medium">E-mail <span class="text-red-600">*</span> </label>
            <div>
                <input type="text" name="email" class="border rounded-md w-full px-4 py-2 text-sm" placeholder="Enter Email" value="<?php echo $_POST['email'] ?? ''; ?>">
                <span class="text-sm text-red-600"><?php echo $errors['email'] ?? ''; ?></span>
            </div>

            <label for="phone" class="text-sm font-medium">Phone <span class="text-red-600">*</span> </label>
            <div>
                <input type="tel" name="phone" class="border rounded-md w-full px-4 py-2 text-sm" placeholder="Enter Phone Number" value="<?php echo $_POST['phone'] ?? ''; ?>">
                <span class="text-sm text-red-600"><?php echo $errors['phone'] ?? ''; ?></span>
            </div>

            <label for="password" class="text-sm font-medium">Password <span class="text-red-600">*</span> </label>
            <div>
                <input type="password" name="password" class="border rounded-md w-full px-4 py-2 text-sm mb-2" placeholder="Enter Password" value="<?php echo $_POST['password'] ?? ''; ?>">
                <span class="text-sm text-red-600"><?php echo $errors['password'] ?? ''; ?></span>
            </div>

            <label for="gender" class="text-sm font-medium">Gender<span class="text-red-600">*</span></label>
            <div class="flex flex-row gap-2 items-center">
                <input type="radio" name="gender" value="Male">Male
                <input type="radio" name="gender" value="Female">Female
                <input type="radio" name="gender" value="other">Other
                <span class="text-sm text-red-600"><?php echo $errors['gender'] ?? ''; ?></span>

            </div>


            <label for="address" class="text-sm font-medium">Address <span class="text-red-600">*</span> </label>
            <div>
                <textarea name="address" id="address" class="border rounded-md w-full px-4 py-2 text-sm mb-2" placeholder="Enter Address" rows="3" cols="15"><?php echo $_POST['address'] ?? ''; ?></textarea>
                <span class="text-sm text-red-600"><?php echo $errors['address'] ?? ''; ?></span>

            </div>

            <label for="profile" class="text-sm font-medium">Profile <span class="text-red-600">*</span> </label>
            <div class="pb-4">
                <input type="file" name="profile" id="profile">
                <span class="text-sm text-red-600"><?php echo $errors['profile'] ?? ''; ?></span>
            </div>
        </div>
        <button type="submit" name="register" id="register" class="bg-blue-800 text-white w-full  px-4 py-2  rounded-md">SignUp</button>

        <footer>
            <p class="text-lg font-normal text-center">Already a user? <a href="./user_login.php" class="text-blue-800 font-medium">Login here</a></p>
        </footer>


    </form>

</body>

</html>