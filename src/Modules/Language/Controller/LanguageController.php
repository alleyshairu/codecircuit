<?php

namespace Uc\Modules\Language\Controller;

use Uc\Modules\Core\WebController;
use Illuminate\Contracts\View\View;
use Uc\Modules\Language\Query\LanguageQueryInterface;

class LanguageController extends WebController
{
    public function index(LanguageQueryInterface $query): View
    {
        $languages = $query->all();

        return $this->view('language.index', [
            'languages' => $languages,
        ]);
    }
}
