<?php

declare(strict_types=1);

namespace Uc\Module\Student\Query;

use Uc\Module\Student\View\Student;
use Uc\Module\Student\Request\StudentSearchRequest;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface StudentQueryInterface
{
    public function get(string $id): ?Student;

    /**
     * @return LengthAwarePaginator<Student>
     */
    public function filter(StudentSearchRequest $request): LengthAwarePaginator;
}
