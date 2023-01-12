<?php

namespace Project3\Action;

use Project3\Factory\ProductRepositoryFactory;

class DeleteProductAction
{

    public function handle(): void
    {
        $id = filter_input(INPUT_GET, 'id');

        $productRepository = ProductRepositoryFactory::makeProduct();
        $product = $productRepository->getById($id);
        $productRepository->deleteProduct($product);

        header('Location: /index.php');
    }
}
