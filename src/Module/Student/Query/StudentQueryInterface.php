<?php

declare(strict_types=1);

namespace Uc\Module\Student\Query;

use Illuminate\Support\Collection;
use Uc\Module\Student\View\Student;
use Uc\Module\Language\Model\Language;
use Uc\Module\Student\Request\StudentSearchRequest;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface StudentQueryInterface
{
    public function get(string $id): ?Student;

    /**
     * @return Collection<int, Language>
     */
    public function coursesEnrolled(string $studentId): Collection;

    /**
     * @return LengthAwarePaginator<Student>
     */
    public function filter(StudentSearchRequest $request): LengthAwarePaginator;
}
