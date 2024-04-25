<?php

declare(strict_types=1);

namespace Uc\Module\Site\Controller;

use App\Models\User\User;
use Illuminate\Http\Request;
use Uc\Module\Student\View\Student;
use Illuminate\Http\RedirectResponse;
use Uc\Module\Feedback\Request\FeedbackCreateRequest;

class FeedbackController extends SiteController
{
    public function store(Request $request): RedirectResponse
    {
        /** @var array{problem_id: string} */
        $data = $this->validate($request, [
            'interesting' => ['nullable'],
            'instructions' => ['nullable'],
            'knowledge' => ['nullable'],
            'score' => ['required', 'numeric', 'min:1', 'max:5'],
            'feedback' => ['nullable', 'string'],
            'problem_id' => ['required', 'string'],
        ]);

        /**
         * @var User
         */
        $user = $request->user();
        $student = Student::fromUser($user);
        $req = FeedbackCreateRequest::fromArray($student, $data);
        $this->feedbackService->new($req);

        return $this->redirectRoute('playground', ['id' => $data['problem_id']]);
    }
}
