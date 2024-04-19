<?php

declare(strict_types=1);

namespace Uc\Module\Portal\Controller;

use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Uc\Module\Core\WebController;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Uc\Module\Teacher\Query\TeacherQueryInterface;
use Uc\Module\Teacher\Request\TeacherCreateRequest;
use Uc\Module\Teacher\Request\TeacherSearchRequest;
use Uc\Module\Teacher\Service\TeacherServiceInterface;

class TeacherController extends WebController
{
    private TeacherServiceInterface $service;

    private TeacherQueryInterface $query;

    public function __construct(TeacherServiceInterface $service, TeacherQueryInterface $query)
    {
        $this->service = $service;
        $this->query = $query;
    }

    public function index(Request $request): View
    {
        $req = TeacherSearchRequest::fromArray($request->all());
        $teachers = $this->query->filter($req);

        return $this->view('portal.teacher.index', [
            'teachers' => $teachers,
            'filters' => $req,
        ]);
    }

    public function create(): View
    {
        return $this->view('portal.teacher.create');
    }

    public function store(Request $request): RedirectResponse
    {
        /** @var array<string, string> */
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $req = TeacherCreateRequest::fromArray($data);
        $teacher = $this->service->create($req);

        return $this->redirectRoute('portal.teacher.show', [
            'id' => $teacher->id,
            'filters' => $req,
        ]);
    }

    public function edit(string $id): View
    {
        $teacher = $this->query->get($id);

        return $this->view('portal.teacher.edit', ['teacher' => $teacher]);
    }
}
