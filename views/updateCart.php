<?php

define('PAGE_TITLE', 'Update Cart');

require_once __DIR__ . '/header.php';

?>

<h1>Product Management - <?= PAGE_TITLE ?></h1>

<link rel="stylesheet" href="https://unpkg.com/modern-normalize">

<form action="/index.php?action=updateCart" method="post">
    <label>Product ID:<br>
        <input name="id" value="<?= $product->id() ?>" type="number" readonly />
    </label>
    <br><br>
    <label>Product Name:<br>
        <input name="name" value="<?= $product->name() ?>" type="text" readonly />
    </label>
    <br><br>
    <label>Product Description:<br>
        <input name="description" value="<?= $product->description() ?>" type="text" readonly />
    </label>
    <br><br>
    <label>Product Price:<br>
        <input name="price" value="<?= $product->price() ?>" type="number" readonly />
    </label>
    <br><br>
    <label>Product Quantity:<br>
        <input name="quantity" value="<?= $_GET['quantity'] ?>" type="number" required />
    </label>
    <br><br>
    <button type="submit">Update</button>
</form>

<?php require_once __DIR__ . '/footer.php' ?>