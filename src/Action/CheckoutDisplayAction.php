<?php

namespace Project3\Action;

class CheckoutDisplayAction
{
    public function handle()
    {
        session_name('cart_session');
        session_start();
        if (!isset($_SESSION['cart_session'])) {
            $_SESSION['cart_session'] = array();
        }
        require_once __DIR__ . '/../../views/checkout.php';
    }
}
