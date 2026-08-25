<?php
session_start();

include '../includes/db.php';
include '../models/Product.php';

if (!isset($_SESSION['cart'])) {$_SESSION['cart'] = array();}

//Increase quantity
if (isset($_POST['increase'])) {$product_id = intval($_POST['product_id']);

    if (isset($_SESSION['cart'][$product_id])) {$_SESSION['cart'][$product_id]++;}
}

//Decrease quantity
if (isset($_POST['decrease'])) {$product_id = intval($_POST['product_id']);

    if (isset($_SESSION['cart'][$product_id])) {$_SESSION['cart'][$product_id]--;

        if ($_SESSION['cart'][$product_id] <= 0) {unset($_SESSION['cart'][$product_id]);}
    }
}

//Remove product
if (isset($_POST['remove'])) {$product_id = intval($_POST['product_id']); unset($_SESSION['cart'][$product_id]);}

$productModel = new Product($conn);
$cartItems = array();
$totalItems = 0;
$subtotal = 0;

foreach ($_SESSION['cart'] as $product_id => $quantity) {$product = $productModel->getProductById($product_id);
    if ($product) {
        $lineTotal = $product['product_cost'] * $quantity;
        $product['quantity'] = $quantity;
        $product['line_total'] = $lineTotal;
        $cartItems[] = $product;
        $totalItems += $quantity;
        $subtotal += $lineTotal;}
}

//Checkout
if (isset($_POST['checkout'])) {$_SESSION['cart'] = array(); header("Location: catalogController.php");
        exit;
}

//Calculate tax and shipping
$tax = $subtotal * 0.05;
$shipping = $subtotal * 0.10;
$grandTotal = $subtotal + $tax + $shipping;
include '../views/cart.php';

$conn->close();
?>
