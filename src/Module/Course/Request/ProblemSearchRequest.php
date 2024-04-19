<?php

declare(strict_types=1);

namespace Uc\Module\Course\Request;

use Uc\Module\Language\Model\Language;
use Uc\Module\Course\Model\ProblemLevel;
use Uc\Module\Language\Query\LanguageQueryInterface;

readonly class ProblemSearchRequest
{
    public ?ProblemLevel $level;
    public ?Language $language;

    public function __construct(
        ?ProblemLevel $level,
        ?Language $language,
    ) {
        $this->level = $level;
        $this->language = $language;
    }

    /**
     * @param array<string, string> $data
     */
    public static function fromArray(array $data): self
    {
        $level = null;
        if (isset($data['problem_level_id'])) {
            $level = ProblemLevel::tryFrom((int) $data['problem_level_id']);
        }

        $language = null;
        if (isset($data['language_id'])) {
            /** @var LanguageQueryInterface */
            $query = app(LanguageQueryInterface::class);
            $language = $query->get((int) $data['language_id']);
        }

        return new self($level, $language);
    }
}
