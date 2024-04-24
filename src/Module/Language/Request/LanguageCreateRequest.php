<?php

declare(strict_types=1);

namespace Uc\Module\Language\Request;

readonly class LanguageCreateRequest
{
    public function __construct(
        public string $name,
        public string $logo,
        public string $website,
        public string $color,
        public int $compilerId,
        public ?string $description,
    ) {
    }
}
