<?php

declare(strict_types=1);

namespace Uc\Module\Course\Service;

use Illuminate\Support\Str;
use Uc\Module\Course\Model\Chapter;
use Uc\Module\Course\Request\ChapterStoreRequest;

class ChapterService implements ChapterServiceInterface
{
    public function store(ChapterStoreRequest $req): Chapter
    {
        $chapter = new Chapter();
        $chapter->chapter_id = Str::orderedUuid()->toString();
        $chapter->title = $req->title;
        $chapter->number = 1;
        $chapter->description = $req->description;
        $chapter->learning_outcome = 'w';
        $chapter->language_id = $req->language->id();
        $chapter->save();

        return $chapter;
    }
}
