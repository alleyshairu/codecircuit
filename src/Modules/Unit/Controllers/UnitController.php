<?php

namespace Uc\Modules\Unit\Controllers;

use Uc\Modules\Core\WebController;
use Illuminate\Contracts\View\View;

class UnitController extends WebController
{
    public function index(): View
    {
        return $this->view('unit.index');
    }
}
