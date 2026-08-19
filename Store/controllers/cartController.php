<?php
session_start();
include '../includes/db.php';
include '../models/Product.php';
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();}

// Increase quantity
if (isset($_POST['increase'])) {
    $product_id = intval($_POST['product_id']);
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]++;}}

// Decrease quantity
if (isset($_POST['decrease'])) {
    $product_id = intval($_POST['product_id']);
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]--;
        if ($_SESSION['cart'][$product_id] <= 0) {
            unset($_SESSION['cart'][$product_id]);}}}

// Remove product
if (isset($_POST['remove'])) {
    $product_id = intval($_POST['product_id']);
    unset($_SESSION['cart'][$product_id]);}

$productModel = new Product($conn);
$cartItems = array();

foreach ($_SESSION['cart'] as $product_id => $quantity) {
    $product = $productModel->getProductById($product_id);
    if ($product) {
        $product['quantity'] = $quantity;
        $cartItems[] = $product;}}

include '../views/cart.php';
$conn->close();
?>