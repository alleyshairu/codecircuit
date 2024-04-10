<?php

declare(strict_types=1);

namespace Uc\Module\Site\Controller;

use App\Models\User\User;
use Illuminate\Http\Request;
use Uc\Module\Student\View\Student;
use Illuminate\Http\RedirectResponse;
use Uc\Module\Student\Model\StudentLevel;

class StudentPreferenceController extends SiteController
{
    public function languages(Request $request): RedirectResponse
    {
        /** @var array{language_id: int[]} */
        $data = $this->validate($request, [
            'language_id' => ['required', 'array', 'min:1'],
            'language_id.*' => ['required', 'integer'],
        ]);

        /** @var User */
        $user = $request->user();
        $student = Student::fromUser($user);

        /** @var array<int, int> */
        $languages = $data['language_id'];
        $this->studentPreferenceQuery->setLanguages($student->id, $languages);

        return $this->redirectRoute('student.start');
    }

    public function level(Request $request): RedirectResponse
    {
        /** @var array{level_id: string} */
        $data = $this->validate($request, [
            'level_id' => ['required', 'integer'],
        ]);

        /** @var User */
        $user = $request->user();
        $student = Student::fromUser($user);

        $level = StudentLevel::tryFrom((int) $data['level_id']) ?? StudentLevel::Unknown;
        $this->studentPreferenceQuery->setLevel($student->id, $level);

        return $this->redirectRoute('student.start');
    }
}
