<?php

namespace Uc\Module\Portal\Controller;

use Uc\Module\Core\WebController;
use Illuminate\Contracts\View\View;
use Uc\Module\Language\Query\LanguageQueryInterface;

class LanguageController extends WebController
{
    public function index(LanguageQueryInterface $query): View
    {
        $languages = $query->all();

        return $this->view('portal.language.index', [
            'languages' => $languages,
        ]);
    }
}
