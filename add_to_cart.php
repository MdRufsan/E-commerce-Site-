<?php
session_start();
include 'db_test.php';

// Get the product ID from the URL
$id = $_GET['id'];

// Check if the cart already exists
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Check if the product is already in the cart
if (isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id] += 1; // Increment the quantity
} else {
    $_SESSION['cart'][$id] = 1; // Add new product with quantity 1
}

// Redirect back to the products page
header("Location: products.php");
exit();
?>
