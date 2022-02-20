<?php

namespace App\Services;

use App\Models\Product;

class PointService
{
    public const POINT_RATE = 0.05;

    public function getPoint(Product $product)
    {
        return (int)floor($product->price * self::POINT_RATE);
    }
}
