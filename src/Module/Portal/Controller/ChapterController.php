<?php

namespace Uc\Module\Portal\Controller;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Uc\Module\Course\Model\Problem;
use Illuminate\Http\RedirectResponse;
use Uc\Module\Course\Request\ChapterStoreRequest;
use Uc\Module\Course\Request\ChapterUpdateRequest;

class ChapterController extends PortalController
{
    public function create(int $id): View
    {
        $lang = $this->languageQuery->get($id);
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

        $lang = $this->languageQuery->get($data['course_id']);
        if (null === $lang) {
            abort(404, 'Language not found');
        }

        $req = ChapterStoreRequest::fromArray($lang, $data);

        $chapter = $this->chapterService->store($req);
        flash('Chapter added!')->success();

        return $this->redirectRoute('portal.chapter.edit', ['id' => $chapter->id()]);
    }

    public function overview(string $id): View
    {
        $chapter = $this->chapterQuery->get($id);
        if (null === $chapter) {
            abort(404, 'Chapter not found');
        }

        return $this->view('portal.chapter.overview', [
            'chapter' => $chapter,
        ]);
    }

    public function edit(string $id): View
    {
        $ch = $this->chapterQuery->get($id);
        if (null === $ch) {
            abort(404, 'Chapter not found');
        }

        return $this->view('portal.chapter.edit', [
            'chapter' => $ch,
        ]);
    }

    public function problems(string $id): View
    {
        $ch = $this->chapterQuery->get($id);
        if (null === $ch) {
            abort(404, 'Chapter not found');
        }

        $problems = Problem::query()
            ->where('chapter_id', $ch->id())
            ->get();

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

        $chapter = $this->chapterQuery->get($id);
        if (null === $chapter) {
            abort(404, 'Chapter not found');
        }

        $req = ChapterUpdateRequest::fromArray($data);
        $this->chapterService->update($chapter, $req);

        flash('Chapter updated!')->success();

        return $this->redirectRoute('portal.chapter.edit', ['id' => $chapter->id()]);
    }
}
