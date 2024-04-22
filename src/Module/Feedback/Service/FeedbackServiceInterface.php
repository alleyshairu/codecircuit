<?php

declare(strict_types=1);

namespace Uc\Module\Feedback\Service;

use Uc\Module\Feedback\Model\Feedback;
use Uc\Module\Feedback\Request\FeedbackCreateRequest;

interface FeedbackServiceInterface
{
    public function new(FeedbackCreateRequest $req): Feedback;
}
