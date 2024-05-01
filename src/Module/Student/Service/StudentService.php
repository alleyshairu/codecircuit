<?php

namespace Uc\Module\Student\Service;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Uc\Module\Student\View\Student;

class StudentService implements StudentServiceInterface
{
    public function trackDailyActivity(Student $student): void
    {
        $today = date('Y-m-d');

        $event = sprintf('Interacted with system on %s', $today);

        $result = DB::table('student_points')
        ->where('event_type', 'activity')
        ->where('student_id', $student->id)
        ->whereDate('created_at', $today)
        ->first();

        if (null === $result) {
            DB::table('student_points')
            ->insert([
                'id' => Str::orderedUuid()->toString(),
                'points_earned' => 3,
                'event_type' => 'activity',
                'event' => $event,
                'student_id' => $student->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
