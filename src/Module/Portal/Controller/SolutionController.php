<?php

namespace Uc\Module\Portal\Controller;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class SolutionController extends PortalController
{
    public function index(Request $request): View
    {
        $solutions = $this->solutionQuery->filter();

        return $this->view('portal.solution.index', [
            'solutions' => $solutions,
        ]);
    }
}
