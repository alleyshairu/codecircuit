<?php

declare(strict_types=1);

namespace Uc\Module\Site\Controller;

use Illuminate\Contracts\View\View;

class HomeController extends SiteController
{
    public function __invoke(): View
    {
        return $this->view('site.home');
    }
}
