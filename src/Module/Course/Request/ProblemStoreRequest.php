<?php

declare(strict_types=1);

namespace Uc\Module\Course\Request;

use Uc\Module\Course\Model\Chapter;
use Illuminate\Validation\ValidationException;

readonly class ProblemStoreRequest
{
    public function __construct(
        public string $title,
        public ?string $description,
        public Chapter $chapter,
    ) {
    }

    /**
     * @param array<string, string> $data
     */
    public static function fromArray(Chapter $chapter, array $data): self
    {
        if (!isset($data['title']) || !isset($data['description'])) {
            throw ValidationException::withMessages(['missing_data' => ['required data missing']]);
        }

        return new self($data['title'], $data['description'], $chapter);
    }
}
