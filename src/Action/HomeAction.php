<?php

namespace Project3\Action;

use Project3\Factory\ProductRepositoryFactory;

class HomeAction
{
    public function handle(): void
    {
        $repository = ProductRepositoryFactory::makeProduct();
        $products = $repository->getAllProducts();

        require_once __DIR__ . '/../../views/home.php';
    }
}
