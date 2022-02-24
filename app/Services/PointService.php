<?php

namespace App\Services;

use App\Models\Product;
use Carbon\Carbon;

class PointService
{
    public function getPoint(Product $product, Carbon $date)
    {
        $eventRate = $this->checkEventPeriod($date) === true ? 2 : 1;

        return (int)floor($product->price * $product->pointRate) * $eventRate;
    }

    private function checkEventPeriod(Carbon $date): bool
    {
        return $date->year === 2022 && $date->month === 3;
    }
}
