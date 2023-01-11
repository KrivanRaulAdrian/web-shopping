<?php

namespace Project3\Factory;

use Project3\Repository\OrderRepository;
use Project3\Repository\OrderRepositoryFromPdo;

class OrderRepositoryFactory
{
    public static function makeOrder(): OrderRepository
    {
        $pdo = require __DIR__ . '/../../config/conn.php';
        return new OrderRepositoryFromPdo($pdo);
    }
}
