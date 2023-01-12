<?php

namespace Project3\Entity;

class OrderItems
{
    private ?string $order_id;
    private ?string $product_id;
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

    public function order_id(): ?string
    {
        return $this->order_id;
    }
    public function product_id(): ?string
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
