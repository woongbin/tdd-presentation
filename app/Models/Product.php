<?php

namespace App\Models;

class Product
{
    public function __construct(
        public string $name,
        public int $price,
        public float $pointRate
    ){}
}
