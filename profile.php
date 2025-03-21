<?php
session_start(); // This starts the session
include 'header.php'; // Include the navigation bar
include 'db_test.php'; // Include the database connection

// If user is not logged in, redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch user data from database
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = '$user_id'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

// Close the connection
$conn->close();
?>


<div class="container my-5">
    <h2>Your Profile</h2>

    <!-- Profile Information -->
    <div class="row">
        <div class="col-md-6">
            <h4>Personal Information</h4>
            <p><strong>Name:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
            <!-- Add more user info if needed -->
        </div>
        <div class="col-md-6">
            <h4>Update Information</h4>
            <!-- Profile Update Form -->
            <form action="update_profile.php" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Optionally, display order history (if available) -->
    <div class="mt-5">
        <h4>Your Orders</h4>
        <!-- Add logic to display order history here -->
    </div>
</div>

<?php include 'footer.php'; ?> <!-- Include footer -->
