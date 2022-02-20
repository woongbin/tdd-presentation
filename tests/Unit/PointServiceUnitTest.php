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

    private function getProduct($price = 0, $pointRate = 0.05): Product
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
    public function 상품_가격의_5퍼센트가_정수인_경우_그_값을_반환한다(): void
    {
        $price = 10000;
        //가격이 10,000원일 경우 5%인 500을 반환
        $expectResult = 500;

        $product = $this->getProduct($price);

        $result = $this->pointService->getPoint($product);

        $this->assertEquals($expectResult, $result);
    }

    /** @test */
    public function 상품_가격의_5퍼센트가_실수인_경우_소수점을_버린_정수를_반환한다(): void
    {
        $price = 9750;
        //가격이 9,750원일 경우 5%인 487.5에서 소수점을 버리고 487을 반환
        $expectResult = 487;

        $product = $this->getProduct($price);

        $result = $this->pointService->getPoint($product);

        $this->assertEquals($expectResult, $result);
    }
}
