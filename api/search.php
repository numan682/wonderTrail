<?php
// Establish database connection
include 'config.php';

$pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Retrieve the search term from the query parameter
$searchTerm = $_GET['search'] ?? '';

// Prepare and execute the search query
$stmt = $pdo->prepare("SELECT * FROM packages WHERE title LIKE :searchTerm");
$stmt->bindValue(':searchTerm', "%$searchTerm%", PDO::PARAM_STR);
$stmt->execute();

// Fetch the results as an associative array
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Output the JSON response
header('Content-Type: application/json');
echo json_encode($results);
?>

