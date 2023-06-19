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
$userId = $_POST['userId'];

// Delete the user from the database
$sql = "DELETE FROM users WHERE id = $userId";
$result = mysqli_query($connection, $sql);

if ($result) {
    echo 'User deleted successfully.';
} else {
    echo 'Failed to delete user.';
}

// Close the database connection
mysqli_close($connection);
?>
