<?php

declare(strict_types=1);

namespace Uc\Module\Teacher\Query;

use App\Models\User\User;
use App\Models\User\UserKind;
use Uc\Module\Teacher\View\Teacher;
use Illuminate\Pagination\LengthAwarePaginator;
use Uc\Module\Teacher\Request\TeacherSearchRequest;

class TeacherQuery implements TeacherQueryInterface
{
    public function get(int $id): ?Teacher
    {
        /** @var ?User */
        $user = User::query()
            ->where('user_kind_id', UserKind::Teacher->value)
            ->find($id);

        if (null === $user) {
            return null;
        }

        return Teacher::fromUser($user);
    }

    /**
     * @return LengthAwarePaginator<Teacher>
     */
    public static function filter(TeacherSearchRequest $request): LengthAwarePaginator
    {
        $query = User::query()
            ->where('user_kind_id', UserKind::Teacher->value);

        if (null !== $request->name) {
            $query->where('name', 'ilike', '%'.trim($request->name).'%');
        }

        /**
         * @var LengthAwarePaginator<Teacher>
         */
        $result = $query
            ->orderBy('name', 'asc')
            ->paginate(30)
            ->through(function (User $user) {
                return Teacher::fromUser($user);
            });

        return $result;
    }
}
