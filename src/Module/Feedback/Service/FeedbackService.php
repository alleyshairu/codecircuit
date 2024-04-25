<?php

declare(strict_types=1);

namespace Uc\Module\Feedback\Service;

use Illuminate\Support\Str;
use Uc\Module\Feedback\Model\Feedback;
use Uc\Module\Feedback\Request\FeedbackCreateRequest;

class FeedbackService implements FeedbackServiceInterface
{
    public function new(FeedbackCreateRequest $req): Feedback
    {
        $feedback = new Feedback();
        $feedback->feedback_id = Str::orderedUuid()->toString();
        $feedback->problem_id = $req->problem->id();
        $feedback->student_id = $req->student->id;
        $feedback->gained_new_knowledge = $req->knowledge;
        $feedback->is_interesting = $req->interesting;
        $feedback->feedback = $req->feedback;
        $feedback->score = $req->score;

        $feedback->save();

        return $feedback;
    }
}
