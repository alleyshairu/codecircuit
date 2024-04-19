<?php

declare(strict_types=1);

namespace Uc\Module\Teacher\Request;

use Illuminate\Validation\ValidationException;

readonly class TeacherCreateRequest
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    ) {
    }

    /**
     * @param array<string, string> $data
     */
    public static function fromArray(array $data): self
    {
        if (!isset($data['name']) || !isset($data['email']) || !isset($data['password'])) {
            throw ValidationException::withMessages(['missing_data' => ['required data missing']]);
        }

        return new self($data['name'], $data['email'], $data['password']);
    }
}
