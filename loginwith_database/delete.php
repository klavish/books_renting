<?php
require_once 'connection.php';
$id = $_GET['id'];
 $sql = "delete from registr where id=$id";
 $exec = $con->query($sql);
echo "Your data has been deleted successfully";

?>