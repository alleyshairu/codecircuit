<?php

declare(strict_types=1);

namespace Uc\Modules\Language\Service;

use Uc\Modules\Language\Model\Language;
use Uc\Modules\Language\Request\LanguageCreateRequest;

interface LanguageServiceInterface
{
    public function create(LanguageCreateRequest $req): Language;
}
