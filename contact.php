<?php
include 'header.php';  // Include the navigation bar
?>

<div class="container mt-5">
    <h1>Contact Us</h1>
    <p>If you have any questions or need support, feel free to reach out to us!</p>
    
    <h3>Our Contact Information:</h3>
    <p>Email: <a href="mailto:support@ecommerce.com">support@ecommerce.com</a></p>
    <p>Phone: +1 (123) 456-7890</p>

    <h4>Or fill out the contact form below:</h4>
    <form action="contact_form.php" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Your Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Your Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Your Message</label>
            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php
include 'footer.php'; // Include the footer
?>
