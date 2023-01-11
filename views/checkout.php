<?php

define('PAGE_TITLE', 'Product Checkout');

$products = $_SESSION['cart_session'];

require_once __DIR__ . '/header.php';

foreach ($products as $product) {
    $prices[] = $product->price * $product->quantity;
    $total = array_sum($prices);
    $quantity = $product->quantity + $product->quantity;
}

?>

<link rel="stylesheet" href="https://unpkg.com/modern-normalize">

<body>
    <h1>Product Management - <?= PAGE_TITLE ?></h1>

    <form action="/index.php?action=createOrder" method="post">
        <hr />
        <table border="1">
            <tr>
                <th width="200">Product Name</th>
                <th width="200">Product Total Quantity</th>
                <th width="200">Product Total</th>
            </tr>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td align="center"><?= $product->name ?></td>
                    <td align="center"><input type="hidden" name="quantity" value="<?= $product->quantity ?>" readonly><?= $product->quantity ?></td>
                    <td align="center"><input type="hidden" name="price" value="<?= $product->quantity * $product->price ?>" readonly><?= "$" . $product->quantity * $product->price ?></td>
                <?php endforeach; ?>
                </tr>
                <tr>
                    <td align="center"><b>Select Checkout Date:</b></td>
                    <td align="center"><input type="datetime-local" name="completed_at" required></td>
                    <td align="center"><input type="hidden" name="total" value="<?= $total ?>" readonly><b>Order Total Cost: <?= "$" . $total ?></b></td>
                </tr>
        </table>
        <br>
        <button type="submit">Order Now</button>
    </form>
</body>

<?php require_once __DIR__ . '/footer.php' ?>