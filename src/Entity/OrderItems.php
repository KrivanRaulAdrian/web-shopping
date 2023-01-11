<?php

namespace Project3\Entity;

class OrderItems
{
    private ?int $order_id;
    private ?int $product_id;
    private int $quantity;
    private float $price;

    public function __construct(
        int $quantity = 0,
        float $price = 0
    ) {
        $this->order_id = null;
        $this->product_id = null;
        $this->quantity = $quantity;
        $this->price = $price;
    }

    public function order_id(): ?int
    {
        return $this->order_id;
    }
    public function product_id(): ?int
    {
        return $this->product_id;
    }
    public function quantity(): int
    {
        return $this->quantity;
    }
    public function price(): float
    {
        return $this->price;
    }
}
