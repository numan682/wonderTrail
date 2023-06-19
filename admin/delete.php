<?php

// Replace with your actual database credentials
include 'config.php';
// Create a database connection
$connection = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
}

// Delete Package
$id = $_POST['id'];

$sql = "DELETE FROM packages WHERE id = $id";
$result = mysqli_query($connection, $sql);

if ($result) {
    echo 'Package deleted successfully.';
} else {
    echo 'Failed to delete package.';
}

// Close the database connection
mysqli_close($connection);
?>
