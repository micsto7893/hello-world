<?php include '../includes/header.php'; ?>
<h2>Shopping Cart</h2>
<?php if (empty($cartItems)) { ?>
    <p>Your shopping cart is currently empty.</p>
<?php } else { ?>
    <?php foreach ($cartItems as $item) { ?>
        <div class="product">
            <h3><?php echo htmlspecialchars($item['product_name']); ?></h3>
            <p>Product ID: <?php echo $item['product_id']; ?></p>
            <p>Price: $<?php echo number_format($item['product_cost'], 2); ?></p>
            <p>Quantity: <?php echo $item['quantity']; ?></p>

            <form method="post" action="../controllers/cartController.php">
                <input
                    type="hidden"
                    name="product_id"
                    value="<?php echo $item['product_id']; ?>">
                <button type="submit" name="increase"> + </button>
                <button type="submit" name="decrease"> - </button>
                <button type="submit" name="remove"> Remove </button>
            </form>
        </div>
    <?php } ?>
<?php } ?>

<br>

<a href="../controllers/catalogController.php">Continue Shopping</a>

</main>
</body>
</html>