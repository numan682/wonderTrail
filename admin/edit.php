<?php

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

// Edit Package
$id = $_POST['id'];
$name = $_POST['name'];
$title = $_POST['title'];
$description = $_POST['description'];
$pax = $_POST['pax'];
$price = $_POST['price'];

$sql = "UPDATE packages SET name = '$name', title = '$title', description = '$description', pax = '$pax', price = '$price' WHERE id = $id";
$result = mysqli_query($connection, $sql);

if ($result) {
    echo 'Package edited successfully.';
} else {
    echo 'Failed to edit package.';
}

// Close the database connection
mysqli_close($connection);
?>
