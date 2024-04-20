<?php

declare(strict_types=1);

namespace Uc\Module\User\Query;

use App\Models\User\User;
use App\Models\User\UserKind;
use Illuminate\Pagination\LengthAwarePaginator;

class UserQuery implements UserQueryInterface
{
    public function get(string $id): ?User
    {
        /** @var ?User */
        $user = User::query()
            ->where('user_id', $id)
            ->first();

        return $user;
    }

    public function getByPrimaryKey(int $id): ?User
    {
        /** @var ?User */
        $user = User::query()
            ->where('id', $id)
            ->first();

        return $user;
    }

    /**
     * @return LengthAwarePaginator<User>
     */
    public function getAdministrators(): LengthAwarePaginator
    {
        $query = User::query()
            ->where('user_kind_id', UserKind::Admin->value);

        /**
         * @var LengthAwarePaginator<User>
         */
        $result = $query
            ->orderBy('name', 'asc')
            ->paginate(30);

        return $result;
    }
}
