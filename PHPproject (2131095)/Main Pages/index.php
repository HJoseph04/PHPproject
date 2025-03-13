
<?php include 'PHPfunctions.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - PotPal</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Welcome to PotPal</h1>
        <img src="logo.png.png" alt="PotPal Logo">
        <nav>
            <a href="index.php">Home</a>
            <a href="buy.php">Buy</a>
            <a href="orders.php">Orders</a>
        </nav>
    </header>
    <section>
        <p>At PotPal, we offer the best PCs on the market here in Canada.</p>
        <div class="advertisement">
            <?php
            $products = ['product1.png.jpg', 'product2.png.jpg', 'product3.png.jpg', 'product4.png.jpg', 'product5.png.jpg'];
            $featuredProduct = 'product2.png'; // This product for example is sold at double price
            $randomProduct = $products[array_rand($products)];
            ?>
            <img src="<?php echo $randomProduct; ?>" alt="Product Advertisement" style="<?php echo $randomProduct === $featuredProduct ? 'border: 6px solid green; width: 200%;' : 'width: 100%;'; ?>">
        </div>
    </section>
    <footer>
        <p>Hunter Joseph (2131095) <?php echo date("Y"); ?></p>
    </footer>
</body>
</html>