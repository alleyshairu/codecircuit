<?php

declare(strict_types=1);

namespace Uc\Module\Site\Controller;

use Illuminate\Contracts\View\View;
use Uc\Module\Student\Model\StudentLevel;

class StartController extends SiteController
{
    public function __invoke(): View
    {
        $languages = $this->languageQuery->all();
        $levels = StudentLevel::cases();

        return $this->view('site.start.start', [
            'languages' => $languages,
            'levels' => $levels,
        ]);
    }
}
