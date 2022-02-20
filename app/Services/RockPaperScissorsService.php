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
        if ($me === self::ROCK) {
            if ($you === self::ROCK) {
                return self::RESULT_DRAW;
            } else if ($you === self::SCISSORS) {
                return self::RESULT_WIN;
            } else if ($you === self::PAPER) {
                return self::RESULT_LOSE;
            }
        } else if ($me === self::SCISSORS) {
            if ($you === self::ROCK) {
                return self::RESULT_LOSE;
            } else if ($you === self::SCISSORS) {
                return self::RESULT_DRAW;
            } else if ($you === self::PAPER) {
                return self::RESULT_WIN;
            }
        } else if ($me === self::PAPER) {
            if ($you === self::ROCK) {
                return self::RESULT_WIN;
            } else if ($you === self::SCISSORS) {
                return self::RESULT_LOSE;
            } else if ($you === self::PAPER) {
                return self::RESULT_DRAW;
            }
        }
    }
}
