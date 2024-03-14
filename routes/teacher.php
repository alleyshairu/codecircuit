<?php

use Illuminate\Support\Facades\Route;
use Uc\Modules\Core\TeacherMiddleware;
use Uc\Modules\Unit\Controllers\UnitController;

Route::middleware(['auth', TeacherMiddleware::class])->group(function () {
    Route::get('/units', [UnitController::class, 'index'])->name('unit.index');
});
