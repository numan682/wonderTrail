<?php
// Replace with your actual database credentials
include 'config.php';

// Create a database connection
$connection = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
}

// View Users
$sql = "SELECT * FROM users";
$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id=$row['id'];
        echo '<tr>';
        echo '<td>' .$id. '</td>';
        echo '<td>' . $row['username'] . '</td>';
        echo '<td>' . $row['email'] . '</td>';
        echo '<td>' . $row['role'] . '</td>';
        echo '<td>';
        echo '<a href="edit_user.php?id='.$id.'"><button type="button" class="btn btn-sm btn-primary edit-btn" onclick="editUser(' . $row['id'] . ')">Edit</button></a>        ';
        echo '<button type="button" class="btn btn-sm btn-danger delete-btn" data-id="' . $row['id'] . '">Delete</button>';
        echo '</td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="5">No users found.</td></tr>';
}

// Close the database connection
mysqli_close($connection);
?>
