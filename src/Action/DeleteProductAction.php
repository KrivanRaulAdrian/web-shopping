<?php

namespace Project3\Action;

use PDOException;
use Project3\Factory\ProductRepositoryFactory;

class DeleteProductAction
{

    public function handle(): void
    {
        try {
            $id = filter_input(INPUT_GET, 'id');

            $productRepository = ProductRepositoryFactory::makeProduct();
            $product = $productRepository->getById($id);
            $productRepository->deleteProduct($product);

            header('Location: /index.php');
        } catch (PDOException $exception) {
            error_log($exception);
            echo <<<HTML
            <meta http-equiv="refresh" content="2; url='/index.php'" />
            HTML;
            echo "<b><i>Cannot delete a product that is present in an order!</b></i>";
        }
    }
}
