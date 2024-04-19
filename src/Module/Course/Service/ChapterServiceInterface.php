<?php

declare(strict_types=1);

namespace Uc\Module\Course\Service;

use Uc\Module\Course\Model\Chapter;
use Uc\Module\Course\Request\ChapterStoreRequest;
use Uc\Module\Course\Request\ChapterUpdateRequest;

interface ChapterServiceInterface
{
    public function store(ChapterStoreRequest $req): Chapter;

    public function update(Chapter $chapter, ChapterUpdateRequest $req): void;
}
