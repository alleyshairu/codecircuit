<?php

declare(strict_types=1);

namespace Uc\Module\Course\Request;

use Uc\Module\Course\Model\ProblemLevel;
use Illuminate\Validation\ValidationException;

readonly class ProblemUpdateRequest
{
    public function __construct(
        public string $title,
        public string $description,
        public ProblemLevel $level,
    ) {
    }

    /**
     * @param array<string, string> $data
     */
    public static function fromArray(array $data): self
    {
        if (!isset($data['title']) || !isset($data['description'])) {
            throw ValidationException::withMessages(['missing_data' => ['required data missing']]);
        }

        $level = ProblemLevel::tryFrom((int) $data['problem_level_id']);
        if (null === $level) {
            $level = ProblemLevel::Unknown;
        }

        return new self($data['title'], $data['description'], $level);
    }
}
