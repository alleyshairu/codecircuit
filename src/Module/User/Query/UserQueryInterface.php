<?php

declare(strict_types=1);

namespace Uc\Module\User\Query;

use App\Models\User\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface UserQueryInterface
{
    public function get(string $id): ?User;

    public function getByPrimaryKey(int $id): ?User;

    public function getAdministrators(): LengthAwarePaginator;
}
