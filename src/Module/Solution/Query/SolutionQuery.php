<?php

declare(strict_types=1);

namespace Uc\Module\Solution\Query;

use Uc\Module\Solution\Model\Solution;
use Illuminate\Pagination\LengthAwarePaginator;

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

    /**
     * @return LengthAwarePaginator<Solution>
     */
    public function filter(): LengthAwarePaginator
    {
        $query = Solution::query()->with(['problem', 'student']);

        /**
         * @var LengthAwarePaginator<Solution>
         */
        $result = $query
            ->orderBy('created_at', 'desc')
            ->paginate(30);

        return $result;
    }
}
