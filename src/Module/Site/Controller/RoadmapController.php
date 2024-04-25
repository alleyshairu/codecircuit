<?php

declare(strict_types=1);

namespace Uc\Module\Site\Controller;

use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Uc\Module\Student\View\Student;

class RoadmapController extends SiteController
{
    public function __invoke(Request $request): View
    {
        /**
         * @var User
         */
        $user = $request->user();
        $student = Student::fromUser($user);
        $languages = $this->studentQuery->coursesEnrolled($student->id);
        $feedbacks = $this->feedbackQuery->studentFeedbacks($student->id);

        return $this->view('site.roadmap.roadmap', [
            'student' => $student,
            'languages' => $languages,
            'feedbacks' => $feedbacks,
        ]);
    }
}
