<?php require('views/partials/head.php') ?>
<body class="w-full h-full flex flex-col  justify-center items-center">
    <h1 class="font-semibold text-xl text-center">Order Form</h1>
    <?php ?> 
        <form class="bg-slate-100 flex flex-col justify-center px-4 py-6 w-1/2"  name="order" enctype = "multipart/form-data" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="grid grid-cols-2 gap-4">
        <label for="userId" class="text-sm font-medium">UserId<span class="text-red-600">*</span></label>
        <div>
            <input type="text" name="userId" class="border rounded-md w-full px-4 py-2 text-sm" placeholder="Enter Name" value="<?php echo $_POST['name'] ?? ''; ?>">
        </div>
        <label for="bookId" class="text-sm font-medium">BookId<span class="text-red-600">*</span></label>
        <div>
            <input type="text" name="bookId" class="border rounded-md w-full px-4 py-2 text-sm" placeholder="Enter Name" value="<?php echo $_POST['name'] ?? ''; ?>">
        </div>
        <label for="categoryId" class="text-sm font-medium">CategoryId<span class="text-red-600">*</span></label>
        <div>
            <input type="text" name="categoryId" class="border rounded-md w-full px-4 py-2 text-sm" placeholder="Enter Name" value="<?php echo $_POST['name'] ?? ''; ?>">
           
        </div>
        <label for="name" class="text-sm font-medium">Name<span class="text-red-600">*</span></label>
        <div>
            <input type="text" name="name" class="border rounded-md w-full px-4 py-2 text-sm" placeholder="Enter Name" value="<?php echo $_POST['name'] ?? ''; ?>">
            
        </div>
        <label for="email" class="text-sm font-medium">E-mail <span class="text-red-600">*</span> </label>
        <div>
            <input type="text" name="email" class="border rounded-md w-full px-4 py-2 text-sm" placeholder="Enter Email" value="<?php echo $_POST['email'] ?? ''; ?>">
        </div>
        <label for="days" class="text-sm font-medium">Days <span class="text-red-600">*</span> </label>
        <div>
            <input type="text" name="days" class="border rounded-md w-full px-4 py-2 text-sm" placeholder="Enter Days" value="<?php echo $_POST['email'] ?? ''; ?>">
        </div>
       
        </div>
        <button type="submit" name="order" id="order" class="bg-blue-800 text-white w-full  px-4 py-2  rounded-md">Confirm Order</button>
    </form>

</body>
</html>