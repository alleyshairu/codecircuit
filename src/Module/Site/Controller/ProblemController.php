<?php

declare(strict_types=1);

namespace Uc\Module\Site\Controller;

use App\Models\User\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Uc\Module\Student\View\Student;

class ProblemController extends SiteController
{
    public function read(Request $request, string $id): View
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
        $solution = $this->solutionQuery->byStudentAndProblem($problem->id(), $student->id);
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

    public function problem(Request $request, string $id): JsonResponse
    {
        $problem = $this->problemQuery->get($id);
        if (null === $problem) {
            abort(404, 'problem not found');
        }

        $chapter = $problem->chapter;
        $language = $chapter->language;

        return $this->json([
            'problem' => $problem,
            'chapter' => $chapter,
            'language' => $language,
        ]);
    }
}
