<?php

namespace Project3\Factory;

use Project3\Repository\OrderItemsRepository;
use Project3\Repository\OrderItemsRepositoryFromPdo;

class OrderItemsRepositoryFactory
{
    public static function makeOrderItems(): OrderItemsRepository
    {
        $pdo = require __DIR__ . '/../../config/conn.php';
        return new OrderItemsRepositoryFromPdo($pdo);
    }
}
