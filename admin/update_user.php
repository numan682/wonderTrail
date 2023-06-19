<?php
// Connect to the database
$db = mysqli_connect("localhost", "root", "", "mysite");

// Check if the database connection was successful
if (!$db) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Get user ID and updated details from the request
$userId = mysqli_real_escape_string($db, $_POST['userId']);
$username = mysqli_real_escape_string($db, $_POST['username']);
$email = mysqli_real_escape_string($db, $_POST['email']);

// Update the user in the database
$sql = "UPDATE users SET username='$username', email='$email' WHERE id='$userId'";
$result = mysqli_query($db, $sql);

// Close the database connection
mysqli_close($db);
?>
