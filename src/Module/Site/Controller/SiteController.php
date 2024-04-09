<?php

namespace Uc\Module\Site\Controller;

use Uc\Module\Core\WebController;
use Uc\Module\Student\Query\StudentQueryInterface;
use Uc\Module\Teacher\Query\TeacherQueryInterface;
use Uc\Module\Language\Query\LanguageQueryInterface;
use Uc\Module\Teacher\Service\TeacherServiceInterface;
use Uc\Module\Student\Query\StudentPreferenceQueryInterface;

class SiteController extends WebController
{
    protected TeacherServiceInterface $teacherService;

    protected TeacherQueryInterface $teacherQuery;

    protected StudentQueryInterface $studentQuery;
    protected StudentPreferenceQueryInterface $studentPreferenceQuery;

    protected LanguageQueryInterface $languageQuery;

    public function __construct(
        TeacherServiceInterface $teacherService,
        TeacherQueryInterface $teacherQuery,

        LanguageQueryInterface $languageQuery,

        StudentQueryInterface $studentQuery,
        StudentPreferenceQueryInterface $studentPreferenceQuery
    ) {
        $this->teacherService = $teacherService;
        $this->teacherQuery = $teacherQuery;

        $this->languageQuery = $languageQuery;

        $this->studentQuery = $studentQuery;
        $this->studentPreferenceQuery = $studentPreferenceQuery;
    }
}
