<?php

declare(strict_types=1);

namespace Uc\Module\Student\Query;

use App\Models\User\User;
use App\Models\User\UserKind;
use Uc\Module\Student\View\Stats;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Uc\Module\Course\Model\Problem;
use Uc\Module\Student\View\Student;
use Uc\Module\Feedback\Model\Feedback;
use Uc\Module\Language\Model\Language;
use Uc\Module\Solution\Model\Solution;
use Illuminate\Pagination\LengthAwarePaginator;
use Uc\Module\Student\Request\StudentSearchRequest;

class StudentQuery implements StudentQueryInterface
{
    public function get(string $id): ?Student
    {
        /** @var ?User */
        $user = User::query()
            ->where('user_kind_id', UserKind::Student->value)
            ->where('user_id', $id)
            ->first();

        if (null === $user) {
            return null;
        }

        return Student::fromUser($user);
    }

    public function coursesEnrolled(string $studentId): Collection
    {
        /** @var array<int, int>
         */
        $languages = DB::table('student_languages')
        ->where('student_id', $studentId)
        ->pluck('language_id')
        ->toArray();

        /**
         * @var Collection<int, Language>
         */
        $result = Language::query()
            ->with(['chapters', 'chapters.problems'])
            ->whereIn('id', $languages)
            ->get();

        return $result;
    }

    public function top10StudentsWithPoints(): Collection
    {
        $points = DB::table('student_points')
            ->join('users', 'users.user_id', 'student_points.student_id')
            ->select(['users.name', 'users.user_id'])
            ->selectRaw('SUM(points_earned) as points')
            ->groupBy(['users.user_id', 'users.name'])
            ->get();

        return $points;
    }

    /**
     * @return LengthAwarePaginator<Student>
     */
    public function filter(StudentSearchRequest $request): LengthAwarePaginator
    {
        $query = User::query()
            ->where('user_kind_id', UserKind::Student->value);

        if (null !== $request->name) {
            $query->where('name', 'ilike', '%'.trim($request->name).'%');
        }

        if (null !== $request->language) {
            $query->join('student_languages', 'student_languages.student_id', 'users.user_id')
                ->where('student_languages.language_id', $request->language->id());
        }

        /**
         * @var LengthAwarePaginator<Student>
         */
        $result = $query
            ->orderBy('name', 'asc')
            ->paginate(30)
            ->through(function (User $user) {
                return Student::fromUser($user);
            });

        return $result;
    }

    public function stats(string $id): Stats
    {
        /** @var int */
        $dailyStreak = DB::table('student_points')
        ->where('event_type', 'activity')
        ->groupBy('created_at')
        ->count();

        /** @var int */
        $problemSolved = Solution::query()
        ->where('student_id', $id)
        ->count();

        /** @var int */
        $feedbackProvided = Feedback::query()
            ->where('student_id', $id)
            ->count();

        /** @var int */
        $points = DB::table('student_points')
            ->where('student_id', $id)
            ->sum('points_earned');

        return new Stats($points, $problemSolved, $feedbackProvided, $dailyStreak);
    }

    /**
     * @return Collection<int, object>
     */
    public function recentEvents(string $student): Collection
    {
        /**
         * @var Collection<int, object>
         * */
        $result = DB::table('student_points')
            ->where('student_id', $student)
            ->limit(10)
            ->get();

        return $result;
    }

    /**
     * @return array<int, float>
     */
    public function coursesProgress(string $student): array
    {
        $courses = $this->coursesEnrolled($student);
        $result = [];
        foreach ($courses as $course) {
            $result[$course->id] = $this->courseProgress($course->id, $student);
        }

        return $result;
    }

    public function courseProgress(int $language, string $student): float
    {
        $total = Problem::query()
        ->join('chapters', 'chapters.chapter_id', 'problems.chapter_id')
        ->where('chapters.language_id', $language)
        ->count();

        if (0 === $total) {
            return 0;
        }

        $solved = Solution::query()
        ->join('problems', 'problems.problem_id', 'solutions.problem_id')
        ->join('chapters', 'chapters.chapter_id', 'problems.chapter_id')
        ->where('chapters.language_id', $language)
        ->where('student_id', $student)
        ->count();

        return ($solved / $total) * 100;
    }
}
