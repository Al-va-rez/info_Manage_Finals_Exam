<?php
    session_start();

    // if user not yet registered and/or logged in
    if(!isset($_SESSION['username'])) {
        header('Location: login.php');
    }

    $menu = [
        'Fishball' => 30,
        'Kikiam' => 40,
        'Corndog' => 50
    ];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Discriminant Value</title>
        <style>
            body {
                background-color: cornflowerblue;
                font-family: Verdana, Geneva, Tahoma, sans-serif;
            }
            div {
                background-color: white;
                border: 5px solid;
                width: fit-content;
                padding: 50px;
                margin: auto;
                margin-top: 50px;
            }
            form {
                margin-top: 36px;
            }
            h2 {
                margin-top: 40px;
            }
        </style>
    </head>
    <body>
        <div>
            <h1>Welcome to the canteen, <u><?php echo $_SESSION['username'];?></u>!</h1>
            <p><a href="logout.php">Logout</a></p>

            <h2>Today's menu is:</h2>
            <ul>
                <?php
                    foreach ($menu as $item => $price) {
                        echo '<li>'. $item . ' - PHP ' . $price . '</li>';
                    }
                ?>
            </ul>

            <form action="index.php" method="POST">
                <!-- Food -->
                <p>
                    <label for="customer_order">Choose your order: </label>
                    <select name="food_order" id="customer_order">
                        <option value="Fishball">Fishball</option>
                        <option value="Kikiam">Kikiam</option>
                        <option value="Corndog">Corndog</option>
                    </select>
                </p>

                <!-- Quantity -->
                <p>
                    <label for="num_of_order">Quantity: </label>
                    <input type="text" id="num_of_order" placeholder="How many?" name="food_quantity">
                </p>

                <!-- Cash -->
                <p>
                    <label for="customer_cash">Cash: </label>
                    <input type="text" id="customer_cash" name="payment">
                </p>

                <p><input type="submit" value="Submit" name="submit_order"></p>
            </form>

            <?php
                // Check if the form is submitted
                if(isset($_POST['submit_order'])) {

                    // check if inputs are int and are not negative numbers
                    $valid_input1 = filter_var($_POST['food_quantity'], FILTER_VALIDATE_INT) && $_POST['food_quantity'] > 0;
                    $valid_input2 = filter_var($_POST['payment'], FILTER_VALIDATE_INT) && $_POST['food_quantity'] > 0;

                    // Get the values
                    if ($valid_input1 && $valid_input2) {
                        $user_Food_Order = $_POST['food_order'];
                        $user_Order_Quantity = $_POST['food_quantity'];
                        $user_Payment = $_POST['payment'];

                        $subtotal = $menu[$user_Food_Order] * $user_Order_Quantity;
                        $change = $user_Payment - $subtotal;

                        echo '<h3>You ordered: ' . $user_Food_Order . '</h3>';
                        echo '<h3>Quantity: ' . $user_Order_Quantity . '</h3>';
                        echo '<h3>Total price is: ' . $subtotal . '</h3>';
                        echo '<h3>Your payment is: ' . $user_Payment . '</h3>';

                        // check if amount paid is correct
                        if ($user_Payment >= $subtotal) {
                            if ($user_Payment > $subtotal) {
                                echo '<h3>Your change is: '. $change . '</h3>';
                            }
                            echo '<h2>Thank you, <u>' . $_SESSION['username'] . '</u>! Enjoy your meal!</h2>';
                        } else {
                            echo '<h2><u>Not enough cash</u></h2>';
                        }
                    }
                    // check if a text field remaines empty
                    else if (empty($_POST['food_quantity']) || empty($_POST['payment'])) {
                        echo '<h2>THERE ARE MISSING INFORMATION</h2>';
                    }
                    else {
                        echo '<h2>INVALID INPUT. POSITIVE INTEGERS ONLY</h2>';
                    }
                }
            ?>
        </div>
    </body>
</html>