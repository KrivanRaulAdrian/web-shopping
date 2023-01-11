<?php

namespace Project3\Repository;

use Project3\Entity\Product;

interface ProductRepository
{
    public function createProduct(Product $product): void;
    public function getAllProducts(): array;
    public function getById($id): Product;
    public function updateProduct(): void;
    public function deleteProduct($id): void;
}
