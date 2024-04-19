<?php

declare(strict_types=1);

namespace Uc\Module\Teacher\Service;

use Uc\Module\Teacher\View\Teacher;
use Uc\Module\Teacher\Request\TeacherCreateRequest;

interface TeacherServiceInterface
{
    public function create(TeacherCreateRequest $req): Teacher;
}
