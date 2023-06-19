<?php
// Replace with your actual database credentials
include 'config.php';

// Create a database connection
$connection = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
}

// Get the user ID from the request
$userId = $_GET['userId'];

// Fetch user data from the database
$sql = "SELECT * FROM users WHERE id = $userId";
$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);

    // Display the form for editing user data
    echo '
        <div class="mb-3">
            <label for="editUsername" class="form-label">Username</label>
            <input type="text" class="form-control" id="editUsername" name="editUsername" value="' . $user['username'] . '">
        </div>
        <div class="mb-3">
            <label for="editEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="editEmail" name="editEmail" value="' . $user['email'] . '">
        </div>
        <div class="mb-3">
            <label for="editRole" class="form-label">Role</label>
            <input type="text" class="form-control" id="editRole" name="editRole" value="' . $user['role'] . '">
        </div>
    ';
} else {
    echo 'User not found.';
}

// Close the database connection
mysqli_close($connection);
?>
