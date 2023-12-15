<?php  
    require_once 'database.php';
    require 'booksvalidation.php';
    if(isset($_POST['insert'])){
       $validation = new BookValidate($_POST);
        $errors = $validation->validate_book_details();
        if(empty($errors)){
        $book=new Books();
        $errors = $book->updateBook($_POST);
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update book</title>
    <link rel="stylesheet" href="../dist/output.css">
</head>
<body class="w-full h-full flex flex-col  justify-center items-center">
    <h1 class="font-semibold text-xl text-center">Book Update Form</h1>
        <form class="bg-slate-100 flex flex-col justify-center px-4 py-6 w-1/3   space-y-4"  name="addbook" enctype = "multipart/form-data" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="grid grid-cols-2 gap-6">
        <label for="title" class="text-sm font-medium">Title<span class="text-red-600">*</span></label>
        <div>
            <input type="text" name="title" class="border rounded-md w-full px-4 py-2 text-sm" placeholder="Enter Title" value="<?php echo $row['title'];?>>
            <span class="text-sm text-red-600"><?php echo $errors['title'] ?? ''; ?></span>
        </div>
        <label for="author" class="text-sm font-medium">Author <span class="text-red-600">*</span> </label>
        <div>
            <input type="text" name="author" class="border rounded-md w-full px-4 py-2 text-sm" placeholder="Enter Author" value="<?php echo $row['author'];?>>
            <span class="text-sm text-red-600"><?php echo $errors['author'] ?? ''; ?></span>
        </div>

        <label for="category" class="text-sm font-medium">Category<span class="text-red-600">*</span> </label>
        <select class="flex flex-row gap-2 border rounded-md w-full px-4 py-2 text-sm" id="category">
            <option  value="Poetry" <?php if($row['category'] == 'Poetry'){echo 'Poetry';}?>>Poetry
            <option  value="Novel" <?php if($row['category'] == 'Novel'){echo 'Novel';}?>>Novel
            <option  value="Programming" <?php if($row['category'] == 'Programming'){echo 'Programming';}?>>Programming
            <option  value="History" <?php if($row['category'] == 'History'){echo 'History';}?>>History

            <div>
                <span class="text-sm text-red-600"><?php echo $errors['category'] ?? ''; ?></span>
            </div>
        </select>

        <label for="description" class="text-sm font-medium">Description<span class="text-red-600">*</span> </label>
        <div>
            <textarea name="description" id="description" class="border rounded-md w-full px-4 py-2 text-sm mb-2" placeholder="Enter Description" value="<?php echo $row['description'];?>"></textarea>
            <span class="text-sm text-red-600"><?php echo $errors['description'] ?? ''; ?></span>
        </div>

        <label for="quantity" class="text-sm font-medium">Quantity <span class="text-red-600">*</span> </label>
        <div>
            <input type="text" name="quantity" class="border rounded-md w-full px-4 py-2 text-sm" placeholder="Enter Quantity" value="<?php echo $row['quantity'];?>">
            <span class="text-sm text-red-600"><?php echo $errors['quantity'] ?? ''; ?></span>
        </div>

        <label for="price" class="text-sm font-medium">Price <span class="text-red-600">*</span> </label>
        <div>
            <input type="text" name="price" class="border rounded-md w-full px-4 py-2 text-sm" placeholder="Enter Price" value="<?php echo $row['price'];?>">
            <span class="text-sm text-red-600"><?php echo $errors['price'] ?? ''; ?></span>
        </div>

        <label for="image">Image</label>
        <img class="w-12 h-14 rounded-md" src="<?php  echo '../uploads/'.$row['display _name']; ?>"/>Uploaded Image
        <div>
        <input type="file" name="image" id="image">
        <span class="text-sm text-red-600"><?php echo $errors['image'] ?? ''; ?></span>
        </div>
        </div> 
        <button type="submit" name="update" id="update" class="bg-blue-800 text-white w-full  px-4 py-2  rounded-md">Update</button>
           
    </form>
       
</form>

</body>
</html>