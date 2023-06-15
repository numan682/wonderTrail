<?php

// Replace with your actual database credentials
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'mysite';

// Create a database connection
$connection = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
}

// Get the package ID from the POST data
$packageId = $_POST['id'];

// Retrieve the package from the database
$sql = "SELECT * FROM packages WHERE id = '$packageId'";
$result = mysqli_query($connection, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    // Package found, return the data as JSON
    $package = mysqli_fetch_assoc($result);
    echo json_encode($package);
} else {
    // Package not found
    echo 'Package not found.';
}

// Close the database connection
mysqli_close($connection);
?>
