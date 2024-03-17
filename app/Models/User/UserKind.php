<?php

namespace App\Models\User;

enum UserKind: int
{
    case Student = 1;
    case Teacher = 2;

    public function title(): string
    {
        return match ($this) {
            self::Student => 'Student',
            self::Teacher => 'Teacher',
        };
    }
}
