<?php
session_start();
include 'db_test.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $total_price = $_POST['total_price'];
    $cart = $_SESSION['cart'];

    // Insert order into orders table
    $sql = "INSERT INTO orders (customer_name, customer_email, shipping_address, total_price) 
            VALUES ('$name', '$email', '$address', $total_price)";
    if ($conn->query($sql) === TRUE) {
        $order_id = $conn->insert_id;

        // Insert each cart item into order_items table
        foreach ($cart as $product_id => $quantity) {
            $sql = "INSERT INTO order_items (order_id, product_id, quantity) 
                    VALUES ($order_id, $product_id, $quantity)";
            $conn->query($sql);
        }

        // Clear the cart
        unset($_SESSION['cart']);

        // Redirect to success page
        header("Location: order_success.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
