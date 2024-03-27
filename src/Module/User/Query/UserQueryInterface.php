<?php

declare(strict_types=1);

namespace Uc\Module\User\Query;

use App\Models\User\User;

interface UserQueryInterface
{
    public function get(string $id): ?User;
}
