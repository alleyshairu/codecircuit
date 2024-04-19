<?php

declare(strict_types=1);

namespace Uc\Module\Portal\Controller;

use Illuminate\Contracts\View\View;

class DashboardController extends PortalController
{
    public function __invoke(): View
    {
        return $this->view('portal.dashboard.dashboard', []);
    }
}
