<?php

namespace Uc\Module\Core;

use Illuminate\Support\ServiceProvider;
use Uc\Module\Student\Query\StudentQuery;
use Uc\Module\Language\Query\LanguageQuery;
use Uc\Module\Language\Service\LanguageService;
use Uc\Module\Student\Query\StudentQueryInterface;
use Uc\Module\Language\Query\LanguageQueryInterface;
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
    }
}
