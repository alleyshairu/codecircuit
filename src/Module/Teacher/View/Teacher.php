<?php

declare(strict_types=1);

namespace Uc\Module\Teacher\View;

use Carbon\Carbon;
use App\Models\User\User;

readonly class Teacher
{
    public string $id;

    public int $userId;

    public string $name;

    public string $email;

    public Carbon $createdAt;

    private function __construct(User $user)
    {
        $this->id = $user->user_id;
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->createdAt = $user->created_at;
    }

    public static function fromUser(User $user): self
    {
        return new self($user);
    }
}
