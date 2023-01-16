<?php

namespace Project3;

use Project3\Action\AddToCartAction;
use Project3\Action\AlertMessages;
use Project3\Action\CheckoutDisplayAction;
use Project3\Action\CreateOrderAction;
use Project3\Action\CreateOrderItemsAction;
use Project3\Action\CreateProductAction;
use Project3\Action\DeleteFromCartAction;
use Project3\Action\HomeAction;
use Project3\Action\DeleteProductAction;
use Project3\Action\DisplayCartAction;
use Project3\Action\UpdateProductAction;
use Project3\Action\DisplayCatalogueAction;
use Project3\Action\DisplayOrderAction;
use Project3\Action\DisplayOrderItemsAction;
use Project3\Action\UpdateCartAction;

class Application
{
    public function run(): void
    {
        $action = filter_input(INPUT_GET, 'action');

        match ($action) {
            'createProduct' => (new CreateProductAction())->handle(),
            default => (new HomeAction())->handle(),
            'deleteProduct' => (new DeleteProductAction())->handle(),
            'updateProduct' => (new UpdateProductAction())->handle(),
            'displayCatalogue' => (new DisplayCatalogueAction())->handle(),
            'displayCart' => (new DisplayCartAction())->handle(),
            'addToCart' => (new AddToCartAction())->handle(),
            'deleteFromCart' => (new DeleteFromCartAction())->handle(),
            'updateCart' => (new UpdateCartAction())->handle(),
            'completeOrder' => (new CheckoutDisplayAction())->handle(),
            'createOrder' => (new CreateOrderAction())->handle(),
            'displayOrder' => (new DisplayOrderAction())->handle(),
            'displayOrderItems' => (new DisplayOrderItemsAction())->handle(),
        };
    }
}
