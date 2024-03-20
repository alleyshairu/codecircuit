<?php

declare(strict_types=1);

namespace Uc\Module\Course\Request;

readonly class ChapterStoreRequest
{
    public function __construct(
        public string $name,
        public int $number,
        public ?string $description,
    ) {
    }
}
