<?php
include 'config.php'; // Database connection
include 'header.php'; // Navbar

if (isset($_GET['query'])) {
    $searchQuery = $_GET['query'];
    $searchQuery = mysqli_real_escape_string($conn, $searchQuery);

    // Query the database to fetch matching products
    $sql = "SELECT * FROM products WHERE name LIKE '%$searchQuery%' OR description LIKE '%$searchQuery%'";
    $result = $conn->query($sql);
    ?>
    <div class="container mt-5">
        <h2>Search Results for "<?php echo htmlspecialchars($searchQuery); ?>"</h2>
        <div class="row mt-4">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <img src="images/<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['name']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                <p class="card-text"><?php echo substr($row['description'], 0, 100); ?>...</p>
                                <p class="card-text"><strong>Price:</strong> $<?php echo $row['price']; ?></p>
                                <a href="product_details.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p>No results found for '$searchQuery'.</p>";
            }
            ?>
        </div>
    </div>
    <?php
} else {
    echo "<p>Invalid search query.</p>";
}

include 'footer.php'; // Footer
?>
