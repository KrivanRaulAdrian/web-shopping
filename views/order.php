<?php

use Project3\Factory\OrderRepositoryFactory;

define('PAGE_TITLE', 'Product Orders');

require_once __DIR__ . '/header.php';

$repository = OrderRepositoryFactory::makeOrder();
$orders = $repository->getAllOrders();

?>

<link rel="stylesheet" href="https://unpkg.com/modern-normalize">

<h1>Product Management - <?= PAGE_TITLE ?></h1>
<table border="1">
    <tr>
        <th width="200">Order ID</th>
        <th width="200">Order Total</th>
        <th width="200">Order Checkout Date</th>
        <th width="200">Details</th>
    </tr>
    <?php foreach ($orders as $order) : ?>
        <tr>
            <td align="center"><?= $order->id() ?></td>
            <td align="center"><?= "$" . $order->total() ?></td>
            <td align="center"><?= $order->completed_at() ?></td>
            <td align="center"><?= "<a href='/index.php?action=displayOrderItems&order_id={$order->id()}'>Details</a>" ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php require_once __DIR__ . '/footer.php' ?>