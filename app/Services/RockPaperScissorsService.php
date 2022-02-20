<?php

namespace App\Services;

class RockPaperScissorsService
{
    public const ROCK = 1;
    public const PAPER = 2;
    public const SCISSORS = 3;

    public const RESULT_WIN = 1;
    public const RESULT_DRAW = 2;
    public const RESULT_LOSE = 3;

    public function getResult(int $me, int $you)
    {
        if ($me === $you) {
            return self::RESULT_DRAW;
        }

        $resultTable = $this->getResultTable();

        return $resultTable[$me][$you];
    }

    private function getResultTable(): array
    {
        return [
            self::ROCK => [
                self::PAPER => self::RESULT_LOSE,
                self::SCISSORS => self::RESULT_WIN
            ],
            self::PAPER => [
                self::ROCK => self::RESULT_WIN,
                self::SCISSORS => self::RESULT_LOSE
            ],
            self::SCISSORS => [
                self::ROCK => self::RESULT_LOSE,
                self::PAPER => self::RESULT_WIN
            ]
        ];
    }
}
