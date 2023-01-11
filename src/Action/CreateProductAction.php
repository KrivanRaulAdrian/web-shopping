<?php

namespace Project3\Action;

use Project3\Entity\Product;
use Project3\Factory\ProductRepositoryFactory;

class CreateProductAction
{
    public function handle(): void
    {
        $product = new Product(
            filter_input(INPUT_POST, 'name'),
            filter_input(INPUT_POST, 'description'),
            filter_input(INPUT_POST, 'price'),
            filter_input(INPUT_POST, 'quantity')
        );

        $repository = ProductRepositoryFactory::makeProduct();
        $repository->createProduct($product);

        header('Location: /index.php');
    }
}
