<?php

namespace Uc\Module\Course\Controller;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Uc\Module\Core\WebController;
use Illuminate\Contracts\View\View;
use Uc\Module\Course\Model\Chapter;
use Uc\Module\Course\Model\Problem;
use Illuminate\Http\RedirectResponse;

class ProblemController extends WebController
{
    public function create(string $id): View
    {
        /** @var ?Chapter */
        $chapter = Chapter::query()
        ->where('chapter_id', $id)
        ->first();

        if (null === $chapter) {
            abort(404, 'Chapter not found');
        }

        return $this->view('problem.create', [
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

        /** @var ?Chapter */
        $chapter = Chapter::query()
        ->where('chapter_id', $data['chapter_id'])
        ->first();

        if (null === $chapter) {
            abort(404, 'Chapter not found');
        }

        $problem = new Problem();
        $problem->problem_id = Str::orderedUuid()->toString();
        $problem->chapter_id = $chapter->id();
        $problem->title = $data['title'];
        $problem->description = $data['description'];
        $problem->save();

        flash('Problem added!')->success();

        return $this->redirectRoute('problem.show', ['id' => $problem->id()]);
    }

    public function show(string $id): View
    {
        /** @var ?Problem */
        $problem = Problem::query()
        ->where('problem_id', $id)
        ->first();

        if (null === $problem) {
            abort(404, 'Problem not found');
        }

        return $this->view('problem.show', [
            'problem' => $problem,
        ]);
    }
}
