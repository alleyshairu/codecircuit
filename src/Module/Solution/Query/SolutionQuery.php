<?php

declare(strict_types=1);

namespace Uc\Module\Solution\Query;

use Uc\Module\Solution\Model\Solution;

class SolutionQuery implements SolutionQueryInterface
{
    public function get(string $id): ?Solution
    {
        /** @var ?Solution */
        $lang = Solution::query()
        ->where('solution_id', $id)
        ->first();

        return $lang;
    }

    public function byStudentAndProblem(string $student, string $problem): ?Solution
    {
        /** @var ?Solution */
        $lang = Solution::query()
            ->where('student_id', $student)
        ->where('problem_id', $problem)
        ->first();

        return $lang;
    }
}
