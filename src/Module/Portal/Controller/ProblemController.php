<?php

namespace Uc\Module\Portal\Controller;

use Illuminate\Http\Request;
use Uc\Module\Core\WebController;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Uc\Module\Course\Request\ProblemStoreRequest;
use Uc\Module\Course\Request\ProblemSearchRequest;
use Uc\Module\Course\Request\ProblemUpdateRequest;

class ProblemController extends WebController
{
    public function index(Request $request): View
    {
        $problems = $this->problemQuery->filter(ProblemSearchRequest::fromArray($request->all()));

        return $this->view('portal.problem.index', [
            'problems' => $problems,
        ]);
    }

    public function create(string $id): View
    {
        $chapter = $this->chapterQuery->get($id);

        if (null === $chapter) {
            abort(404, 'Chapter not found');
        }

        return $this->view('portal.problem.create', [
            'chapter' => $chapter,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        /**
         * @var array<string, string>
         */
        $data = $this->validate($request, [
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'chapter_id' => ['required', 'string'],
        ]);

        $chapter = $this->chapterQuery->get($data['chapter_id']);

        if (null === $chapter) {
            abort(404, 'Chapter not found');
        }

        $req = ProblemStoreRequest::fromArray($chapter, $data);
        $problem = $this->problemService->store($req);

        flash('Problem added!')->success();

        return $this->redirectRoute('portal.problem.edit', ['id' => $problem->id()]);
    }

    public function edit(string $id): View
    {
        $problem = $this->problemQuery->get($id);
        if (null === $problem) {
            abort(404, 'Problem not found');
        }

        return $this->view('portal.problem.edit', [
            'problem' => $problem,
        ]);
    }

    public function update(string $id, Request $request): RedirectResponse
    {
        /**
         * @var array<string, string>
         */
        $data = $this->validate($request, [
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
        ]);

        $problem = $this->problemQuery->get($id);
        if (null === $problem) {
            abort(404, 'Problem not found');
        }

        $req = ProblemUpdateRequest::fromArray($data);
        $this->problemService->update($problem, $req);

        flash('Problem updated!')->success();

        return $this->redirectRoute('portal.problem.edit', ['id' => $problem->id()]);
    }
}
