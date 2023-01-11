<?php

namespace Project3\Entity;

class Product
{
    private ?int $id;
    private string $name;
    private string $description;
    private float $price;
    private int $quantity;

    public function __construct(
        string $name = '',
        string $description = '',
        float $price = 0,
        int $quantity = 0
    ) {
        $this->id = null;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->quantity = $quantity;
    }
    public function id(): ?int
    {
        return $this->id;
    }
    public function name(): string
    {
        return $this->name;
    }
    public function description(): string
    {
        return $this->description;
    }
    public function price(): float
    {
        return $this->price;
    }
    public function quantity(): int
    {
        return $this->quantity;
    }
}
