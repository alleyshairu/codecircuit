<?php

declare(strict_types=1);

namespace Uc\Module\Teacher\Controller;

use Illuminate\Http\Request;
use Uc\Module\Core\WebController;
use Illuminate\Contracts\View\View;
use Uc\Module\Teacher\Query\TeacherQueryInterface;
use Uc\Module\Teacher\Request\TeacherSearchRequest;

class TeacherController extends WebController
{
    public function index(TeacherQueryInterface $query, Request $request): View
    {
        $req = TeacherSearchRequest::fromArray($request->all());
        $teachers = $query->filter($req);

        return $this->view('teacher.index', [
            'teachers' => $teachers,
        ]);
    }

    public function create(): View
    {
        return $this->view('teacher.create', [
        ]);
    }
}
