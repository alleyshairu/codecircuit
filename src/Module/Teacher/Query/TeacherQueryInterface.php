<?php

declare(strict_types=1);

namespace Uc\Module\Teacher\Query;

use Uc\Module\Teacher\View\Teacher;
use Uc\Module\Teacher\Request\TeacherSearchRequest;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface TeacherQueryInterface
{
    public function get(int $id): ?Teacher;

    /**
     * @return LengthAwarePaginator<Teacher>
     */
    public static function filter(TeacherSearchRequest $request): LengthAwarePaginator;
}
