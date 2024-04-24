<?php

declare(strict_types=1);

namespace Uc\Module\Solution\Query;

use Uc\Module\Solution\Model\Solution;

interface SolutionQueryInterface
{
    public function get(string $id): ?Solution;

    public function byStudentAndProblem(string $student, string $problem): ?Solution;
}
