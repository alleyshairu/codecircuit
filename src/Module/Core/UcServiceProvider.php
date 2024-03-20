<?php

namespace Uc\Module\Core;

use Illuminate\Support\ServiceProvider;
use Uc\Module\Course\Query\ChapterQuery;
use Uc\Module\Student\Query\StudentQuery;
use Uc\Module\Language\Query\LanguageQuery;
use Uc\Module\Course\Service\ChapterService;
use Uc\Module\Language\Service\LanguageService;
use Uc\Module\Course\Query\ChapterQueryInterface;
use Uc\Module\Student\Query\StudentQueryInterface;
use Uc\Module\Language\Query\LanguageQueryInterface;
use Uc\Module\Course\Service\ChapterServiceInterface;
use Uc\Module\Language\Service\LanguageServiceInterface;

class UcServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->registerServices();
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
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
            ChapterServiceInterface::class, ChapterService::class
        );

        $this->app->singleton(
            ChapterQueryInterface::class, ChapterQuery::class
        );
    }
}
