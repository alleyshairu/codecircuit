<?php

declare(strict_types=1);

namespace Uc\Module\Student\View;

use Carbon\Carbon;

readonly class StudentPreferenceTable
{
    public string $student;

    public ?int $intVal;

    public ?string $strVal;

    public ?Carbon $dateVal;

    public function __construct(string $student, ?int $intVal = null, ?string $strVal = null, ?Carbon $dateVal = null)
    {
        $this->student = $student;
        $this->intVal = $intVal;
        $this->strVal = $strVal;
        $this->dateVal = $dateVal;
    }
}
