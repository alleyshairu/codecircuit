<?php

declare(strict_types=1);

namespace Uc\Module\Language\Service;

use Uc\Module\Language\Model\Language;
use Uc\Module\Language\Request\LanguageCreateRequest;

interface LanguageServiceInterface
{
    public function create(LanguageCreateRequest $req): Language;
}
