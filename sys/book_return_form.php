<?php
session_start();
if (!isset($_SESSION['loginUser'])) {
    header('location:user_login.php');
}
?>
<?php
require_once 'database.php';
require_once 'validation.php';
require_once 'payment.php';
if (isset($_POST['payment'])) {
    $validation = new Validation($_POST);
    $errors = $validation->validate_payment_details();
    if (empty($errors)) {
        $payment = new Payment();
        $errors = $payment->makePayment($_POST);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>book return Page</title>
    <link href="../dist/output.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php require('views/partials/books_header.php'); ?>
    <main class="flex items-center justify-center  space-x-8 container p-6 mx-auto">
        <div class="flex flex-col flex-1  items-start">
            <?php $val = $_SESSION['loginUser'][0]['userId'];
            $db = new Database();
            $db->sql("select * from rentedbooks left join books on books.bookId=rentedbooks.bookId where userId = '$val'");
            while ($rows =  $db->getResult()) { ?>
                <?php foreach ($rows as $row) : ?>
                    <div class="w-full h-full ">
                        <img class="w-56 h-56  object-fill rounded-sm" src="<?php echo '../uploads/' . $row['display_name']; ?>">
                    </div>
                    <cite class="line-clamp-2 text-base font-medium"> <?php echo "Title :" . $row['title']; ?></cite>
                    <em class="text-sm font-medium "><?php echo "Author :" . " " . $row['author']; ?></em>


                <?php endforeach ?>
            <?php } ?>
        </div>
        <div class="flex flex-1 m-auto w-full">
            <form class="bg-slate-100 flex flex-col justify-center space-y-2 px-4 py-6 " name="bookreturn" enctype="multipart/form-data" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <h1 class="font-semibold text-lg text-center">Book Return </h1>
                <div class="grid grid-cols-2 gap-4">

                    <input type="hidden" name="userId" class="border rounded-md w-full px-4 py-2 text-sm" value="<?php $_row['userId'] ?? ''; ?>">


                    <label for="cardnumber" class="text-sm font-medium">Card Number<span class="text-red-600">*</span></label>
                    <div>
                        <input type="number" name="cardnumber" class="border rounded-md w-full px-4 py-2 text-sm" placeholder="Enter Card Number" required>
                    </div>

                    <label for="name" class="text-sm font-medium">Name on Card<span class="text-red-600">*</span></label>
                    <div>
                        <input type="text" name="name" class="border rounded-md w-full px-4 py-2 text-sm" placeholder="Enter Name on Card" required>
                    </div>
                    <label for="expiryDate" class="text-sm font-medium">Expiry Date<span class="text-red-600">*</span></label>
                    <div>
                        <input type="month" name="expiryDate" class="border rounded-md w-full px-4 py-2 text-sm" placeholder="Select Expiry date" required>
                    </div>

                    <label for="cvv" class="text-sm font-medium">CVV<span class="text-red-600">*</span></label>
                    <div>
                        <input type="number" name="cvv" class="border rounded-md w-full px-4 py-2 text-sm" placeholder="Enter CVV" required>
                    </div>

                    <label for="amount" class="text-sm font-medium">Amount<span class="text-red-600">*</span></label>
                    <div>
                        <input type="number" name="amount" class="border rounded-md w-full px-4 py-2 text-sm" placeholder="Enter Amount" required>
                    </div>

                </div>
                <button type="submit" name="payment" class=" text-white rounded-md bg-blue-700 w-full px-28 py-2 text-center">Pay</button>
            </form>

        </div>


    </main>

</body>

</html>