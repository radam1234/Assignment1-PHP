<!-- Assignment #1
 Student Name: Ramsin Adam
Student ID: 200484980
Decsription: Making a Pizza Website -->

<?php

// Include the Database.php file
include_once 'Database.php';

// Create a new instance of the Database class
$database = new Database();

// Define pizza prices
$pizzaPrices = [
    "Small" => 10.99,
    "Medium" => 12.99,
    "Large" => 14.99,
];

// Seeing if form was submitted using POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sanitize and store form input data
    $fname = $database->sanitize($_POST["fname"]);
    $lname = $database->sanitize($_POST["lname"]);
    $age = $database->sanitize($_POST["age"]);
    $email = $database->sanitize($_POST["email"]);
    $deliveryAddress = $database->sanitize($_POST["delivery_address"]);
    $drinks = $database->sanitize($_POST["drinks"]);

    // Topping and drink prices
    $toppingPrices = [
        "Pepperoni" => 1.50,
        "Mushroom" => 1.25,
        "GreenPepper" => 1.00,
        "BlackOlives" => 1.25,
        "GreenOlives" => 1.25,
        "Tomatoes" => 1.25,
    ];

    $drinkPrices = [
        "Soda" => 2.25,
        "Juice" => 2.00,
        "Water" => 1.00,
    ];

    // Calculate the total price of the order
    $totalPrice = isset($pizzaPrices[$_POST["pizza_size"]]) ? $pizzaPrices[$_POST["pizza_size"]] : 0;

    if (isset($_POST["toppings"]) && is_array($_POST["toppings"])) {
        foreach ($_POST["toppings"] as $topping) {
            $totalPrice += isset($toppingPrices[$topping]) ? $toppingPrices[$topping] : 0;
        }
    }

    // Redirect to receipt.php with order details
    header("Location: receipt.php?pizzasize=" . urlencode($_POST["pizza_size"]) . "&toppings=" . urlencode(implode(",", $_POST["toppings"])) . "&drinks=" . urlencode($_POST["drinks"]) . "&deliveryaddress=" . urlencode($_POST["delivery_address"]) . "&totalprice=" . urlencode($totalPrice) . "&email=" . urlencode($_POST["email"]));
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Heaven</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
    <!-- Regular CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Monoton&family=Montserrat+Alternates:wght@400;600&family=Montserrat:wght@400;500&family=Raleway:ital,wght@0,400;0,900;1,400;1,600&display=swap" rel="stylesheet">
</head>
<body>
<div class="container">
    <header>
        <div class="navbar navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="./img/pizzalogov4.png" alt="Pizza Heaven Logo">
                </a>
            </div>
        </div>
    </header>

    <!-- Pizza Form -->
    <h1>Pizza Order Form</h1>

    <form method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="fname">First Name</label>
                    <input type="text" class="form-control" id="fname" name="fname" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="lname">Last Name</label>
                    <input type="text" class="form-control" id="lname" name="lname" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" class="form-control" id="age" name="age" required>
                </div>
            </div>

        <form method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="pizzaSize">Pizza Size</label>
                    <select class="form-control" id="pizzaSize" name="pizza_size">
                        <option value="Small">Small</option>
                        <option value="Medium">Medium</option>
                        <option value="Large">Large</option>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="toppings">Toppings</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="toppings[]" value="pepperoni" id="toppingPepperoni">
                        <label class="form-check-label" for="toppingPepperoni">
                            <img src="./img/pepperoni.png" alt="Pepperoni Topping">
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="toppings[]" value="Mushroom" id="toppingMushroom">
                        <label class="form-check-label" for="toppingMushroom">
                            <img src="./img/mushrooms.png" alt="Mushroom Topping">
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="toppings[]" value="GreenPepper" id="toppingGreenPepper">
                        <label class="form-check-label" for="toppingGreenPepper">
                            <img src="./img/greenpeppers.png" alt="Green Pepper Topping">
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="toppings[]" value="Tomato" id="toppingTomato">
                        <label class="form-check-label" for="toppingPepperoni">
                            <img src="./img/tomatoes.png" alt= "Tomato Topping">
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="toppings[]" value="BlackOlives" id="toppingBlackOlives">
                        <label class="form-check-label" for="toppingBlackOlives">
                            <img src="./img/blackolives.png" alt= "Black Olives Topping">
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="toppings[]" value="GreenOlives" id="toppingGreenOlives">
                        <label class="form-check-label" for="toppingGreenOlives">
                            <img src="./img/greenolives.png" alt= "Green Olives Topping">
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <!-- Drinks Section -->
                <div class="form-group">
                    <label for="drink">Select a Drink</label>
                    <select class="form-control" id="drink" name="drinks[]">
                        <option value="Soda">Soda</option>
                        <option value="Water">Water</option>
                        <option value="Juice">Juice</option>
                    </select>
                    <label for="drink_quantity">Quantity</label>
                    <input type="number" class="form-control" id="drink_quantity" name="drink_quantities[]" value="1" min="1">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="deliveryAddress">Delivery Address</label>
                    <input type="text" class="form-control" id="deliveryAddress" name="delivery_address">
                </div>
            </div>
        </div>
            <button type="submit" class="btn btn-primary">Place Order</button>
        </form>
            <!-- End of the pizza order form -->
        </div>
</body>
</html>