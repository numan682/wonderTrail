<?php
// Database connection details
include 'config.php';

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the data from the request
    $name = $_POST['name'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $pax = $_POST['pax'];
    $image = $_POST['image'];
    $time = $_POST['time'];
    $location = $_POST['location'];

    // Prepare a SQL statement to insert data
    $stmt = $conn->prepare('INSERT INTO packages (name, title, description, price, pax, image, time, location) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->bind_param('ssssssss', $name, $title, $description, $price, $pax, $image, $time, $location);
    $stmt->execute();

    // Check if the data was successfully inserted
    if ($stmt->affected_rows > 0) {
        $response = array('message' => 'Data inserted successfully');
        echo json_encode($response);
    } else {
        $response = array('message' => 'Failed to insert data');
        echo json_encode($response);
    }

    // Close the statement
    $stmt->close();
} else {
    $response = array('message' => 'Invalid request method');
    echo json_encode($response);
}

// Close the connection
$conn->close();
?>
