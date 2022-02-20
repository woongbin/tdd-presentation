<?php

namespace Tests\Unit;

use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use WithFaker;

    /** @test */
    public function 상품은_포인트_적립률을_반환한다(): void
    {
        $product = $this->getProduct();

        $this->assertNotNull($product->pointRate);
    }

    /** @test */
    public function 포인트_적립률은_0_이상이다(): void
    {
        $product = $this->getProduct();

        $this->assertGreaterThanOrEqual(0, $product->pointRate);
    }

    private function getProduct($price = 0): Product
    {
        $price = $price > 0 ? $price : $this->faker->numberBetween(1000, 100000);

        return new Product($this->faker->name(), $price, 0.05);
    }
}
