<?php

declare(strict_types=1);

namespace Uc\Module\Student\View;

readonly class Stats
{
    public function __construct(
        public int $points,
        public int $problemsSolved,
        public int $feedbackProvided,
        public int $dailyStreak)
    {
    }
}
