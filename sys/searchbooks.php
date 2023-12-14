<?php


if (isset($_GET['submit']) && isset($_GET['category'])) {
    $selectedCategory = $_GET['category'];

    // Fetch books based on the selected category
    $db = new Database();
    $sql = "SELECT * FROM books WHERE category = ?";
    $params = array($selectedCategory);
    $db->sql($sql, $params);  
    $books = $db->getResult();
    foreach ($books as $book) {
        echo "<div>{$book['title']}</div>";
    }
}
?>
