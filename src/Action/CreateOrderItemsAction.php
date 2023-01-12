<?php

namespace Project3\Action;

use Project3\Entity\OrderItems;
use Project3\Factory\OrderItemsRepositoryFactory;

session_name('cart_session');
session_start();

class CreateOrderItemsAction
{
    public function handle(): void
    {
        $orderItems = new OrderItems(
            filter_input(INPUT_POST, 'quantity'),
            filter_input(INPUT_POST, 'price')
        );

        $repository = OrderItemsRepositoryFactory::makeOrderItems();
        $repository->createOrderItems($orderItems);

        session_destroy();

        require_once __DIR__ . '/../../views/details.php';
    }
}
