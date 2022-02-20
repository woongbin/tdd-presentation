<?php

namespace Tests\Unit;

use App\Services\RockPaperScissorsService;
use Tests\TestCase;

class RockPaperScissorsServiceTest extends TestCase
{
    private RockPaperScissorsService $rockPaperScissorsService;

    protected function setUp(): void
    {
        $this->rockPaperScissorsService = app(RockPaperScissorsService::class);
    }

    /** @test */
    public function 주먹은_가위를_이긴다(): void
    {
        $me = RockPaperScissorsService::ROCK;
        $you = RockPaperScissorsService::SCISSORS;

        $result = $this->rockPaperScissorsService->getResult($me, $you);

        $this->assertEquals(RockPaperScissorsService::RESULT_WIN, $result);
    }

    /** @test */
    public function 주먹과_주먹은_비긴다(): void
    {
        $me = RockPaperScissorsService::ROCK;
        $you = RockPaperScissorsService::ROCK;

        $result = $this->rockPaperScissorsService->getResult($me, $you);

        $this->assertEquals(RockPaperScissorsService::RESULT_DRAW, $result);
    }

    /** @test */
    public function 주먹은_보자기에_진다(): void
    {
        $me = RockPaperScissorsService::ROCK;
        $you = RockPaperScissorsService::PAPER;

        $result = $this->rockPaperScissorsService->getResult($me, $you);

        $this->assertEquals(RockPaperScissorsService::RESULT_LOSE, $result);
    }

    /** @test */
    public function 가위는_주먹에_진다(): void
    {
        $me = RockPaperScissorsService::SCISSORS;
        $you = RockPaperScissorsService::ROCK;

        $result = $this->rockPaperScissorsService->getResult($me, $you);

        $this->assertEquals(RockPaperScissorsService::RESULT_LOSE, $result);
    }

    /** @test */
    public function 가위는_가위와_비긴다(): void
    {
        $me = RockPaperScissorsService::SCISSORS;
        $you = RockPaperScissorsService::SCISSORS;

        $result = $this->rockPaperScissorsService->getResult($me, $you);

        $this->assertEquals(RockPaperScissorsService::RESULT_DRAW, $result);
    }

    /** @test */
    public function 가위는_보자기를_이긴다(): void
    {
        $me = RockPaperScissorsService::SCISSORS;
        $you = RockPaperScissorsService::PAPER;

        $result = $this->rockPaperScissorsService->getResult($me, $you);

        $this->assertEquals(RockPaperScissorsService::RESULT_WIN, $result);
    }

    /** @test */
    public function 보자기는_주먹을_이긴다(): void
    {
        $me = RockPaperScissorsService::PAPER;
        $you = RockPaperScissorsService::ROCK;

        $result = $this->rockPaperScissorsService->getResult($me, $you);

        $this->assertEquals(RockPaperScissorsService::RESULT_WIN, $result);
    }

    /** @test */
    public function 보자기는_가위에_진다(): void
    {
        $me = RockPaperScissorsService::PAPER;
        $you = RockPaperScissorsService::SCISSORS;

        $result = $this->rockPaperScissorsService->getResult($me, $you);

        $this->assertEquals(RockPaperScissorsService::RESULT_LOSE, $result);
    }

    /** @test */
    public function 보자기는_보자기와_비긴다(): void
    {
        $me = RockPaperScissorsService::PAPER;
        $you = RockPaperScissorsService::PAPER;

        $result = $this->rockPaperScissorsService->getResult($me, $you);

        $this->assertEquals(RockPaperScissorsService::RESULT_DRAW, $result);
    }
}
