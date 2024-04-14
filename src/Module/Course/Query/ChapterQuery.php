<?php

declare(strict_types=1);

namespace Uc\Module\Course\Query;

use Illuminate\Support\Collection;
use Uc\Module\Course\Model\Chapter;
use Uc\Module\Language\Model\Language;

class ChapterQuery implements ChapterQueryInterface
{
    public function get(string $id): ?Chapter
    {
        /** @var ?Chapter */
        $ch = Chapter::query()
            ->where('chapter_id', $id)
            ->first();

        return $ch;
    }

    /**
     * @return Collection<int, Chapter>
     */
    public function all(Language $language): Collection
    {
        $result = Chapter::query()
            ->where('language_id', $language->id())
        ->get();

        return $result;
    }
}
