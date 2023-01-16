<?php

namespace Project3\Entity;

class Order
{
    private ?string $id;
    private float $total;
    private string $completed_at;

    public function __construct(
        ?string $id = '',
        float $total = 0,
        string $completed_at = '',
    ) {
        $this->id = $id;
        $this->total = $total;
        $this->completed_at = $completed_at;
    }
    public function id(): ?string
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
