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
            <p>Item Total: $<?php echo number_format($item['line_total'], 2); ?></p>

            <form method="post" action="../controllers/cartController.php">
                <input type="hidden" name="product_id" value="<?php echo $item['product_id']; ?>">
                <button type="submit" name="increase"> + </button>
                <button type="submit" name="decrease"> - </button>
                <button type="submit" name="remove"> Remove </button>
            </form>
        </div>
    <?php } ?>

    <hr>

    <h3>Order Summary</h3>

    <p>Total Items: <?php echo $totalItems; ?></p>
    <p>Subtotal: $<?php echo number_format($subtotal, 2); ?></p>
    <p>Tax (5%): $<?php echo number_format($tax, 2); ?></p>
    <p>Shipping & Handling (10%): $<?php echo number_format($shipping, 2); ?></p>
    <p><strong>Order Total: $<?php echo number_format($grandTotal, 2); ?></strong></p>

    <form method="post" action="../controllers/cartController.php">
        <button type="submit" name="checkout">Checkout</button>
    </form>
<?php } ?>

<br>

<a href="../controllers/catalogController.php">Continue Shopping</a>

</main>
</body>
</html>
