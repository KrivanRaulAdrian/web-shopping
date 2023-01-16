<?php

use Project3\Factory\OrderItemsRepositoryFactory;

define('PAGE_TITLE', 'Order Details');

require_once __DIR__ . '/header.php';

$orderId = filter_input(INPUT_GET, 'order_id');

$repository = OrderItemsRepositoryFactory::makeOrderItems();
$orderItems = $repository->getByOrderId($orderId);

?>

<link rel="stylesheet" href="https://unpkg.com/modern-normalize">

<h1>Product Management - <?= PAGE_TITLE ?></h1>
<table border="1">
    <tr>
        <th width="200">Order ID</th>
        <th width="200">Product ID</th>
        <th width="200">Product Name</th>
        <th width="200">Product Quantity</th>
        <th width="200">Product Price</th>
    </tr>
    <?php foreach ($orderItems as $item) : ?>
        <tr>
            <td align="center"><?= $item->order_id ?></td>
            <td align="center"><?= $item->product_id ?></td>
            <td align="center"><?= $item->name ?></td>
            <td align="center"><?= $item->quantity ?></td>
            <td align="center"><?= "$" . $item->price ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php require_once __DIR__ . '/footer.php' ?>