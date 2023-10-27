<?php
session_start();
unset($_SESSION['userlogin_data']);
session_destroy();
header('location:login.php');

?>