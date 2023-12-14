<?php
require_once 'database.php';
class BookValidate
{
    private $data;
    private $errors = [];

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function validate_book_details()
    {
        $this->validate_book_title();
        $this->validate_book_author();
        $this->validate_book_category();
        $this->validate_book_description();
        $this->validate_book_quantity();
        $this->validate_book_Image();
        $this->validate_book_Price();
        $this->duplicateData();

        return $this->errors;
    }

    private function clean($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    private function validate_book_title()
    {
        $title = $this->clean($this->data['title']);
        if (empty($title)) {
            $this->addError('title', 'Title cannot be empty');
        } elseif (strlen($title) < 3) {
            $this->addError('title', 'Title must contain more than 3 characters');
        } elseif (strlen($title) > 40) {
            $this->addError('title', "Title cannot contain more than 40 characters");
        } elseif (!preg_match("/^[A-Za-z-'(), ]*$/", $title)) {
            $this->addError('title', "Only letters, white spaces and ('-', ''', '(', ')', ',') are allowed");
        }
        $this->duplicateData();
    }

    private function validate_book_author()
    {
        $author = $this->clean($this->data['author']);
        if (empty($author)) {
            $this->addError('author', 'Author cannot be empty');
        } elseif (strlen($author) < 3) {
            $this->addError('author', 'Author must contain more than 3 characters');
        } elseif (strlen($author) > 40) {
            $this->addError('author', "Author cannot contain more than 40 characters");
        } 
    }

    
    private function validate_book_category()
    {
        $category = $this->data['category'];
    
        if ($category === 'select') {
            $this->addError('category', 'Please select a valid category.');
        } elseif (empty($category)) {
            $this->addError('category', 'Category is required.');
        }
    
    }
    

    private function validate_book_description()
    {
        $description = $this->data['description'];
        if (empty($description)) {
            $this->addError('description', 'Description is required.');
        }
       
    }

    private function validate_book_quantity()
    {
        $quantity = $this->clean($this->data['quantity']);

        if (empty($quantity)) {
            $this->addError('quantity', "Quantity cannnot be empty");
        } elseif (!filter_var($quantity, FILTER_VALIDATE_INT) || filter_var($quantity, FILTER_VALIDATE_INT) == 0) {
            $this->addError('quantity', "Quantity must be integer");
        } elseif (!preg_match("/^[0-9]$/", $quantity)) {
            $this->addError('quantity', "Invalid quantity");
        }
    }

    private function validate_book_Price()
    {
        $price = $this->clean($this->data['price']);

        if (empty($price)) {
            $this->addError('price', "Rent amount cannnot be empty");
        } elseif (!filter_var($price, FILTER_VALIDATE_INT) || filter_var($price, FILTER_VALIDATE_INT) == 0) {
            $this->addError('price', "Rent amount must be integer");
        } 
    }

   
    private function validate_book_Image()
    {
        if (!isset($_FILES['image']['error']) || $_FILES['image']['error'] == UPLOAD_ERR_NO_FILE) {
            $this->addError('image', "Book image is required.");
        } else {
            $image = $_FILES['image'];
            $allowed_types = array("jpg", "jpeg", "png");
            $extension = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
    
            // Check if the uploaded file is an image
            if (!getimagesize($image['tmp_name'])) {
                $this->addError('image', "The uploaded file is not a valid image.");
            }
    
            // Check if the file extension is allowed
            elseif (!in_array($extension, $allowed_types)) {
                $this->addError('image', "Only JPG, JPEG, PNG files are allowed.");
            }
        }
    
        // Return null if validation passes
        return null;
    }


    private function duplicateData()
    {
        $booktitle = $this->data['title'];
        $db = new Database();
        $redundent_title = $db->selectId("select title from books where title = '$booktitle'");
        if ($redundent_title) {
            $this->addError('title', "This title has already taken");
        }
        $category = $this->data['category'];
        $redundent_category = $db->selectId("select category from categories where category = '$category'");
        if ($redundent_category) {
            $this->addError('category', "This category has already taken");
        }
    }


    // public function validate_bookUpdate_details()
    // {
    //     $this->validate_book_title();
    //     $this->validate_book_author();
    //     $this->validate_book_category();
    //     $this->validate_book_description();
    //     $this->validate_book_quantity();
    //     $this->validate_book_Price();
    //     $this->validate_book_Image();
    //     $this->duplicateData();

    //     return $this->errors;
    // }
    
    public function validate_category_details()
    {
       
        $this->validate_book_category();
        //$this->duplicateData();

        return $this->errors;
    }

    private function addError($key, $message)
    {
        $this->errors[$key] = $message;
    }
}
