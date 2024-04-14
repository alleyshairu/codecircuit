<?php

declare(strict_types=1);

namespace Uc\Module\Site\Controller;

use Illuminate\Contracts\View\View;

class PlaygroundController extends SiteController
{
    public function index(): View
    {
        return $this->view('site.playground.playground');
    }
}
