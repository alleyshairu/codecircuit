<?php

declare(strict_types=1);

namespace Uc\Module\Student\Request;

use Uc\Module\Language\Model\Language;
use Uc\Module\Language\Query\LanguageQueryInterface;

readonly class StudentSearchRequest
{
    public function __construct(
        public ?Language $language,
        public ?string $name,
    ) {
    }

    /**
     * @param array<string, string> $data
     */
    public static function fromArray(array $data): self
    {
        $name = null;
        if (isset($data['name'])) {
            $name = (string) $data['name'];
        }

        $language = null;
        if (isset($data['language_id'])) {
            /** @var LanguageQueryInterface */
            $query = app(LanguageQueryInterface::class);
            $language = $query->get((int) $data['language_id']);
        }

        return new self($language, name: $name);
    }
}
