<?php

declare(strict_types=1);

namespace Uc\Module\Course\Service;

use Uc\Module\Course\Model\Chapter;
use Uc\Module\Course\Request\ChapterStoreRequest;

class ChapterService implements ChapterServiceInterface
{
    public function store(ChapterStoreRequest $req): Chapter
    {
        $chapter = new Chapter();
        $chapter->title = $req->name;
        $chapter->number = $req->number;
        $chapter->description = $req->description;
        $chapter->save();

        return $chapter;
    }
}
