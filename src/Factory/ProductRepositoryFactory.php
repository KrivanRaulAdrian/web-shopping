<?php

namespace Project3\Factory;

use Project3\Repository\ProductRepository;
use Project3\Repository\ProductRepositoryFromPdo;

class ProductRepositoryFactory
{
    public static function makeProduct(): ProductRepository
    {
        $pdo = require __DIR__ . '/../../config/conn.php';
        return new ProductRepositoryFromPdo($pdo);
    }
}
