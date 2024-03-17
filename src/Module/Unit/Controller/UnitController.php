<?php

namespace Uc\Module\Unit\Controller;

use Uc\Module\Core\WebController;
use Illuminate\Contracts\View\View;

class UnitController extends WebController
{
    public function index(): View
    {
        return $this->view('unit.index');
    }
}
