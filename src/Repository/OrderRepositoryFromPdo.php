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
            (id, total, completed_at)
            VALUES
            (:id, :total, :completed_at)
        SQL);

        $orderId = $order->id();

        $params = [
            ':id' => $orderId,
            ':total' => $order->total(),
            ':completed_at' => $order->completed_at(),
        ];

        $stmt->execute($params);
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
