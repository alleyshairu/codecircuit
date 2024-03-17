<?php

declare(strict_types=1);

namespace Uc\Modules\Language\Service;

use Uc\Modules\Language\Model\Language;

interface LanguageQueryInterface
{
    public function get(int $id): ?Language;
}
