<?php

declare(strict_types=1);

namespace Uc\Module\Site\Controller;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Uc\Module\Student\Query\StudentQueryInterface;

class WelcomeController extends SiteController
{
    public function __invoke(StudentQueryInterface $query, Request $request): View
    {
        return $this->view('site.welcome', [
        ]);
    }
}
