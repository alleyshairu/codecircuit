<?php

declare(strict_types=1);

namespace Uc\Module\Core\Controller;

use Uc\Module\Core\WebController;
use Illuminate\Contracts\View\View;

class HomeController extends WebController
{
    public function __invoke(): View
    {
        return $this->view('home');
    }
}
