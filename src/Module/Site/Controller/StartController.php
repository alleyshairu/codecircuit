<?php

declare(strict_types=1);

namespace Uc\Module\Site\Controller;

use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Uc\Module\Student\View\Student;
use Uc\Module\Student\Model\StudentLevel;

class StartController extends SiteController
{
    public function __invoke(Request $request): View
    {
        /** @var User */
        $user = $request->user();
        $student = Student::fromUser($user);

        $languages = $this->languageQuery->all();
        $levels = StudentLevel::cases();
        $preferences = $this->studentPreferenceQuery->preferences($student->id);

        return $this->view('site.start.start', [
            'languages' => $languages,
            'levels' => $levels,
            'preferences' => $preferences,
        ]);
    }
}
