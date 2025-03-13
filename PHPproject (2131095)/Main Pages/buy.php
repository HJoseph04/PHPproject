<?php include 'PHPfunctions.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Buy - PotPal</title>
</head>
<body>
    <header>
        <img src="logo.png.png" alt="PotPal Logo">
        <nav>
            <a href="index.php">Home</a>
            <a href="buy.php">Buy</a>
            <a href="orders.php">Orders</a>
        </nav>
    </header>
    <main>
        <h1>Purchase a Product</h1>
        <form method="POST" action="">
            <label for="productCode">Product Code *</label>
            <input type="text" name="productCode" required>
            <span class="error"><?php echo $errorProductCode ?? ''; ?></span>

            <label for="firstName">First Name *</label>
            <input type="text" name="firstName" required>
            <span class="error"><?php echo $errorFirstName ?? ''; ?></span>

            <label for="lastName">Last Name *</label>
            <input type="text" name="lastName" required>
            <span class="error"><?php echo $errorLastName ?? ''; ?></span>

            <label for="city">City *</label>
            <input type="text" name="city" required>
            <span class="error"><?php echo $errorCity ?? ''; ?></span>

            <label for="comments">Comments</label>
            <textarea name="comments" maxlength="200"></textarea>

            <label for="price">Price *</label>
            <input type="number" name="price" required>
            <span class="error"><?php echo $errorPrice ?? ''; ?></span>

            <label for="quantity">Quantity *</label>
            <input type="number" name="quantity" required>
            <span class="error"><?php echo $errorQuantity ?? ''; ?></span>

            <button type="submit">Submit Order</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                validateProductCode($_POST['productCode']);
                validateName($_POST['firstName'], 20);
                validateName($_POST['lastName'], 20);
                validateCity($_POST['city']);
                validatePrice($_POST['price']);
                validateQuantity($_POST['quantity']);

                $subtotal = $_POST['price'] * $_POST['quantity'];
                $taxes = round($subtotal * 0.161, 2);
                $grandTotal = round($subtotal + $taxes, 2);

                $orderData = [
                    'ProductCode' => $_POST['productCode'],
                    'FirstName' => $_POST['firstName'],
                    'LastName' => $_POST['lastName'],
                    'City' => $_POST['city'],
                    'Price' => $_POST['price'],
                    'Quantity' => $_POST['quantity'],
                    'Comments' => $_POST['comments'],
                    'Subtotal' => number_format($subtotal, 2),
                    'Taxes' => number_format($taxes, 2),
                    'GrandTotal' => number_format($grandTotal, 2)
                ];

                saveOrder($orderData);
                echo "<p>Order placed successfully!</p>";
            } catch (Exception $e) {
                echo "<span class='error'>{$e->getMessage()}</span>";
            }
        }
        ?>
    </main>
    <footer>
        <p>Hunter Joseph (2131095) <?php echo date("Y"); ?></p>
    </footer>
</body>
</html>