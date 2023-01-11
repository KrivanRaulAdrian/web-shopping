<?php

namespace Project3\Entity;

class Order
{
    private ?int $id;
    private float $total;
    private string $completed_at;

    public function __construct(
        float $total = 0,
        string $completed_at = '',
    ) {
        $this->id = null;
        $this->total = $total;
        $this->completed_at = $completed_at;
    }
    public function id(): ?int
    {
        return $this->id;
    }
    public function total(): float
    {
        return $this->total;
    }
    public function completed_at(): string
    {
        return $this->completed_at;
    }
}
