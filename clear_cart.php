<?php
session_start();
$_SESSION['cart'] = array();
header("Location: " . $_SERVER['HTTP_REFERER']);

// Redirect back to shopping cart page
header('Location:index.php');
exit();
?>
