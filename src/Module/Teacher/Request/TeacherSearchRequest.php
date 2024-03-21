<?php

declare(strict_types=1);

namespace Uc\Module\Teacher\Request;

readonly class TeacherSearchRequest
{
    public function __construct(
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

        return new self(name: $name);
    }
}
