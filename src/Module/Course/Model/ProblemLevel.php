<?php

namespace Uc\Module\Course\Model;

enum ProblemLevel: int
{
    case Unknown = 1;
    case Easy = 2;
    case Moderate = 3;
    case Challenging = 4;

    public function title(): string
    {
        return match ($this) {
            self::Unknown => 'Unknown',
            self::Easy => 'Easy',
            self::Moderate => 'Moderate',
            self::Challenging => 'Challenging',
        };
    }
}
