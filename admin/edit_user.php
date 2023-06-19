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
    $userId = $_POST['editUserId'];
    $username = $_POST['editUsername'];
    $email = $_POST['editEmail'];
    $role = $_POST['editRole'];

    // Update user in the database
    $sql = "UPDATE users SET username = '$username', email = '$email', role = '$role' WHERE id = $userId";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        $response = 'User updated successfully.';
    } else {
        $response = 'Failed to update user.';
    }

    // Send the response back to the client
    echo $response;

    // Close the database connection
    mysqli_close($connection);
    exit;
}

// Fetch user data from the database
$userId = $_GET['id'];
$sql = "SELECT * FROM users WHERE id = $userId";
$result = mysqli_query($connection, $sql);
$user = mysqli_fetch_assoc($result);

// Close the database connection
mysqli_close($connection);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Edit User</h2>
        <form id="editForm">
            <div class="form-group">
                <label for="editUsername">Username</label>
                <input type="text" class="form-control" id="editUsername" name="editUsername" value="<?php echo $user['username']; ?>">
            </div>
            <div class="form-group">
                <label for="editEmail">Email</label>
                <input type="email" class="form-control" id="editEmail" name="editEmail" value="<?php echo $user['email']; ?>">
            </div>
            <div class="form-group">
                <label for="editRole">Role</label>
                <select class="form-control" id="editRole" name="editRole">
                    <option value="admin" <?php if ($user['role'] === 'admin') echo 'selected'; ?>>Admin</option>
                    <option value="user" <?php if ($user['role'] === 'user') echo 'selected'; ?>>User</option>
                </select>
            </div>
            <input type="hidden" id="editUserId" name="editUserId" value="<?php echo $user['id']; ?>">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="users.php">Users</a>
        </form>
    </div>

    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        // Handle form submission
        $('#editForm').submit(function(event) {
            event.preventDefault(); // Prevent form from submitting normally

            // Get form data
            var userId = $('#editUserId').val();
            var username = $('#editUsername').val();
            var email = $('#editEmail').val();
            var role = $('#editRole').val();

            // Make AJAX request to update user
            $.ajax({
                url: 'edit_user.php',
                type: 'POST',
                data: {
                    editUserId: userId,
                    editUsername: username,
                    editEmail: email,
                    editRole: role
                },
                success: function(response) {
                    // Handle success response
                    alert(response); // You can display a success message or perform any other actions
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
