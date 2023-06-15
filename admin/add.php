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

// Retrieve the package details from the POST data
$name = $_POST['name'];
$title = $_POST['title'];
$description = $_POST['description'];
$price = $_POST['price'];
$pax = $_POST['pax'];
$location = $_POST['location'];
$days = $_POST['days'];

// Image upload
$targetDir = '../assets/images/'; // Replace with your desired directory for storing uploaded images
$targetFile = $targetDir . basename($_FILES['image']['name']);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
$check = getimagesize($_FILES['image']['tmp_name']);
if ($check !== false) {
    $uploadOk = 1;
} else {
    echo 'Invalid image file.';
    $uploadOk = 0;
}

// Check if file already exists
if (file_exists($targetFile)) {
    echo 'Image file already exists.';
    $uploadOk = 0;
}

// Check file size (limit it to 1MB)
if ($_FILES['image']['size'] > 1 * 1024 * 1024) {
    echo 'Image file is too large. Please upload an image up to 1MB in size.';
    $uploadOk = 0;
}

// Allow only specific image file formats (you can customize this as per your requirements)
$allowedFormats = array('jpg', 'jpeg', 'png', 'gif');
if (!in_array($imageFileType, $allowedFormats)) {
    echo 'Only JPG, JPEG, PNG, and GIF files are allowed.';
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo 'Failed to upload image file.';
} else {
    // Try to move the uploaded image file to the target directory
    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        // Insert the package into the database with the image file path
        $imagePath = $targetFile;
        $sql = "INSERT INTO packages (name, title, description, price, pax, location, image, time)
                VALUES ('$name', '$title', '$description', '$price', '$pax', '$location', '$imagePath', '$days')";

        if (mysqli_query($connection, $sql)) {
            echo 'Package added successfully.';
        } else {
            echo 'Failed to add package.';
        }
    } else {
        echo 'Failed to move uploaded image file.';
    }
}

// Close the database connection
mysqli_close($connection);
?>
