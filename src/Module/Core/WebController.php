<?php

namespace Uc\Module\Core;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Validator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\ResponseFactory;
use Uc\Module\User\Query\UserQueryInterface;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Uc\Module\Course\Query\CourseQueryInterface;
use Uc\Module\User\Service\UserServiceInterface;
use Uc\Module\Course\Query\ChapterQueryInterface;
use Uc\Module\Course\Query\ProblemQueryInterface;
use Uc\Module\Student\Query\StudentQueryInterface;
use Uc\Module\Teacher\Query\TeacherQueryInterface;
use Illuminate\Routing\Controller as BaseController;
use Uc\Module\Feedback\Query\FeedbackQueryInterface;
use Uc\Module\Language\Query\LanguageQueryInterface;
use Uc\Module\Course\Service\ChapterServiceInterface;
use Uc\Module\Course\Service\ProblemServiceInterface;
use Uc\Module\Teacher\Service\TeacherServiceInterface;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Uc\Module\Feedback\Service\FeedbackServiceInterface;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Uc\Module\Student\Query\StudentPreferenceQueryInterface;

class WebController extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    protected LanguageQueryInterface $languageQuery;
    protected CourseQueryInterface $courseQuery;

    protected TeacherServiceInterface $teacherService;
    protected TeacherQueryInterface $teacherQuery;

    protected StudentQueryInterface $studentQuery;
    protected StudentPreferenceQueryInterface $studentPreferenceQuery;

    protected ChapterServiceInterface $chapterService;
    protected ChapterQueryInterface $chapterQuery;

    protected ProblemQueryInterface $problemQuery;
    protected ProblemServiceInterface $problemService;

    protected UserServiceInterface $userService;
    protected UserQueryInterface $userQuery;

    protected FeedbackQueryInterface $feedbackQuery;
    protected FeedbackServiceInterface $feedbackService;

    public function __construct(
        LanguageQueryInterface $languageQuery,
        CourseQueryInterface $courseQuery,

        UserServiceInterface $userService,
        UserQueryInterface $userQuery,

        TeacherServiceInterface $teacherService,
        TeacherQueryInterface $teacherQuery,

        StudentQueryInterface $studentQuery,
        StudentPreferenceQueryInterface $studentPreferenceQuery,

        ChapterQueryInterface $chapterQuery,
        ChapterServiceInterface $chapterService,

        ProblemQueryInterface $problemQuery,
        ProblemServiceInterface $problemService,

        FeedbackQueryInterface $feedbackQuery,
        FeedbackServiceInterface $feedbackService
    ) {
        $this->languageQuery = $languageQuery;
        $this->courseQuery = $courseQuery;

        $this->userService = $userService;
        $this->userQuery = $userQuery;

        $this->teacherService = $teacherService;
        $this->teacherQuery = $teacherQuery;

        $this->studentQuery = $studentQuery;
        $this->studentPreferenceQuery = $studentPreferenceQuery;

        $this->chapterQuery = $chapterQuery;
        $this->chapterService = $chapterService;

        $this->problemQuery = $problemQuery;
        $this->problemService = $problemService;

        $this->feedbackQuery = $feedbackQuery;
        $this->feedbackService = $feedbackService;
    }

    /**
     * @phpstan-ignore-next-line
     */
    public function view(?string $view = null, array $data = [], array $mergeData = []): View
    {
        /**
         * @var View $v
         */
        $v = view($view, $data, $mergeData);

        return $v;
    }

    /**
     * @phpstan-ignore-next-line
     */
    public function redirectRoute(string $route, array $parameters = [], int $status = 302, array $headers = []): RedirectResponse
    {
        /** @var RedirectResponse $r */
        $r = redirect()->route($route, $parameters, $status, $headers);

        return $r;
    }

    protected function noContent(): Response
    {
        /** @var ResponseFactory * */
        $res = response();

        return $res->noContent();
    }

    /**
     * @param array<mixed> $data
     */
    protected function json(array $data, int $status = 200): JsonResponse
    {
        /** @var ResponseFactory * */
        $res = response();

        return $res->json($data, $status);
    }

    protected function jsonValidationErr(Validator $validator): JsonResponse
    {
        return $this->json([
            'errors' => $validator->errors(),
        ], 422);
    }
}
