<?php
session_start();

include 'includes/db.php';

// Create cart if needed
if (!isset($_SESSION['cart'])) {$_SESSION['cart'] = array();}

// Increase quantity
if (isset($_POST['increase'])) {$product_id = intval($_POST['product_id']);
    if (isset($_SESSION['cart'][$product_id])) {$_SESSION['cart'][$product_id]++;}
}

// Decrease quantity
if (isset($_POST['decrease'])) {$product_id = intval($_POST['product_id']);
    if (isset($_SESSION['cart'][$product_id])) {$_SESSION['cart'][$product_id]--;
        if ($_SESSION['cart'][$product_id] <= 0) {unset($_SESSION['cart'][$product_id]);}
    }
}

// Remove product
if (isset($_POST['remove'])) {$product_id = intval($_POST['product_id']);
    unset($_SESSION['cart'][$product_id]);}
include 'includes/header.php';?>

<h2>Shopping Cart</h2>

<?php
if (empty($_SESSION['cart'])) {echo "<p>Your shopping cart is currently empty.</p>";} 
else {foreach ($_SESSION['cart'] as $product_id => $quantity) {
        $sql = "SELECT product_id, product_name, product_cost
                FROM products
                WHERE product_id = $product_id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {$product = $result->fetch_assoc();?>

    <div class="product">
        <h3><?php echo htmlspecialchars($product['product_name']); ?></h3>

        <p>Product ID: <?php echo $product['product_id']; ?></p>
        <p>Price: $<?php echo number_format($product['product_cost'], 2); ?></p>
        <p>Quantity: <?php echo $quantity; ?></p>

        <form method="post" action="cart.php">
            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
            <button type="submit" name="increase"> + </button>
            <button type="submit" name="decrease"> - </button>
            <button type="submit" name="remove"> Remove </button>
        </form>
    </div>
<?php
        }
    }
}
?>

<br>

<a href="catalog.php">Continue Shopping</a>

</main>
</body>
</html>

<?php
$conn->close();
?>
