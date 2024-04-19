<?php

declare(strict_types=1);

namespace Uc\Module\User\Service;

use App\Models\User\User;

class UserService implements UserServiceInterface
{
    public function changeName(User $user, string $name): void
    {
        $user->name = $name;
        $user->save();
    }

    public function changePassword(User $user, string $password): void
    {
        $user->password = bcrypt($password);
        $user->save();
    }
}
