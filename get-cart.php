<?php
session_start();

// Get all item information from $_SESSION['cart'] array
$cartItems = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

// Return all product information to the client in JSON format
header('Content-Type: application/json');
echo json_encode($cartItems);
?>
