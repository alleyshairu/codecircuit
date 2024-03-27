<?php

declare(strict_types=1);

namespace Uc\Module\User\Service;

use App\Models\User\User;

interface UserServiceInterface
{
    public function passwordUpdate(User $user, string $password): void;
}
