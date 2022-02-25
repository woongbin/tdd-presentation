<?php

namespace App\Services;

use App\Models\Product;
use Carbon\Carbon;

class PointService
{
    public const NORMAL_PERCENT_RATE = 1;
    public const EVENT_PERCENT_RATE = 2;
    public const MAX_POINT = 1000;

    public function getPoint(Product $product, Carbon $date)
    {
        $eventRate = $this->checkEventPeriod($date) === true ? self::EVENT_PERCENT_RATE : self::NORMAL_PERCENT_RATE;

        $point = (int)floor($product->price * $product->pointRate) * $eventRate;

        return min(self::MAX_POINT, $point);
    }

    private function checkEventPeriod(Carbon $date): bool
    {
        return $date->year === 2022 && $date->month === 3;
    }
}
