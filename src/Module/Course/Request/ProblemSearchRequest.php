<?php

declare(strict_types=1);

namespace Uc\Module\Course\Request;

readonly class ProblemSearchRequest
{
    public function __construct(
    ) {
    }

    /**
     * @param array<string, string> $data
     */
    public static function fromArray(array $data): self
    {
        return new self();
    }
}
