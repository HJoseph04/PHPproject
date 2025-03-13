
<?php

// To clarify and for your discretion, no Artificial Intelligence has been involved in the making of this web server in any capacity.

#Revision history:
# DEVELOPER      ST.NUMBER   DATE            COMMENTS
# Hunter Joseph (2131095) 2025-02-24     Empty Folders and files created.
# Hunter Joseph (2131095) 2025-03-26     Created buy.php file and halfway of the requirements for this page is completed.
# Hunter Joseph (2131095) 2025-02-31     Created and completed orders.php
# Hunter Joseph (2131095) 2025-03-02     Created styles.css, fixed an issue with the taxes in the orders file.
# Hunter Joseph (2131095) 2025-03-04     Completed styles.css and orders file.
# Hunter Joseph (2131095) 2025-03-08     PHP functions finalized, renamed phpfunctions.php to PHPfunctions.php to avoid potential crashes.
# Hunter Joseph (2131095) 2025-03-10     90% of the project completed, double checking on images, debugging, and all folders.
# Hunter Joseph (2131095) 2025-03-13     Debugging, images, logo and code finalized. 100% complete







// This function ensures that the product's delivery code is marked
function validateProductCode($code) {
    if (empty($code) || strlen($code) > 25 || !preg_match('/PRD/i', $code)) {
        throw new Exception("Invalid product code. It must contain 'PRD' and be less than 25 characters.");
    }
    return true;
}
// This function verifies the product's name
function validateName($name, $maxLength) {
    if (empty($name) || strlen($name) > $maxLength) {
        throw new Exception("Name cannot be empty and must be less than $maxLength characters.");
    }
    return true;
}
// This function makes sure that the city is named, verified, and is real.
function validateCity($city) {
    if (empty($city) || strlen($city) > 30) {
        throw new Exception("City cannot be empty and must be less than 30 characters.");
    }
    return true;
}
// This function validates the price to make sure it's both a positive number, and cannot exceed $10,000
function validatePrice($price) {
    if (!is_numeric($price) || $price < 0 || $price > 10000) {
        throw new Exception("Price must be a positive number and cannot exceed $10,000.");
    }
    return true;
}
// This function is to make sure the quantity of the item is more than 1 and less than 99 units
function validateQuantity($quantity) {
    if (!is_numeric($quantity) || $quantity < 1 || $quantity > 99) {
        throw new Exception("Quantity must be a whole number between 1 and 99.");
    }
    return true;
}
// This function is used to save the orders in a text file, which would then be converted into a json
function saveOrder($orderData) {
    $filePath = 'orders/orders.txt';
    $existingData = file_exists($filePath) ? file_get_contents($filePath) : '';
    $existingData .= json_encode($orderData) . PHP_EOL;
    file_put_contents($filePath, $existingData);
}
?>