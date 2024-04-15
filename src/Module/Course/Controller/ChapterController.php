<?php

namespace Uc\Module\Course\Controller;

use Illuminate\Http\Request;
use Uc\Module\Core\WebController;
use Illuminate\Contracts\View\View;
use Uc\Module\Course\Model\Problem;
use Illuminate\Http\RedirectResponse;
use Uc\Module\Course\Query\ChapterQueryInterface;
use Uc\Module\Course\Request\ChapterStoreRequest;
use Uc\Module\Course\Request\ChapterUpdateRequest;
use Uc\Module\Language\Query\LanguageQueryInterface;
use Uc\Module\Course\Service\ChapterServiceInterface;

class ChapterController extends WebController
{
    protected ChapterServiceInterface $service;

    protected ChapterQueryInterface $chQuery;

    protected LanguageQueryInterface $langQuery;

    public function __construct(
        ChapterServiceInterface $service,
        ChapterQueryInterface $chQuery,
        LanguageQueryInterface $langQuery
    ) {
        $this->service = $service;
        $this->chQuery = $chQuery;
        $this->langQuery = $langQuery;
    }

    public function create(int $id): View
    {
        $lang = $this->langQuery->get($id);
        if (null === $lang) {
            abort(404, 'Language not found');
        }

        return $this->view('portal.chapter.create', [
            'language' => $lang,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validate($request, [
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'course_id' => ['required', 'integer'],
        ]);

        $lang = $this->langQuery->get($data['course_id']);
        if (null === $lang) {
            abort(404, 'Language not found');
        }

        $req = ChapterStoreRequest::fromArray($lang, $data);

        $chapter = $this->service->store($req);
        flash('Chapter added!')->success();

        return $this->redirectRoute('portal.chapter.edit', ['id' => $chapter->id()]);
    }

    public function edit(string $id): View
    {
        $ch = $this->chQuery->get($id);
        if (null === $ch) {
            abort(404, 'Chapter not found');
        }

        return $this->view('portal.chapter.show', [
            'chapter' => $ch,
        ]);
    }

    public function problems(string $id): View
    {
        $ch = $this->chQuery->get($id);
        if (null === $ch) {
            abort(404, 'Chapter not found');
        }

        $problems = Problem::query()->get();

        return $this->view('portal.chapter.problems', [
            'chapter' => $ch,
            'problems' => $problems,
        ]);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $data = $this->validate($request, [
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
        ]);

        $chapter = $this->chQuery->get($id);
        if (null === $chapter) {
            abort(404, 'Chapter not found');
        }

        $req = ChapterUpdateRequest::fromArray($data);
        $this->service->update($chapter, $req);

        flash('Chapter updated!')->success();

        return $this->redirectRoute('portal.chapter.edit', ['id' => $chapter->id()]);
    }
}
