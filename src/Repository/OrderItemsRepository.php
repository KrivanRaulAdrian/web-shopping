<?php

namespace Project3\Repository;

use Project3\Entity\OrderItems;

interface OrderItemsRepository
{
    public function createOrderItems(OrderItems $orderItems): void;
    public function getByOrderId($orderId): array|bool;
}
