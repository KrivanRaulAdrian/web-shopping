<?php

namespace Project3\Action;

class DisplayOrderAction
{
    public function handle(): void
    {
        require_once __DIR__ . '/../../views/order.php';
    }
}
