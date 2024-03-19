<?php

declare(strict_types=1);

namespace Uc\Module\Student\View;

use App\Models\User\User;

readonly class Student
{
    public string $id;

    public int $userId;

    public string $name;

    public string $email;

    private function __construct(User $user)
    {
        $this->id = $user->user_id;
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public static function fromUser(User $user): self
    {
        return new self($user);
    }
}
