<?php

declare(strict_types=1);

namespace Uc\Module\Course\Query;

use Illuminate\Support\Facades\DB;

class CourseQuery implements CourseQueryInterface
{
    public function studentsEnrolledCount(int $id): int
    {
        /** @var int */
        $result = DB::table('student_languages')
            ->where('language_id', $id)
        ->count();

        return $result;
    }

    public function problemsCount(int $id): int
    {
        /** @var int */
        $result = DB::table('problems')
            ->join('chapters', 'chapters.chapter_id', 'problems.chapter_id')
            ->where('chapters.language_id', $id)
            ->count();

        return $result;
    }
}
