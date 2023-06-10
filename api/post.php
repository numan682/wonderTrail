<?php
// Get form data
$name = $_POST['name'];
$title = $_POST['title'];
$description = $_POST['description'];
$price = $_POST['price'];
$pax = $_POST['pax'];
$time = $_POST['date'];
$location = $_POST['location'];

// File upload
$targetDirectory = "../assets/images/"; // Specify the target directory for file uploads
$fileName = $_FILES['image']['name'];
$targetFilePath = $targetDirectory . $fileName;
move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath);

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mysite";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind the SQL statement
$stmt = $conn->prepare("INSERT INTO packages (name, title, description, price, pax, time, location, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $name, $title, $description, $price, $pax, $time, $location, $fileName);

// Execute the statement
if ($stmt->execute()) {
    $response = array('status' => 'success', 'message' => 'Data inserted successfully');
} else {
    $response = array('status' => 'error', 'message' => 'Failed to insert data');
}

// Close statement and database connection
$stmt->close();
$conn->close();

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
