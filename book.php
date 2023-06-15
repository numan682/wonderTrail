<?php
session_start();
$username=$_SESSION['username'];
$package= $_POST['package'];
$price = $_POST['price'];
$id = $_POST['id'];
?>


<!DOCTYPE html>
<html>
<head>
    <title>Shipping Address Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container col-md-8">
        <h1>Shipping Address</h1>
        <form method="POST" action="./payment/index.php">
            <input style="display:none" type="text" name="id" value="<?php echo $id ?>">
        <div class="form-group">
                <label for="username">UserName</label>
                <input type="text" class="form-control" id="username" name="username" readonly value="<?php echo $username ?>" required>
            </div>
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" name="city" required>
            </div>
            <div class="form-group">
                <label for="state">State</label>
                <input type="text" class="form-control" id="state" name="state" required>
            </div>
            <div class="form-group">
                <label for="zip">Zip Code</label>
                <input type="text" class="form-control" id="zip" name="zip" required>
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <input type="text" class="form-control" id="country" name="country" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" name="price" value="<?php echo $price ?>" readonly>
            </div>
            <div class="form-group">
                <label for="packageName">Package Name</label>
                <input type="text" class="form-control" id="packageName" name="packageName"value="<?php echo $package ?>" readonly>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
