<?php

namespace Uc\Module\Portal\Controller;

use Illuminate\Contracts\View\View;

class CourseController extends PortalController
{
    public function show(int $id): View
    {
        $lang = $this->languageQuery->get($id);
        if (null === $lang) {
            abort(404, 'Language not found');
        }

        $studentsEnrolled = $this->courseQuery->studentsEnrolledCount($lang->id());
        $problemsCount = $this->courseQuery->problemsCount($lang->id());
        $chapters = $this->chapterQuery->all($lang);

        return $this->view('portal.course.show', [
            'language' => $lang,
            'chapters' => $chapters,
            'studentsEnrolled' => $studentsEnrolled,
            'problemsCount' => $problemsCount,
        ]);
    }
}
