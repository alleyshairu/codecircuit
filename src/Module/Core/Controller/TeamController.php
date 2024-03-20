<?php

declare(strict_types=1);

namespace Uc\Module\Core\Controller;

use Uc\Module\Core\WebController;
use Illuminate\Contracts\View\View;

class TeamController extends WebController
{
    public function __invoke(): View
    {
        $people = [
            ['name' => 'Dr Min Wang', 'role' => 'Sponsor'],
            ['name' => 'Dr Majid Alsubaie', 'role' => 'Supervisor'],
            ['name' => 'Hassan Saleem', 'role' => 'Project Manager'],
            ['name' => 'Sher Afgan', 'role' => 'Software Developer'],
            ['name' => 'Raja Ehtesham Mazhar', 'role' => 'Quality Assurance Engineer'],
        ];

        return $this->view('team', [
            'people' => $people,
        ]);
    }
}
