<?php

namespace Tests\Unit;

use App\Models\Product;
use App\Services\PointService;
use PHPUnit\Framework\TestCase;

class PointServiceUnitTest extends TestCase
{
    private PointService $pointService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->pointService = app(PointService::class);
    }

    private function getProduct(): Product
    {
        return Product::factory()->make();
    }

    /** @test */
    public function 반환값은_0_이상이다(): void
    {
        $product = $this->getProduct();

        $result = $this->pointService->getPoint($product);

        $this->assertNotNull($result);
        $this->assertTrue($result >= 0);
    }

    /** @test */
    public function 반환값은_정수다(): void
    {
        $product = $this->getProduct();

        $result = $this->pointService->getPoint($product);

        $this->assertIsInt($result);
    }
}
