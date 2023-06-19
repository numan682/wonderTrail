<?php
// Replace with your actual database credentials
include 'config.php';

// Create a database connection
$connection = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']); // Hash the password
    $role = $_POST['role'];

    // Insert user into the database
    $sql = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', '$role')";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        $response = 'User added successfully.';
    } else {
        $response = 'Failed to add user.';
    }

    // Send the response back to the client
    echo $response;

    // Close the database connection
    mysqli_close($connection);
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Add User</h2>
        <form id="addForm">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" id="role" name="role">
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add User</button>
            <a href="users.php">Users</a>
        </form>
    </div>

    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        // Handle form submission
        $('#addForm').submit(function(event) {
            event.preventDefault(); // Prevent form from submitting normally

            // Get form data
            var username = $('#username').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var role = $('#role').val();

            // Make AJAX request to add user
            $.ajax({
                url: 'add_user.php',
                type: 'POST',
                data: {
                    username: username,
                    email: email,
                    password: password,
                    role: role
                },
                success: function(response) {
                    // Handle success response
                    alert(response); // You can display a success message or perform any other actions
                    // Reset the form
                    $('#addForm')[0].reset();
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.log(error); // You can display an error message or perform any other error handling
                }
            });
        });
    });
    </script>
</body>
</html>
