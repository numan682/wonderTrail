<?php
// Connect to the database
$db = mysqli_connect("localhost", "root", "", "mysite");

// Check if the database connection was successful
if (!$db) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Initialize error message variable
$error = '';

// Process the registration form submission
if (isset($_POST['register_btn'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($db, $_POST['confirm_password']);

    // Check if the email already exists in the database
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) > 0) {
        $error = "Email already exists. Please choose a different email.";
    } else {
        // Insert the new user into the database
        $hashed_password = md5($password); // You can use a more secure hashing algorithm
        $insert_query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
        mysqli_query($db, $insert_query);

        // Redirect to the success page or perform any other desired actions
        header("Location: login.php");
        exit();
    }
}

// Close the database connection
mysqli_close($db);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Add any custom styles -->
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h2>Registration Form</h2>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="mb-3">
                <label class="form-label">Username:</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Confirm Password:</label>
                <input type="password" name="confirm_password" class="form-control" required>
            </div>
            <div class="mb-3">
                <button type="submit" name="register_btn" class="btn btn-primary">Register</button>
           <a href="./login.php">Login</a>
              </div>
        </form>

        <?php if (!empty($error)) : ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
    </div>

    <!-- Add Bootstrap JavaScript (jQuery is required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
