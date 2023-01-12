<?php

use Project3\Factory\OrderItemsRepositoryFactory;

define('PAGE_TITLE', 'Order Details');

require_once __DIR__ . '/header.php';

$repository = OrderItemsRepositoryFactory::makeOrderItems();
$products = $repository->getAllOrderItems();

?>

<link rel="stylesheet" href="https://unpkg.com/modern-normalize">

<h1>Product Management - <?= PAGE_TITLE ?></h1>
<table border="1">
    <tr>
        <th width="200">Order ID</th>
        <th width="200">Product ID</th>
        <th width="200">Product Quantity</th>
        <th width="200">Product Price</th>
    </tr>
</table>

<?php require_once __DIR__ . '/footer.php' ?>