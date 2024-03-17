<?php

namespace Uc\Modules\Core;

use Illuminate\Support\ServiceProvider;
use Uc\Modules\Language\Query\LanguageQuery;
use Uc\Modules\Language\Service\LanguageService;
use Uc\Modules\Language\Query\LanguageQueryInterface;
use Uc\Modules\Language\Service\LanguageServiceInterface;

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
    }
}
