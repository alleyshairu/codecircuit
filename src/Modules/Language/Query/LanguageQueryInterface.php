<?php

declare(strict_types=1);

namespace Uc\Modules\Language\Query;

use Illuminate\Support\Collection;
use Uc\Modules\Language\Model\Language;

interface LanguageQueryInterface
{
    public function get(int $id): ?Language;

    /**
     * @return Collection<int, Language>
     */
    public function all(): Collection;
}
