<?php include 'PHPfunctions.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Orders - PotPal</title>
</head>
<body style="<?php echo isset($_GET['action']) && $_GET['action'] === 'print' ? 'background-color: white; opacity: 0.3;' : ''; ?>">
    <header>
        <img src="logo.png.png" alt="PotPal Logo">
        <nav>
            <a href="index.php">Home</a>
            <a href="buy.php">Buy</a>
            <a href="orders.php">Orders</a>
        </nav>
    </header>
    <main>
        <h1>Order List</h1>
        <table border="1">
            <tr>
                <th>Product ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>City</th>
                <th>Comments</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Taxes</th>
                <th>Grand Total</th>
            </tr>
            <?php
            $filePath = 'orders/orders.txt';
            if (file_exists($filePath)) {
                $orders = file($filePath, FILE_IGNORE_NEW_LINES);
                foreach ($orders as $order) {
                    $data = json_decode($order, true);
                    echo "<tr>";
                    echo "<td>{$data['ProductCode']}</td>";
                    echo "<td>{$data['FirstName']}</td>";
                    echo "<td>{$data['LastName']}</td>";
                    echo "<td>{$data['City']}</td>";
                    echo "<td>{$data['Comments']}</td>";
                    echo "<td>\${$data['Price']}</td>";
                    echo "<td>{$data['Quantity']}</td>";
                    echo "<td>\${$data['Subtotal']}</td>";
                    echo "<td>\${$data['Taxes']}</td>";
                    echo "<td style='color: " . ($data['Subtotal'] < 100 ? 'red' : ($data['Subtotal'] < 1000 ? 'orange' : 'green')) . "'>\${$data['GrandTotal']}</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='10'>No orders found.</td></tr>";
            }
            ?>
        </table>
    </main>
    <footer>
        <p>Hunter Joseph (2131095) <?php echo date("Y"); ?></p>
    </footer>
</body>
</html>