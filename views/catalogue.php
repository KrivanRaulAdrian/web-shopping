<?php

use Project3\Factory\ProductRepositoryFactory;

define('PAGE_TITLE', 'Product Catalogue');

require_once __DIR__ . '/header.php';

$repository = ProductRepositoryFactory::makeProduct();
$products = $repository->getAllProducts();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/modern-normalize">
    <style>
        li {
            list-style-type: none;
        }

        ul {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
        }

        img {
            display: block;
            aspect-ratio: 1 / 1;
            object-fit: contain;
            max-width: 100%;
        }
    </style>
</head>

<body>

    <h1>Product Management - <?= PAGE_TITLE ?></h1>
    <ul>
        <?php foreach ($products as $product) : ?>
            <li>
                <img src="/images/<?= random_int(1, 31) ?>.jpeg" alt="Product Image"><br>
                <small style="font-size: 10px">Product ID #<?= $product->id() ?></small>
                <p>Product Name: <?= $product->name() ?></p>
                <p>Product Description: <?= $product->description() ?></p>
                <p>Product Price: $<?= $product->price() ?></p>
                <?= "<a href='/index.php?action=addToCart&id={$product->id()}&name={$product->name()}&description={$product->description()}&price={$product->price()}'>Add To Cart</a>"; ?>
            </li>
        <?php endforeach; ?>
    </ul>
    <br>

    <a href="#">Back To Top</a><br>

</body>

</html>

<?php require_once __DIR__ . '/footer.php'; ?>