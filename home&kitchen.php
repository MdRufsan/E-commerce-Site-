<?php
include 'header.php';  // Include the navigation bar
include 'db_connection.php';  // Include the database connection

// Fetch home and kitchen products from the database
$sql = "SELECT * FROM products WHERE category = 'Home & Kitchen'";
$result = $conn->query($sql);

?>

<div class="container mt-5">
    <h1>Home & Kitchen</h1>

    <!-- Product List -->
    <div class="row mt-4">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="images/<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['product_name']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['product_name']; ?></h5>
                        <p class="card-text">$<?php echo number_format($row['price'], 2); ?></p>
                        <a href="add_to_cart.php?product_id=<?php echo $row['id']; ?>" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php
include 'footer.php';  // Include the footer
?>
