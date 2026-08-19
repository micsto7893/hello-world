<?php

session_start();
include '../includes/db.php';
include '../models/Product.php';
// Create cart session if it does not exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Handle Add to Cart
if (isset($_POST['add_to_cart'])) {
    $product_id = intval($_POST['product_id']);

    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]++;
    } else {
        $_SESSION['cart'][$product_id] = 1;
    }
}

// Create Product model
$productModel = new Product($conn);

// Get all products
$products = $productModel->getAllProducts();

// Send data to the view
include '../views/catalog.php';

$conn->close();
?>