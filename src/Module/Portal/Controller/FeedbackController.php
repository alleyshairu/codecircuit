<?php

declare(strict_types=1);

namespace Uc\Module\Portal\Controller;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Uc\Module\Feedback\Request\FeedbackSearchRequest;

class FeedbackController extends PortalController
{
    public function index(Request $request): View
    {
        $filters = FeedbackSearchRequest::fromArray($request->all());
        $feedbacks = $this->feedbackQuery->filter($filters);
        $languages = $this->languageQuery->all();

        return $this->view('portal.feedback.index', [
            'filters' => $filters,
            'feedbacks' => $feedbacks,
            'languages' => $languages,
        ]);
    }

    public function show(string $id): View
    {
        $feedback = $this->feedbackQuery->get($id);
        if (null === $feedback) {
            abort(404, 'Feedback not found');
        }

        return $this->view('portal.feedback.show', [
            'feedback' => $feedback,
        ]);
    }
}
