<<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Heaven - Order Confirmation</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
    <!-- Regular CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <header>
        <div class="navbar navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="./img/Pizza%20D!.png" alt="Pizza Heaven Logo">
                </a>
            </div>
        </div>
    </header>
    <h1>Order Confirmation</h1>

    <?php
    // Check if the request method is POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve data from the submitted form
        $pizzaSize = $_POST["pizza_size"];
        $toppings = $_POST["toppings"];
        $drinks = $_POST["drinks"];
        $deliveryAddress = $_POST["delivery_address"];

        // Display the order confirmation
        echo "<h3>Your Pizza Order Confirmation:</h3>";
        echo "<p><strong>Pizza Size:</strong> $pizzaSize</p>";

        // Display selected toppings if any
        if (!empty($toppings)) {
            echo "<p><strong>Toppings:</strong> " . implode(", ", $toppings) . "</p>";
        }

        echo "<p><strong>Drinks:</strong> $drinks</p>";
        echo "<p><strong>Delivery Address:</strong> $deliveryAddress</p>";

        // Success message
        echo "<p>Your Order was a success!</p>";
    }
    ?>

</div>
</body>
