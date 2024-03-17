<?php

namespace App\Providers;

use App\Models\User\User;
use App\Models\User\UserKind;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('student', function (User $user) {
            return $user->user_kind_id === UserKind::Student->value;
        });

        Gate::define('teacher', function (User $user) {
            return $user->user_kind_id === UserKind::Teacher->value;
        });
    }
}
