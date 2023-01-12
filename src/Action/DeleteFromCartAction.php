<?php

namespace Project3\Action;

session_name('cart_session');
session_start();

class DeleteFromCartAction
{
    public function handle()
    {
        $id = filter_input(INPUT_GET, 'id');

        $productArrayDelete = array();

        $productArray = $_SESSION['cart_session'];

        foreach ($productArray as $prod) {
            if ($id != $prod->id) {
                $productArrayDelete[] = $prod;
            }
            $_SESSION['cart_session'] = $productArrayDelete;
        }
        require_once __DIR__ . '/../../views/cart.php';
    }
}
