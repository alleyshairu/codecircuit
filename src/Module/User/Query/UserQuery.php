<?php

declare(strict_types=1);

namespace Uc\Module\User\Query;

use App\Models\User\User;

class UserQuery implements UserQueryInterface
{
    public function get(string $id): ?User
    {
        /** @var ?User */
        $user = User::query()
            ->where('user_id', $id)
            ->first();

        if (null === $user) {
            return null;
        }

        return $user;
    }
}
