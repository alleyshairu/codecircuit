<?php

declare(strict_types=1);

namespace Uc\Module\Portal\Controller;

use Uc\Module\Core\WebController;
use Illuminate\Contracts\View\View;

class AdminController extends WebController
{
    public function index(): View
    {
        $admins = $this->userQuery->getAdministrators();

        return $this->view('portal.admin.index', [
            'admins' => $admins,
        ]);
    }
}
