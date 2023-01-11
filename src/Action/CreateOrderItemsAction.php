<?php

namespace Project3\Action;

use Project3\Entity\OrderItems;
use Project3\Factory\OrderItemsRepositoryFactory;

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

        header('Location: /index.php');
    }
}
