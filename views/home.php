<?php

define('PAGE_TITLE', 'Create Product');

require_once __DIR__ . '/header.php';

?>

<link rel="stylesheet" href="https://unpkg.com/modern-normalize">

<body>
    <form action="/index.php?action=createProduct" method="post">
        <label>Product Name:
            <input type="text" name="name" placeholder="Name..." required /><br><br>
        </label>
        <label>Product Description:
            <input type="text" name="description" placeholder="Description..." /><br><br>
        </label>
        <label>Product Price:
            <input type="number" name="price" placeholder="Price..." required /><br><br>
        </label>
        <label>Product Quantity:
            <input type="number" name="quantity" placeholder="Quantity..." required /><br><br>
        </label>
        <button type="submit">Create</button>
    </form>

    <hr />

    <table border="1">
        <tr>
            <th width="200">Product Name</th>
            <th width="200">Product Description</th>
            <th width="200">Product Price</th>
            <th width="200">Product Quantity</th>
            <th width="200">Product Update</th>
            <th width="200">Product Delete</th>
        </tr>
        <?php foreach ($products as $product) : ?>
            <tr>
                <td align="center"><?= $product->name() ?></td>
                <td align="center"><?= $product->description() ?></td>
                <td align="center"><?= "$" . $product->price() ?></td>
                <td align="center"><?= $product->quantity() ?></td>
                <td align="center"><?= "<a href='/index.php?action=updateProduct&id={$product->id()}'>Update</a>" ?></td>
                <td align="center"><?= "<a href='/index.php?action=deleteProduct&id={$product->id()}'>Delete</a>" ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

<?php require_once __DIR__ . '/footer.php' ?>