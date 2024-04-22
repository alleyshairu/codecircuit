<?php

declare(strict_types=1);

namespace Uc\Module\Site\Controller;

use Illuminate\Contracts\View\View;

class LeaderboardController extends SiteController
{
    public function overall(): View
    {
        return $this->view('site.leaderboard.overall');
    }
}
