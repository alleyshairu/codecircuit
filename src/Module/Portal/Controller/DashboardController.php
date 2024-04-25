<?php

declare(strict_types=1);

namespace Uc\Module\Portal\Controller;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class DashboardController extends PortalController
{
    public function __invoke(Request $request): View
    {
        return $this->view('portal.dashboard.dashboard', []);
    }
}
