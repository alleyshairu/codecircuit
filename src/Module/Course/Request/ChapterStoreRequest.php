<?php

declare(strict_types=1);

namespace Uc\Module\Course\Request;

use Uc\Module\Language\Model\Language;
use Illuminate\Validation\ValidationException;

readonly class ChapterStoreRequest
{
    public function __construct(
        public string $title,
        public ?string $description,
        public Language $language,
    ) {
    }

    /**
     * @param array<string, string> $data
     */
    public static function fromArray(Language $language, array $data): self
    {
        if (!isset($data['title']) || !isset($data['description']) || !isset($data['course_id'])) {
            throw ValidationException::withMessages(['missing_data' => ['required data missing']]);
        }

        return new self($data['title'], $data['description'], $language);
    }
}
