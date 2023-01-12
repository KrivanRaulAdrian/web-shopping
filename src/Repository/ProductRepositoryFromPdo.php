<?php

namespace Project3\Repository;

use Project3\Entity\Product;
use PDO;

class ProductRepositoryFromPdo implements ProductRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function createProduct(Product $product): void
    {
        $stmt = $this->pdo->prepare(<<<SQL
            INSERT INTO products
            (id, name, description, price, quantity)
            VALUES
            (:id, :name, :description, :price, :quantity)
        SQL);

        $productId = uniqid('id', true);

        $stmt->execute([
            ':id' => $productId,
            ':name' => $product->name(),
            ':description' => $product->description(),
            ':price' => $product->price(),
            ':quantity' => $product->quantity(),
        ]);
    }
    public function getAllProducts(): array
    {
        $stmt = $this->pdo->prepare(<<<SQL
            SELECT * FROM products
        SQL);

        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Product::class);
        $stmt->execute();

        return $stmt->fetchAll();
    }
    public function getById($id): Product
    {
        $stmt = $this->pdo->prepare(<<<SQL
        SELECT id, name, description, price, quantity 
        FROM products
        WHERE id = :id
    SQL);

        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Product::class);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch();
    }
    public function updateProduct(): void
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];

        $stmt = $this->pdo->prepare(<<<SQL
                UPDATE products
                SET name = :name, description = :description, price = :price, quantity = :quantity
                WHERE id = :id;
            SQL);

        $stmt->execute([
            ':id' => $id,
            ':name' => $name,
            ':description' => $description,
            ':price' => $price,
            ':quantity' => $quantity,
        ]);
    }
    public function deleteProduct($id): void
    {
        $id = filter_input(INPUT_GET, 'id');

        $stmt = $this->pdo->prepare(<<<SQL
            DELETE FROM products WHERE id = ?
        SQL);

        $stmt->execute([$id]);
    }
}
