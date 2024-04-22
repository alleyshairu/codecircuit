<?php

namespace Uc\Module\Portal\Controller;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Uc\Module\Student\Request\StudentSearchRequest;

class CourseController extends PortalController
{
    public function overview(int $id): View
    {
        $lang = $this->languageQuery->get($id);
        if (null === $lang) {
            abort(404, 'Language not found');
        }

        $studentsEnrolled = $this->courseQuery->studentsEnrolledCount($lang->id());
        $problemsCount = $this->courseQuery->problemsCount($lang->id());
        $chapters = $this->chapterQuery->all($lang);

        return $this->view('portal.course.overview', [
            'language' => $lang,
            'chapters' => $chapters,
            'studentsEnrolled' => $studentsEnrolled,
            'problemsCount' => $problemsCount,
        ]);
    }

    public function chapters(int $id): View
    {
        $lang = $this->languageQuery->get($id);
        if (null === $lang) {
            abort(404, 'Language not found');
        }

        $chapters = $this->chapterQuery->all($lang);

        return $this->view('portal.course.chapters', [
            'language' => $lang,
            'chapters' => $chapters,
        ]);
    }

    public function stats(int $id): View
    {
        $lang = $this->languageQuery->get($id);
        if (null === $lang) {
            abort(404, 'Language not found');
        }

        $chapters = $this->chapterQuery->all($lang);
        $studentsEnrolled = $this->courseQuery->studentsEnrolledCount($lang->id());
        $problemsCount = $this->courseQuery->problemsCount($lang->id());

        return $this->view('portal.course.stats', [
            'language' => $lang,
            'chaptersCount' => $chapters->count(),
            'studentsEnrolled' => $studentsEnrolled,
            'problemsCount' => $problemsCount,
        ]);
    }

    public function students(Request $request, int $id): View
    {
        $lang = $this->languageQuery->get($id);
        if (null === $lang) {
            abort(404, 'Language not found');
        }

        $filters = StudentSearchRequest::fromArray(['language_id' => $lang->id()] + $request->all());
        $students = $this->studentQuery->filter($filters);

        return $this->view('portal.course.students', [
            'language' => $lang,
            'filters' => $filters,
            'students' => $students,
        ]);
    }
}
