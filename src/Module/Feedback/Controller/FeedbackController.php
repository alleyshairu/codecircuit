<?php

namespace Uc\Module\Feedback\Controller;

use Uc\Module\Core\WebController;
use Illuminate\Contracts\View\View;

class FeedbackController extends WebController
{
    public function index(): View
    {
        return $this->view('feedback.index', []);
    }
}
