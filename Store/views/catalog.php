<?php include '../includes/header.php'; ?>

<h2>Product Catalog</h2>
<div class="products">

<?php if (!empty($products)) { ?>
    <?php foreach ($products as $product) { ?>
        <?php
        $product_id = $product['product_id'];
        $cart_quantity = 0;
        if (isset($_SESSION['cart'][$product_id])) {
            $cart_quantity = $_SESSION['cart'][$product_id];}
        ?>

        <div class="product">
            <h3><?php echo htmlspecialchars($product['product_name']); ?></h3>
            <p><?php echo htmlspecialchars($product['product_description']); ?></p>
            <p><strong>$<?php echo number_format($product['product_cost'], 2); ?></strong></p>
            <p>Product ID: <?php echo $product_id; ?></p>
            <p>Quantity in Cart: <?php echo $cart_quantity; ?></p>

            <form method="post" action="../controllers/catalogController.php">
                <input
                    type="hidden"
                    name="product_id"
                    value="<?php echo $product_id; ?>">
                <button type="submit" name="add_to_cart">Add to Cart</button>
            </form>
        </div>
    <?php } ?>
<?php } else { ?>
    <p>No products found.</p>
<?php } ?>

</div>

</main>
</body>
</html>