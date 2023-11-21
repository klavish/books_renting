<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chessboard</title>
    <link rel="stylesheet" href="./dist/output.css">
    
</head>
<body>
<h1 class="text-xs font-medium">ChessBoard</h1>
<?php
echo '<table class="w-96 bg-gray-400 border">';
for ($i = 1; $i <= 8; $i++) {
    echo '<tr>';
    for ($j = 1; $j <= 8; $j++) {
        if (($i + $j) % 2 === 0) {
            echo '<td class="bg-black w-56 h-56"></td>';
        } else {
            echo '<td class="bg-white w-56 h-56"></td>';
        }
    }
    echo '</tr>';
}
echo '</table>';
?>


</body>
</html>
