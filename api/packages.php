<?php
// Database connection details
include 'config.php';

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Prepare a SQL statement to retrieve data safely
$stmt = $conn->prepare('SELECT * FROM packages');
$stmt->execute();
$result = $stmt->get_result();

// Fetch the data from the result set
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Close the statement and connection
$stmt->close();
$conn->close();

// Return the data as JSON response
header('Content-Type: application/json');
echo json_encode($data);
?>
