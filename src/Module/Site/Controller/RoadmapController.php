<?php

declare(strict_types=1);

namespace Uc\Module\Site\Controller;

use Illuminate\Contracts\View\View;

class RoadmapController extends SiteController
{
    public function __invoke(): View
    {
        return $this->view('site.roadmap.roadmap');
    }
}
