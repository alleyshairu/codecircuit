<?php

declare(strict_types=1);

namespace Uc\Module\Language\Query;

use Illuminate\Support\Collection;
use Uc\Module\Language\Model\Language;

class LanguageQuery implements LanguageQueryInterface
{
    public function get(int $id): ?Language
    {
        /** @var ?Language */
        $lang = Language::query()
            ->find($id);

        return $lang;
    }

    /**
     * @return Collection<int, Language>
     */
    public function all(): Collection
    {
        $result = Language::query()
        ->get();

        return $result;
    }
}
