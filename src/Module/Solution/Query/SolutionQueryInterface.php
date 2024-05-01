<?php

declare(strict_types=1);

namespace Uc\Module\Solution\Query;

use Uc\Module\Solution\Model\Solution;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface SolutionQueryInterface
{
    public function get(string $id): ?Solution;

    /**
     * @return LengthAwarePaginator<Solution>
     */
    public function filter(): LengthAwarePaginator;

    public function byStudentAndProblem(string $student, string $problem): ?Solution;
}
