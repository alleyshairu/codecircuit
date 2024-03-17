<?php

use Illuminate\Support\Facades\Route;
use Uc\Module\Core\TeacherMiddleware;
use Uc\Module\Unit\Controller\UnitController;
use Uc\Module\Language\Controller\LanguageController;

Route::middleware(['auth', TeacherMiddleware::class])->group(function () {
    Route::get('/languages', [LanguageController::class, 'index'])->name('language.index');

    Route::get('/units', [UnitController::class, 'index'])->name('unit.index');
});
