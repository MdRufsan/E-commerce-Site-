<?php
include 'header.php';  // Include the navigation bar
?>

<div class="container mt-5">
    <h1>Browse Categories</h1>
    <div class="row mt-4">
        <!-- Electronics Category -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="img/electronics.jpg" class="card-img-top" alt="Electronics">
                <div class="card-body">
                    <h5 class="card-title">Electronics</h5>
                    <p class="card-text">Find the latest electronics, gadgets, and devices.</p>
                    <a href="electronics.php" class="btn btn-primary">Browse Electronics</a>
                </div>
            </div>
        </div>

        <!-- Fashion Category -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="img/fashion.jpg" class="card-img-top" alt="Fashion">
                <div class="card-body">
                    <h5 class="card-title">Fashion</h5>
                    <p class="card-text">Discover trendy clothes and accessories for all seasons.</p>
                    <a href="fashion.php" class="btn btn-primary">Browse Fashion</a>
                </div>
            </div>
        </div>

        <!-- Home & Kitchen Category -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="img/kitchen.jpg" class="card-img-top" alt="Home & Kitchen">
                <div class="card-body">
                    <h5 class="card-title">Home & Kitchen</h5>
                    <p class="card-text">Explore home decor, kitchen appliances, and essentials.</p>
                    <a href="home&kitchen.php" class="btn btn-primary">Browse Home & Kitchen</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php';  // Include the footer
?>
