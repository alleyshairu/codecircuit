<?php

namespace Uc\Module\Course\Controller;

use Uc\Module\Core\WebController;
use Illuminate\Contracts\View\View;
use Uc\Module\Course\Query\ChapterQueryInterface;
use Uc\Module\Language\Query\LanguageQueryInterface;
use Uc\Module\Course\Service\ChapterServiceInterface;

class CourseController extends WebController
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

    public function show(int $id): View
    {
        $lang = $this->langQuery->get($id);
        if (null === $lang) {
            abort(404, 'Language not found');
        }

        $chapters = $this->chQuery->all($lang);

        return $this->view('portal.course.show', [
            'language' => $lang,
            'chapters' => $chapters,
        ]);
    }
}
