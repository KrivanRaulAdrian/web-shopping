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

        $orderId = $orderItems->order_id;
        $productId = $orderItems->product_id;
        $productQuantity = $orderItems->quantity;
        $productPrice = $orderItems->price;

        $productParams = [
            ':order_id' => $orderId,
            ':product_id' => $productId,
            ':quantity' => $productQuantity,
            ':price' => $productPrice,
        ];

        $stmt->execute($productParams);
    }
    public function getByOrderId($orderId): array|bool
    {
        $stmt = $this->pdo->prepare(<<<SQL
        SELECT oi.order_id AS order_id, oi.product_id AS product_id, p.name AS name, oi.quantity AS quantity, oi.price AS price
            FROM orders o 
            JOIN order_items oi ON oi.order_id=o.id
            JOIN products p ON oi.product_id=p.id
        WHERE order_id = :order_id
        SQL);

        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, OrderItems::class);
        $stmt->bindParam(':order_id', $orderId);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}
