<?php

define('PAGE_TITLE', 'Product Cart');

$products = $_SESSION['cart_session'];

require_once __DIR__ . '/header.php';

?>
<link rel="stylesheet" href="https://unpkg.com/modern-normalize">

<body>
    <h1>Product Management - <?= PAGE_TITLE ?></h1>
    <form action="/index.php?action=completeOrder" method="post">
        <table border="1">
            <tr>
                <th width="200">Product ID</th>
                <th width="200">Product Name</th>
                <th width="200">Product Description</th>
                <th width="200">Product Price</th>
                <th width="200">Product Quantity</th>
                <th width="200">Product Update</th>
                <th width="200">Product Delete</th>
            </tr>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td align="center"><?= $product->id ?></td>
                    <td align="center"><?= $product->name ?></td>
                    <td align="center"><?= $product->description ?></td>
                    <td align="center"><?= "$" . $product->price ?></td>
                    <td align="center"><?= $product->quantity ?></td>
                    <td align="center"><?= "<a href='/index.php?action=updateCart&id={$product->id}&quantity={$product->quantity}'>Update</a>"; ?></td>
                    <td align="center"><?= "<a href='/index.php?action=deleteFromCart&id={$product->id}&name={$product->name}'>Delete</a>"; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <br>
        <?php if (count($products) === 0) {
            echo "<b><i>Cart is empty</i></b>";
        } else {
            echo '<button type="submit">Proceed To Checkout</button>';
        } ?>
    </form>
</body>

<?php require_once __DIR__ . '/footer.php' ?>