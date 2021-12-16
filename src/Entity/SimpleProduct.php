<?php

namespace Entity;

use Interfaces\Product;

class SimpleProduct implements Product
{
    private float $cost = 1;

    public function __construct(float $price)
    {
        $this->cost = $price;
    }

    public function getCost(): float
    {
        return $this->cost;
    }
}
