<?php

namespace Uc\Module\Site\Controller;

use Uc\Module\Core\WebController;
use Uc\Module\Teacher\Query\TeacherQueryInterface;
use Uc\Module\Language\Query\LanguageQueryInterface;
use Uc\Module\Teacher\Service\TeacherServiceInterface;

class SiteController extends WebController
{
    protected TeacherServiceInterface $teacherService;

    protected TeacherQueryInterface $teacherQuery;

    protected LanguageQueryInterface $languageQuery;

    public function __construct(
        TeacherServiceInterface $teacherService,
        TeacherQueryInterface $teacherQuery,
        LanguageQueryInterface $languageQuery
    ) {
        $this->teacherService = $teacherService;
        $this->teacherQuery = $teacherQuery;
        $this->languageQuery = $languageQuery;
    }
}
