<?php

declare(strict_types=1);

namespace Uc\Module\Portal\Controller;

use Illuminate\Http\Request;
use Uc\Module\Core\WebController;
use Illuminate\Contracts\View\View;
use Uc\Module\Student\Query\StudentQueryInterface;
use Uc\Module\Student\Request\StudentSearchRequest;

class StudentController extends WebController
{
    public function index(StudentQueryInterface $query, Request $request): View
    {
        $languages = $this->languageQuery->all();
        $filters = StudentSearchRequest::fromArray($request->all());
        $students = $query->filter($filters);

        return $this->view('portal.student.index', [
            'students' => $students,
            'languages' => $languages,
            'filters' => $filters,
        ]);
    }
}
