<?php

declare(strict_types=1);

namespace Uc\Module\Course\Query;

interface CourseQueryInterface
{
    public function studentsEnrolledCount(int $id): int;

    public function problemsCount(int $id): int;
}
