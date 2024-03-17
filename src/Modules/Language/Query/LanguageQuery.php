<?php

declare(strict_types=1);

namespace Uc\Modules\Language\Service;

use Uc\Modules\Language\Model\Language;

class LanguageQuery implements LanguageQueryInterface
{
    public function get(int $id): ?Language
    {
        /** @var Language */
        $lang = Language::query()
            ->find($id);

        if (null === $lang) {
            return null;
        }

        return $lang;
    }
}
