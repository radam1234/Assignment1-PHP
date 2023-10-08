<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Receipt</title>
</head>
<body>
<div class="container">
    <h1>Order Receipt</h1>
    <!-- Displaying First Name -->
    <p><strong>First Name:</strong> <?php echo $_GET['fname']; ?></p>

    <!-- Displaying Last Name -->
    <p><strong>Last Name:</strong> <?php echo $_GET['lname']; ?></p>

    <!-- Displaying Age -->
    <p><strong>Age:</strong> <?php echo $_GET['age']; ?></p>

    <!-- Displaying Email -->
    <p><strong>Email:</strong> <?php echo $_GET['email']; ?></p>

    <!-- Displaying Pizza Size -->
    <p><strong>Pizza Size:</strong> <?php echo $_GET['pizza_size']; ?></p> <!-- Corrected variable name -->

    <!-- Displaying Toppings -->
    <p><strong>Toppings:</strong> <?php echo $_GET['toppings']; ?></p>

    <!-- Displaying Drinks -->
    <p><strong>Drinks:</strong> <?php echo $_GET['drinks']; ?></p>

    <!-- Displaying Drink Quantity -->
    <p><strong>Drink Quantity:</strong> <?php echo $_GET['drink_quantities']; ?></p>

    <!-- Displaying Delivery Address -->
    <p><strong>Delivery Address:</strong> <?php echo $_GET['deliveryaddress']; ?></p> <!-- Corrected variable name -->

    <!-- Displaying Total Price -->
    <p><strong>Total Price:</strong> <?php echo $_GET['totalprice']; ?></p> <!-- Corrected variable name -->
</div>
</body>
</html>

