<?php

namespace Project3\Repository;

use Project3\Entity\OrderItems;
use PDO;

class OrderItemsRepositoryFromPdo implements OrderItemsRepository
{
    public function __construct(private PDO $pdo)
    {
    }
    public function createOrderItems(OrderItems $orderItems): void
    {
        $stmt = $this->pdo->prepare(<<<SQL
            INSERT INTO order_items
            (order_id, product_id, quantity, price)
            VALUES
            (:order_id, :product_id, :quantity, :price)
        SQL);

        $stmt->execute([
            ':order_id' => $orderItems->order_id(),
            ':product_id' => $orderItems->product_id(),
            ':quantity' => $orderItems->quantity(),
            ':price' => $orderItems->price()
        ]);
    }

    public function getAllOrderItems(): array
    {
        $stmt = $this->pdo->prepare(<<<SQL
            SELECT * FROM order_items
        SQL);

        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, OrderItems::class);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}
