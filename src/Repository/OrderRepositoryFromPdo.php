<?php

namespace Project3\Repository;

use Project3\Entity\Order;
use PDO;

class OrderRepositoryFromPdo implements OrderRepository
{
    public function __construct(private PDO $pdo)
    {
    }
    public function createOrder(Order $order): void
    {
        $stmt = $this->pdo->prepare(<<<SQL
            INSERT INTO orders
            (total, completed_at)
            VALUES
            (:total, :completed_at)
        SQL);

        $stmt->execute([
            ':total' => $order->total(),
            ':completed_at' => $order->completed_at(),
        ]);
    }
    public function getAllOrders(): array
    {
        $stmt = $this->pdo->prepare(<<<SQL
            SELECT * FROM orders
        SQL);

        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Order::class);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}
