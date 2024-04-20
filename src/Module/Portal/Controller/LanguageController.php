<?php

namespace Uc\Module\Portal\Controller;

use Illuminate\Contracts\View\View;
use Uc\Module\Language\Query\LanguageQueryInterface;

class LanguageController extends PortalController
{
    public function index(LanguageQueryInterface $query): View
    {
        $languages = $query->all();

        return $this->view('portal.language.index', [
            'languages' => $languages,
        ]);
    }
}
