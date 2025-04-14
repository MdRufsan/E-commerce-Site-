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
    <title>Checkout</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Checkout</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
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
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
        <h3>Total: $<?php echo $total_price; ?></h3>

        <!-- Checkout Form -->
        <form action="process_checkout.php" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Shipping Address</label>
                <textarea name="address" id="address" class="form-control" rows="3" required></textarea>
            </div>
            <input type="hidden" name="total_price" value="<?php echo $total_price; ?>">
            <button type="submit" class="btn btn-primary">Confirm Order</button>
        </form>
    </div>
</body>
</html>
