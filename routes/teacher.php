<?php

use Illuminate\Support\Facades\Route;
use Uc\Modules\Core\TeacherMiddleware;
use Uc\Modules\Unit\Controllers\UnitController;
use Uc\Modules\Language\Controller\LanguageController;

Route::middleware(['auth', TeacherMiddleware::class])->group(function () {
    Route::get('/languages', [LanguageController::class, 'index'])->name('language.index');

    Route::get('/units', [UnitController::class, 'index'])->name('unit.index');
});
