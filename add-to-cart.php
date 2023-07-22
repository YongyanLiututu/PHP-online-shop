<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $addedItem = json_decode(file_get_contents('php://input'), true);
//    $_SESSION['cart']=array();

    $_SESSION['cart'][] = $addedItem;

    error_log('Added item to cart: ' . var_export($addedItem, true));

    echo 1;
    // A successful response is returned
    header('Content-Type: application/json');

    echo json_encode(['status' => 'success']);
} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
// Get all item information from the shopping cart
    $cartItems = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

    // Returns the JSON format of all product information
    header('Content-Type: application/json');
    echo json_encode($cartItems);
}
?>
