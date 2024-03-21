<?php

use Uc\Module\Core\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use Uc\Module\Teacher\Controller\TeacherController;

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    // teachers
    Route::get('/teachers', [TeacherController::class, 'index'])->name('teacher.index');
    Route::get('/teachers/create', [TeacherController::class, 'create'])->name('teacher.create');
    Route::post('/teachers/store', [TeacherController::class, 'store'])->name('teacher.store');
});
