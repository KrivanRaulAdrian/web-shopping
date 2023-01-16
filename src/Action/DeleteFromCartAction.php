<?php

namespace Project3\Action;

session_name('cart_session');
session_start();

class DeleteFromCartAction
{
    public function handle()
    {
        $id = filter_input(INPUT_GET, 'id');

        $name = filter_input(INPUT_GET, 'name');

        $productArrayDelete = array();

        $productArray = $_SESSION['cart_session'];

        foreach ($productArray as $prod) {
            if ($id !== $prod->id) {
                $productArrayDelete[] = $prod;
            }
            $_SESSION['cart_session'] = $productArrayDelete;
        }
        echo "<b><i>Product $name was deleted successfully!</i></b>";

        require_once __DIR__ . '/../../views/cart.php';
    }
}
