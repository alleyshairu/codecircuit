<?php

declare(strict_types=1);

namespace Uc\Module\Student\View;

use Illuminate\Support\Collection;
use Uc\Module\Student\Model\StudentLevel;

readonly class StudentPreference
{
    public Collection $languages;

    public StudentLevel $level;

    public function __construct(Collection $languages, StudentLevel $level)
    {
        $this->languages = $languages;
        $this->level = $level;
    }
}
