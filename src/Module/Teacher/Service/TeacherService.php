<?php

declare(strict_types=1);

namespace Uc\Module\Teacher\Service;

use App\Models\User\User;
use Illuminate\Support\Str;
use App\Models\User\UserKind;
use Uc\Module\Teacher\View\Teacher;
use Illuminate\Support\Facades\Hash;
use Uc\Module\Teacher\Request\TeacherCreateRequest;

class TeacherService implements TeacherServiceInterface
{
    public function create(TeacherCreateRequest $req): Teacher
    {
        $user = new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->user_id = Str::orderedUuid()->toString();
        $user->user_kind_id = UserKind::Teacher->value;
        $user->save();

        return Teacher::fromUser($user);
    }
}
