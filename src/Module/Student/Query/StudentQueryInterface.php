<?php

declare(strict_types=1);

namespace Uc\Module\Student\Query;

use Uc\Module\Student\View\Stats;
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
     * @return Collection<int, Student>
     */
    public function top10StudentsWithPoints(): Collection;

    public function stats(string $id): Stats;

    /**
     * @return Collection<int, object>
     */
    public function recentEvents(string $id): Collection;

    /**
     * @return array<int, float>
     */
    public function coursesProgress(string $student): array;

    public function courseProgress(int $language, string $student): float;

    /**
     * @return LengthAwarePaginator<Student>
     */
    public function filter(StudentSearchRequest $request): LengthAwarePaginator;
}
