<?php

namespace Project3\Entity;

class OrderItems
{
    public ?string $order_id;
    public ?string $product_id;
    public string $name;
    public int $quantity;
    public float $price;

    public function __construct(
        string $name = '',
        ?string $order_id = '',
        int $quantity = 0,
        float $price = 0,
    ) {
        $this->order_id = $order_id;
        $this->product_id = null;
        $this->name = $name;
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
    public function name(): string
    {
        return $this->name;
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
