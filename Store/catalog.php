<?php
session_start();

include 'includes/db.php';
include 'includes/header.php';

$sql = "SELECT product_id, product_name, product_description, product_cost
        FROM products";

$result = $conn->query($sql);
?>

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

        <p>
            <?php echo htmlspecialchars($row['product_description']); ?>
        </p>

        <p>
            <strong>
                $<?php echo number_format($row['product_cost'], 2); ?>
            </strong>
        </p>

        <p>
            Product ID: <?php echo $product_id; ?>
        </p>

        <p>
            Quantity in Cart: <?php echo $cart_quantity; ?>
        </p>
    </div>

<?php
    }

} else {
    echo "<p>No products found.</p>";
}
?>

</div>

</main>
</body>
</html>

<?php
$conn->close();
?>
