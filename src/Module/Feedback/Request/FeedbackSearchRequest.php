<?php

declare(strict_types=1);

namespace Uc\Module\Feedback\Request;

use Uc\Module\Language\Model\Language;
use Uc\Module\Language\Query\LanguageQueryInterface;

readonly class FeedbackSearchRequest
{
    public ?Language $language;

    public function __construct(
        ?Language $language,
    ) {
        $this->language = $language;
    }

    /**
     * @param array<string, string> $data
     */
    public static function fromArray(array $data): self
    {
        $language = null;
        if (isset($data['language_id'])) {
            /** @var LanguageQueryInterface */
            $query = app(LanguageQueryInterface::class);
            $language = $query->get((int) $data['language_id']);
        }

        return new self($language);
    }
}
