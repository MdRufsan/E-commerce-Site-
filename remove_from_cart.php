<?php
session_start();

// Get the product ID from the URL
$id = $_GET['id'];

// Remove the product from the cart
if (isset($_SESSION['cart'][$id])) {
    unset($_SESSION['cart'][$id]);
}

// Redirect back to the cart page
header("Location: cart.php");
exit();
?>
