<?php

namespace Tests\Unit;

use App\Models\Product;
use App\Services\PointService;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PointServiceUnitTest extends TestCase
{
    use WithFaker;

    private PointService $pointService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->pointService = app(PointService::class);
    }

    private function getProduct($price = 0, $pointRate = 0.0): Product
    {
        $price = $price > 0 ? $price : $this->faker->numberBetween(1000, 100000);

        return new Product($this->faker->name(), $price, $pointRate);
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

    /** @test */
    public function 상품에서_제공하는_포인트_적립률로_포인트를_계산한다(): void
    {
        $testParameters = [];
        $testParameters[] = ['price' => 10000, 'pointRate' => 0.1, 'result' => 1000];
        $testParameters[] = ['price' => 10000, 'pointRate' => 0.05, 'result' => 500];
        $testParameters[] = ['price' => 10000, 'pointRate' => 0.07, 'result' => 700];
        $testParameters[] = ['price' => 8300, 'pointRate' => 0.1, 'result' => 830];
        $testParameters[] = ['price' => 8375, 'pointRate' => 0.03, 'result' => 251];

        foreach ($testParameters as $parameter) {
            $product = $this->getProduct($parameter['price'], $parameter['pointRate']);

            $result = $this->pointService->getPoint($product);

            $this->assertEquals($parameter['result'], $result);
        }
    }
}
