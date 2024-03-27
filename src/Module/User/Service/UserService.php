<?php

declare(strict_types=1);

namespace Uc\Module\User\Service;

use App\Models\User\User;
use Illuminate\Support\Facades\Hash;

class UserService implements UserServiceInterface
{
    public function passwordUpdate(User $user, string $password): void
    {
        $user->password = Hash::make($password);
        $user->save();
    }
}
