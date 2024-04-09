<?php

declare(strict_types=1);

namespace Uc\Module\Student\Query;

use App\Models\User\User;
use App\Models\User\UserKind;
use Uc\Module\Student\View\Student;
use Illuminate\Pagination\LengthAwarePaginator;
use Uc\Module\Student\Request\StudentSearchRequest;

class StudentQuery implements StudentQueryInterface
{
    public function get(string $id): ?Student
    {
        /** @var ?User */
        $user = User::query()
            ->where('user_kind_id', UserKind::Student->value)
            ->where('user_id', $id)
            ->first($id);

        if (null === $user) {
            return null;
        }

        return Student::fromUser($user);
    }

    /**
     * @return LengthAwarePaginator<Student>
     */
    public function filter(StudentSearchRequest $request): LengthAwarePaginator
    {
        $query = User::query()
            ->where('user_kind_id', UserKind::Student->value);

        if (null !== $request->name) {
            $query->where('name', 'ilike', '%'.trim($request->name).'%');
        }

        /**
         * @var LengthAwarePaginator<Student>
         */
        $result = $query
            ->orderBy('name', 'asc')
            ->paginate(30)
            ->through(function (User $user) {
                return Student::fromUser($user);
            });

        return $result;
    }
}
