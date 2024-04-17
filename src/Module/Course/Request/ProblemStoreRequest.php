<?php

declare(strict_types=1);

namespace Uc\Module\Course\Request;

use Uc\Module\Course\Model\Chapter;
use Uc\Module\Course\Model\ProblemLevel;
use Illuminate\Validation\ValidationException;

readonly class ProblemStoreRequest
{
    public function __construct(
        public string $title,
        public string $description,
        public ProblemLevel $level,
        public Chapter $chapter,
    ) {
    }

    /**
     * @param array<string, string> $data
     */
    public static function fromArray(Chapter $chapter, array $data): self
    {
        if (!isset($data['title']) || !isset($data['description']) || !isset($data['problem_level_id'])) {
            throw ValidationException::withMessages(['missing_data' => ['required data missing']]);
        }

        $level = ProblemLevel::tryFrom((int) $data['problem_level_id']);
        if (null === $level) {
            $level = ProblemLevel::Unknown;
        }

        return new self($data['title'], $data['description'], $level, $chapter);
    }
}
