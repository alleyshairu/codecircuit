<?php

declare(strict_types=1);

namespace Uc\Module\Student\Query;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Uc\Module\Student\View\Student;
use Uc\Module\Language\Model\Language;
use Uc\Module\Student\Model\StudentLevel;
use Uc\Module\Student\View\StudentPreference;
use Uc\Module\Student\Model\StudentPreferenceKey;

class StudentPreferenceQuery implements StudentPreferenceQueryInterface
{
    public function preferences(string $id): StudentPreference
    {
        $level = $this->level($id);
        $languages = $this->languages($id);

        return new StudentPreference($languages, $level);
    }

    public function languages(string $id): Collection
    {
        $result = DB::table('student_languages')
        ->where('student_id', $id)
        ->get();

        $ids = $result->pluck('language_id');

        return Language::query()->whereIn('id', $ids)->get();
    }

    public function setLanguages(string $id, array $languages): void
    {
        $upserts = [];
        foreach ($languages as $language) {
            $upserts[] = ['student_id' => $id, 'language_id' => $language];
        }

        DB::table('student_languages')
        ->where('student_id', $id)
        ->delete();

        DB::table('student_languages')->upsert($upserts, ['student_id', 'language_id']);
    }

    public function level(string $id): StudentLevel
    {
        /**
         * @var object{student_id: int, value_int: ?int}|null
         */
        $result = DB::table('student_preferences')
        ->where('preference', StudentPreferenceKey::Level->value)
        ->where('student_id', $id)
        ->first();

        if (null === $result) {
            return StudentLevel::Unknown;
        }

        return StudentLevel::tryFrom($result->value_int ?? 0) ?? StudentLevel::Unknown;
    }

    public function setLevel(string $id, StudentLevel $level): void
    {
        $preference = StudentPreferenceKey::Level->value;

        DB::table('student_preferences')->upsert([
            'preference' => $preference,
            'student_id' => $id,
            'value_int' => $level->value],
            ['preference', 'student_id']
        );
    }
}
