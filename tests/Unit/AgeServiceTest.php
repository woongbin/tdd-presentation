<?php

namespace Tests\Unit;

use App\Services\AgeService;
use Tests\TestCase;

class AgeServiceTest extends TestCase
{
    private AgeService $ageService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->ageService = app(AgeService::class);
    }

    /** @test */
    public function 출생년도를_입력_받으면_0이상의_정수를_반환한다(): void
    {
        $result = $this->ageService->calculateKoreaAge(1990);

        $this->assertGreaterThanOrEqual(0, $result);
    }
}
