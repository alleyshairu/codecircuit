<?php

declare(strict_types=1);

namespace Uc\Module\Language\Service;

use Uc\Module\Language\Model\Language;
use Uc\Module\Language\Request\LanguageCreateRequest;

class LanguageService implements LanguageServiceInterface
{
    public function create(LanguageCreateRequest $req): Language
    {
        $lang = new Language();
        $lang->name = $req->name;
        $lang->color = $req->color;
        $lang->logo = $req->logo;
        $lang->website = $req->website;
        $lang->description = $req->description;
        $lang->save();

        return $lang;
    }
}
