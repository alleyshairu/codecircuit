<?php

declare(strict_types=1);

namespace Uc\Module\Site\Controller;

use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Uc\Module\Student\View\Student;

class PlaygroundController extends SiteController
{
    public function show(Request $request, string $id): View
    {
        $problem = $this->problemQuery->get($id);
        if (null === $problem) {
            abort(404, 'problem not found');
        }

        /**
         * @var User
         */
        $user = $request->user();
        $student = Student::fromUser($user);

        $feedback = $this->feedbackQuery->byProblemAndStudent($problem->id(), $student->id);
        $solution = $this->solutionQuery->byStudentAndProblem($student->id, $problem->id());
        $chapter = $problem->chapter;
        $language = $chapter->language;

        return $this->view('site.playground.playground', [
            'solution' => $solution,
            'problem' => $problem,
            'chapter' => $chapter,
            'language' => $language,
            'feedback' => $feedback,
        ]);
    }
}
