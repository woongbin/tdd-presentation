<?php

namespace App\Services;

use App\Models\Product;

class PointService
{
    public function getPoint(Product $product)
    {
        return (int)floor($product->price * $product->pointRate);
    }
}
