<?php

declare(strict_types=1);

namespace Uc\Module\Portal\Controller;

use Illuminate\Contracts\View\View;

class AdminController extends PortalController
{
    public function index(): View
    {
        $admins = $this->userQuery->getAdministrators();

        return $this->view('portal.admin.index', [
            'admins' => $admins,
        ]);
    }
}
