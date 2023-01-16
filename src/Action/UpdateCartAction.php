<?php

namespace Project3\Action;

use Project3\Factory\ProductRepositoryFactory;

session_name('cart_session');
session_start();

class UpdateCartAction
{
    public function handle()
    {
        if (isset($_POST['id']) && $_POST['name'] && $_POST['description'] && $_POST['price'] && $_POST['quantity']) {
            $productArrayUpdate = array();

            $productArray = $_SESSION['cart_session'];
            foreach ($productArray as $prod) {
                if ($_POST['id'] === $prod->id) {
                    $prod->quantity = $_POST['quantity'];
                    echo "<b><i>$prod->name was updated successfully!</i></b>";
                }
                $productArrayUpdate[] = $prod;
            }
            $_SESSION['cart_session'] = $productArrayUpdate;

            require_once __DIR__ . '/../../views/cart.php';
        } else {

            $id = filter_input(INPUT_GET, 'id');

            $productRepository = ProductRepositoryFactory::makeProduct();
            $product = $productRepository->getById($id);

            require_once __DIR__ . '/../../views/updateCart.php';
        }
    }
}
