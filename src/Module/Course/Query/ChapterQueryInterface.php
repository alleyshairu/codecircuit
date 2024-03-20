<?php

declare(strict_types=1);

namespace Uc\Module\Course\Query;

use Illuminate\Support\Collection;
use Uc\Module\Course\Model\Chapter;
use Uc\Module\Language\Model\Language;

interface ChapterQueryInterface
{
    public function get(int $id): ?Chapter;

    /**
     * @return Collection<int, Chapter>
     */
    public function all(Language $language): Collection;
}
