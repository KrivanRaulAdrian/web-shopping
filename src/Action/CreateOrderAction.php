<?php

namespace Project3\Action;

use Project3\Entity\Order;
use Project3\Entity\OrderItems;
use Project3\Factory\OrderItemsRepositoryFactory;
use Project3\Factory\OrderRepositoryFactory;

session_name('cart_session');
session_start();

class CreateOrderAction
{
    public function handle(): void
    {
        $orderId = uniqid('id', true);

        $order = new Order(
            $orderId,
            filter_input(INPUT_POST, 'total'),
            filter_input(INPUT_POST, 'completed_at'),
        );

        $repository = OrderRepositoryFactory::makeOrder();
        $repository->createOrder($order);

        $product = $_SESSION['cart_session'];

        foreach ($product as $prod) {
            $productId = $prod->id;
            $productPrice = $prod->price;
            $productQuantity = $prod->quantity;

            $orderItems = new OrderItems();
            $orderItems->order_id = $orderId;
            $orderItems->product_id = $productId;
            $orderItems->quantity = $productQuantity;
            $orderItems->price = $productPrice;

            $repository = OrderItemsRepositoryFactory::makeOrderItems();
            $repository->createOrderItems($orderItems);
        }

        session_destroy();

        require_once __DIR__ . '/../../views/order.php';
    }
}
