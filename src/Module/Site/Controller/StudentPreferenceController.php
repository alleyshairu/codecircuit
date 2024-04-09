<?php

declare(strict_types=1);

namespace Uc\Module\Site\Controller;

use Illuminate\Http\Request;
use Uc\Module\Student\View\Student;
use Illuminate\Http\RedirectResponse;
use Uc\Module\Student\Model\StudentLevel;

class StudentPreferenceController extends SiteController
{
    public function languages(Request $request): RedirectResponse
    {
        $user = $request->user();
        $student = Student::fromUser($user);
        $this->studentPreferenceQuery->setLanguages($student->id, $request->get('language_id') ?? []);

        return $this->redirectRoute('student.start');
    }

    public function level(Request $request): RedirectResponse
    {
        $user = $request->user();
        $student = Student::fromUser($user);
        $level = StudentLevel::tryFrom((int) $request->level_id ?? StudentLevel::Unknown->value) ?? StudentLevel::Unknown;
        $this->studentPreferenceQuery->setLevel($student->id, $level);

        return $this->redirectRoute('student.start');
    }
}
