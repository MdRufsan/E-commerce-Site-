<?php
session_start();
?>

<?php
include 'db_test.php';

// Get the product ID from the URL
$id = $_GET['id'];

// Fetch product details
$sql = "SELECT * FROM products WHERE id = $id";
$result = $conn->query($sql);
$product = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['name']; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1><?php echo $product['name']; ?></h1>
        <img src="img/<?php echo $product['image']; ?>" class="img-fluid" alt="<?php echo $product['name']; ?>">
        <p class="mt-3"><?php echo $product['description']; ?></p>
        <p class="text-success">Price: $<?php echo $product['price']; ?></p>
        <a href="products.php" class="btn btn-secondary">Back to Products</a>
    </div>
</body>
</html>
