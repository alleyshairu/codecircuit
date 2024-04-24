<?php

namespace Uc\Module\Core;

use App\Models\User\User;
use App\Models\User\UserKind;
use Uc\Module\User\Query\UserQuery;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Uc\Module\Course\Query\CourseQuery;
use Uc\Module\User\Service\UserService;
use Uc\Module\Course\Query\ChapterQuery;
use Uc\Module\Course\Query\ProblemQuery;
use Uc\Module\Student\Query\StudentQuery;
use Uc\Module\Teacher\Query\TeacherQuery;
use Uc\Module\Feedback\Query\FeedbackQuery;
use Uc\Module\Language\Query\LanguageQuery;
use Uc\Module\Course\Service\ChapterService;
use Uc\Module\Course\Service\ProblemService;
use Uc\Module\User\Query\UserQueryInterface;
use Uc\Module\Teacher\Service\TeacherService;
use Uc\Module\Code\Service\CodeExecuteService;
use Uc\Module\Feedback\Service\FeedbackService;
use Uc\Module\Language\Service\LanguageService;
use Uc\Module\Course\Query\CourseQueryInterface;
use Uc\Module\User\Service\UserServiceInterface;
use Uc\Module\Course\Query\ChapterQueryInterface;
use Uc\Module\Course\Query\ProblemQueryInterface;
use Uc\Module\Student\Query\StudentQueryInterface;
use Uc\Module\Teacher\Query\TeacherQueryInterface;
use Uc\Module\Student\Query\StudentPreferenceQuery;
use Uc\Module\Feedback\Query\FeedbackQueryInterface;
use Uc\Module\Language\Query\LanguageQueryInterface;
use Uc\Module\Course\Service\ChapterServiceInterface;
use Uc\Module\Course\Service\ProblemServiceInterface;
use Uc\Module\Teacher\Service\TeacherServiceInterface;
use Uc\Module\Code\Service\CodeExecuteServiceInterface;
use Uc\Module\Feedback\Service\FeedbackServiceInterface;
use Uc\Module\Language\Service\LanguageServiceInterface;
use Uc\Module\Student\Query\StudentPreferenceQueryInterface;

class UcServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->registerServices();
        $this->defineGates();
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $siteComponentsPath = (__DIR__.'/../../../resources/views/site/components');
        Blade::anonymousComponentPath($siteComponentsPath, 'site');

        $portalComponentsPath = (__DIR__.'/../../../resources/views/portal/components');
        Blade::anonymousComponentPath($portalComponentsPath, 'portal');
    }

    protected function defineGates(): void
    {
        Gate::define('student', function (User $user) {
            return $user->user_kind_id === UserKind::Student->value;
        });

        Gate::define('teacher', function (User $user) {
            return $user->user_kind_id === UserKind::Teacher->value;
        });

        Gate::define('admin', function (User $user) {
            return $user->user_kind_id === UserKind::Admin->value;
        });
    }

    protected function registerServices(): void
    {
        // language module
        $this->app->singleton(
            LanguageServiceInterface::class, LanguageService::class
        );

        $this->app->singleton(
            LanguageQueryInterface::class, LanguageQuery::class
        );

        $this->app->singleton(
            StudentQueryInterface::class, StudentQuery::class
        );

        $this->app->singleton(
            CourseQueryInterface::class, CourseQuery::class
        );

        $this->app->singleton(
            ChapterServiceInterface::class, ChapterService::class
        );

        $this->app->singleton(
            ChapterQueryInterface::class, ChapterQuery::class
        );

        $this->app->singleton(
            TeacherQueryInterface::class, TeacherQuery::class
        );

        $this->app->singleton(
            TeacherServiceInterface::class, TeacherService::class
        );

        $this->app->singleton(
            UserQueryInterface::class, UserQuery::class
        );

        $this->app->singleton(
            UserServiceInterface::class, UserService::class
        );

        $this->app->singleton(
            StudentPreferenceQueryInterface::class, StudentPreferenceQuery::class
        );

        $this->app->singleton(
            ProblemQueryInterface::class, ProblemQuery::class
        );

        $this->app->singleton(
            ProblemServiceInterface::class, ProblemService::class
        );

        $this->app->singleton(
            FeedbackQueryInterface::class, FeedbackQuery::class
        );

        $this->app->singleton(
            FeedbackServiceInterface::class, FeedbackService::class
        );

        $this->app->singleton(
            CodeExecuteServiceInterface::class, function () {
                /** @var string */
                $url = config('app.compiler_url');

                return new CodeExecuteService($url);
            }
        );
    }
}
