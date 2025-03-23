<?php include('header.php'); ?>
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <!-- Logout Button -->
    <div class="container mt-3 text-end">
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
   
    <!-- Page Content -->
    <div class="container mt-4">
        <h1>Products</h1>
        <!-- Your product listing code here -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
include 'db_test.php'; // Reuse the database connection

// Fetch products from the database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Our Products</h1>
        <div class="row">
            <?php
            if ($result->num_rows > 0) {
                while ($product = $result->fetch_assoc()) {
                    echo "
                    <div class='col-md-4 mt-4'>
                        <div class='card'>
                            <img src='img/{$product['image']}' class='card-img-top' alt='{$product['name']}'>
                            <div class='card-body'>
                                <h5 class='card-title'>{$product['name']}</h5>
                                <p class='card-text'>{$product['description']}</p>
                                <p class='text-success'>\${$product['price']}</p>
                                <a href='product.php?id={$product['id']}' class='btn btn-primary'>View Details</a>
                                <a href='add_to_cart.php?id={$product['id']}' class='btn btn-success'>Add to Cart</a>


                            </div>
                        </div>
                    </div>
                    ";
                }
            } else {
                echo "<p>No products found.</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
