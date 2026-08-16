<?php
session_start();

include 'includes/db.php';

// Create the cart session if it does not already exist
if (!isset($_SESSION['cart'])) {$_SESSION['cart'] = array();}

// Handle Add to Cart
if (isset($_POST['add_to_cart'])) {
    $product_id = intval($_POST['product_id']);
    // If product is already in cart, increase quantity
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]++;
    } else {
        // Otherwise add it with quantity 1
        $_SESSION['cart'][$product_id] = 1;
    }
}

include 'includes/header.php';
$sql = "SELECT product_id, product_name, product_description, product_cost
        FROM products";
$result = $conn->query($sql);?>

<h2>Product Catalog</h2>
<div class="products">

<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $product_id = $row['product_id'];
        $cart_quantity = 0;
        if (isset($_SESSION['cart'][$product_id])) {
            $cart_quantity = $_SESSION['cart'][$product_id];
        }
?>

    <div class="product">
        <h3><?php echo htmlspecialchars($row['product_name']); ?></h3>

        <p><?php echo htmlspecialchars($row['product_description']); ?></p>
        <p><strong>$<?php echo number_format($row['product_cost'], 2); ?></strong></p>
        <p>Product ID: <?php echo $product_id; ?></p>
        <p>Quantity in Cart: <?php echo $cart_quantity; ?></p>

        <form method="post" action="catalog.php">
            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
            <button type="submit" name="add_to_cart"> Add to Cart </button>
        </form>
    </div>
<?php
    }
} else {echo "<p>No products found.</p>";}
?>

</div>

</main>
</body>
</html>

<?php
$conn->close();
?>
