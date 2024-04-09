<?php

use Illuminate\Support\Facades\Route;
use Uc\Module\Site\Controller\WelcomeController;

Route::middleware(['auth'])->group(function () {
    Route::get('/welcome', WelcomeController::class)->name('student.welcome');
});
