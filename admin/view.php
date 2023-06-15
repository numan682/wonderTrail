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

// View Packages
$sql = "SELECT * FROM packages";
$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['name'] . '</td>';
        echo '<td>' . $row['title'] . '</td>';
        echo '<td>' . $row['description'] . '</td>';
        echo '<td>' . $row['pax'] . '</td>';
        echo '<td>' . $row['price'] . '</td>';
        echo '<td>';
        echo '<button type="button" class="btn btn-sm btn-primary editBtn" id="editBtn" data-id="' . $row['id'] . '">Edit</button> ';
        echo '<button type="button" class="btn btn-sm btn-danger deleteBtn" data-id="' . $row['id'] . '">Delete</button>';
        echo '</td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="6">No packages found.</td></tr>';
}

// Close the database connection
mysqli_close($connection);
?>
