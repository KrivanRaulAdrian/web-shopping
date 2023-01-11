<?php

namespace Project3\Action;

session_name('cart_session');
session_start();

class AddToCartAction
{
    public function handle()
    {
        if (!isset($_SESSION['cart_session'])) {
            $_SESSION['cart_session'] = array();
        }

        $product = new \stdClass();
        $product->id = $_GET['id'];
        $product->name = $_GET['name'];
        $product->description = $_GET['description'];
        $product->price = $_GET['price'];
        $product->quantity = 1;

        $productArrayDuplicate = array();
        $productArray = $_SESSION['cart_session'];

        $foundProduct = false;

        foreach ($productArray as $prod) {
            if ($_GET['id'] === $prod->id) {
                $foundProduct = true;
                echo "<b><i>$prod->name is already in the cart, added 1 to the existing quantity.</i></b>";
                $prod->quantity += 1;
            }
            $productArrayDuplicate[] = $prod;
        }
        if (!$foundProduct) {
            $product->name = $_GET['name'];
            $productArrayDuplicate[] = $product;
            echo "<b><i>Product $product->name added to the cart.</i></b>";
        }
        $_SESSION['cart_session'] = $productArrayDuplicate;

        require_once __DIR__ . '/../../views/catalogue.php';
    }
}
