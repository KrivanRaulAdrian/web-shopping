<?php

namespace Project3\Action;

class DisplayOrderItemsAction
{
    public function handle(): void
    {
        require_once __DIR__ . '/../../views/details.php';
    }
}
