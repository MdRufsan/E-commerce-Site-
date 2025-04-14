<?php include('header.php'); ?>

<?php
session_start();
include 'db_test.php';

// Initialize total price
$total_price = 0;

// Check if the cart is empty
if (!isset($_SESSION['cart']) || count($_SESSION['cart']) === 0) {
    echo "<p>Your cart is empty. <a href='products.php'>Go back to products</a></p>";
    exit();
}

// Fetch product details for items in the cart
$product_ids = implode(',', array_keys($_SESSION['cart']));
$sql = "SELECT * FROM products WHERE id IN ($product_ids)";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Your Shopping Cart</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($product = $result->fetch_assoc()) {
                    $quantity = $_SESSION['cart'][$product['id']];
                    $subtotal = $product['price'] * $quantity;
                    $total_price += $subtotal;

                    echo "
                    <tr>
                        <td>{$product['name']}</td>
                        <td>\${$product['price']}</td>
                        <td>$quantity</td>
                        <td>\$$subtotal</td>
                        <td><a href='remove_from_cart.php?id={$product['id']}' class='btn btn-danger'>Remove</a></td>
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
        <h3>Total: $<?php echo $total_price; ?></h3>
        <a href="products.php" class="btn btn-secondary">Continue Shopping</a>
        <a href="checkout.php" class="btn btn-primary">Checkout</a>
    </div>
</body>
</html>
