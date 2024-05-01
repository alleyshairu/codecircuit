<?php

namespace Uc\Module\Student\Service;

use Uc\Module\Student\View\Student;

interface StudentServiceInterface
{
    public function trackDailyActivity(Student $student): void;
}
