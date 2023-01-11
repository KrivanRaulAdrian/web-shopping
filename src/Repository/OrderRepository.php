<?php

namespace Project3\Repository;

use Project3\Entity\Order;

interface OrderRepository
{
    public function createOrder(Order $order): void;
    public function getAllOrders(): array;
}
