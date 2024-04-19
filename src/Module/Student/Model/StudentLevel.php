<?php

namespace Uc\Module\Student\Model;

enum StudentLevel: int
{
    case Beginner = 1;
    case Moderate = 2;
    case Comfortable = 3;
    case Unknown = 4;

    public function title(): string
    {
        return match ($this) {
            self::Beginner => 'Beginner',
            self::Moderate => 'Moderate',
            self::Comfortable => 'Comfortable',
            self::Unknown => 'Unknown',
        };
    }
}
