<?php include('header.php'); ?>

<!-- Hero Section -->
<div id="hero" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="images/hero1.jpg" class="d-block w-100" alt="Sale Banner">
            <div class="carousel-caption d-none d-md-block">
                <h1>Biggest Sale of the Year!</h1>
                <p>Up to 50% off on all products.</p>
                <a href="products.php" class="btn btn-primary">Shop Now</a>
                <div class="text-center mt-4">
    <h3>Join Our Community!</h3>
    <p>Sign up today and get exclusive discounts and updates.</p>
    <a href="signup.php" class="btn btn-warning btn-lg">Sign Up Now</a>
</div>

            </div>
        </div>
        <div class="carousel-item">
            <img src="images/hero2.jpg" class="d-block w-100" alt="New Arrivals">
            <div class="carousel-caption d-none d-md-block">
                <h1>New Arrivals</h1>
                <p>Check out the latest trends.</p>
                <a href="categories.php" class="btn btn-secondary">Browse Categories</a>
                
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#hero" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </a>
    <a class="carousel-control-next" href="#hero" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </a>
</div>

<!-- Search Bar -->
<div class="container mt-4">
    <form action="search.php" method="GET" class="input-group">
        <input type="text" name="query" class="form-control" placeholder="Search for products, categories, or brands...">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div>

<!-- Popular Categories -->
<div class="container mt-5">
    <h2 class="text-center mb-4">Shop by Categories</h2>
    <div class="row">
        <?php
        // Static categories example; replace with database-driven content
        $categories = [
            ['name' => 'Electronics', 'image' => 'img/Electronics.jpg'],
            ['name' => 'Fashion', 'image' => 'img/Fashion.jpg'],
            ['name' => 'Home & Kitchen', 'image' => 'img/Kitchen.jpg']
        ];

        foreach ($categories as $category) {
            echo "
            <div class='col-md-4 mb-4'>
                <div class='card'>
                    <img src='{$category['image']}' class='card-img-top' alt='{$category['name']}'>
                    <div class='card-body text-center'>
                        <h5>{$category['name']}</h5>
                        <a href='category_details.php?category={$category['name']}' class='btn btn-outline-primary'>Explore</a>
                        
                    </div>
                </div>
            </div>
            ";
        }
        ?>
    </div>
</div>

<!-- Featured Products -->
<div class="container mt-5">
    <h2 class="text-center mb-4">Featured Products</h2>
    <div class="row">
        <?php
        // Example products; replace with dynamic content from your database
        $products = [
            ['name' => 'Smartphone', 'price' => '$299', 'image' => 'img/Smartphone.jpg'],
            ['name' => 'Headphones', 'price' => '$99', 'image' => 'img/Headphone.jpg'],
            ['name' => 'Coffee Maker', 'price' => '$59', 'image' => 'img/coffeemaker .jpg']
        ];

        foreach ($products as $product) {
            echo "
            <div class='col-md-4 mb-4'>
                <div class='card'>
                    <img src='{$product['image']}' class='card-img-top' alt='{$product['name']}'>
                    <div class='card-body text-center'>
                        <h5>{$product['name']}</h5>
                        <p class='text-primary'>{$product['price']}</p>
                        <a href='product_details.php?product={$product['name']}' class='btn btn-success'>Buy Now</a>
                    </div>
                </div>
            </div>
            ";
        }
        ?>
    </div>
</div>

<!-- Testimonials -->
<div class="container mt-5">
    <h2 class="text-center mb-4">What Our Customers Say</h2>
    <div class="row">
        <div class="col-md-4">
            <blockquote class="blockquote text-center">
                <p>"Amazing quality and fast delivery!"</p>
                <footer class="blockquote-footer">John Doe</footer>
            </blockquote>
        </div>
        <div class="col-md-4">
            <blockquote class="blockquote text-center">
                <p>"Great customer service. Will shop again!"</p>
                <footer class="blockquote-footer">Jane Smith</footer>
            </blockquote>
        </div>
        <div class="col-md-4">
            <blockquote class="blockquote text-center">
                <p>"Best prices I've found online!"</p>
                <footer class="blockquote-footer">David Wilson</footer>
            </blockquote>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include('footer.php'); ?>
