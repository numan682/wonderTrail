<?php
  // MySQL database connection settings
  include './api/config.php';
  $id=$_POST['id'];
  

  // Create a new MySQLi instance and establish connection
  $mysqli = new mysqli($servername, $username, $password, $dbname);

  // Check for connection errors
  if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
  }

  // Fetch data from the "packages" table where id = 2
  $query = "SELECT title, description, pax, price, time, location FROM packages WHERE id = $id";
  $result = $mysqli->query($query);

  // Check if any records are found
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $title = $row['title'];
      $description = $row['description'];
      $pax = $row['pax'];
      $price = $row['price'];
      $time = $row['time'];
      $location = $row['location'];

?>

<!DOCTYPE html>
<html>
<head>
  <title>Tour Package Details</title>
 
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    .package {
      max-width: 400px;
      margin: 20px auto;
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 5px;
    }
    .package img {
      max-width: 100%;
      height: auto;
      margin-bottom: 10px;
    }
    .package-title {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 10px;
    }
    .package-price {
      font-size: 18px;
      color: #009688;
      margin-bottom: 10px;
    }
    .package-details {
      font-size: 16px;
      margin-bottom: 10px;
    }
    .hide{
        display:none;
    }
    .btn {
      display: inline-block;
      background-color: #009688;
      color: #fff;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 3px;
      transition: background-color 0.3s ease;
    }
    .book-now-button:hover {
      background-color: #00796b;
    }
  </style>
</head>
<body>
  <div class="package">
    <img src="./assets/images/packege-1.jpg" alt="Tour Package Image">
    <h2 class="package-title"><?php echo $title ?></h2>
    <div class="package-price">Price: $<?php echo $price ?></div>
    <div class="package-details">
      <p><strong>Pax:</strong><?php echo $pax ?></p>
      <p><strong>Location:</strong> <?php echo $location ?></p>
      <p><strong>Time:</strong><?php echo $time ?></p>
    </div>
    <p class="package-description">
    <?php echo $description ?>    </p>
    <form method="POST" action="book.php">
<input class="hide" name="package" value="<?php echo $title ?>" >
<input  class="hide" name="price" value="<?php echo $price ?>" >
<input  class="hide" name="id" value="<?php echo $id ?>" >
  <button type="submit" class="btn btn-secondary">Book Now</button>
</form>
  </div>
</body>
</html>
<?php 
    }
} else {
  echo "No packages found.";
}

// Close the database connection
$mysqli->close();
?>
?>