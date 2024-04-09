<?php

use Illuminate\Support\Facades\Route;
use Uc\Module\User\Controller\PasswordController;
use Uc\Module\Teacher\Controller\TeacherController;

Route::prefix('a')->group(function () {
    Route::middleware(['auth', 'admin'])->group(function () {
        // users
        Route::put('/users/{id}/password', PasswordController::class)->name('user.password-update');

        // teachers
        Route::get('/teachers', [TeacherController::class, 'index'])->name('teacher.index');
        Route::get('/teachers/create', [TeacherController::class, 'create'])->name('teacher.create');
        Route::post('/teachers/store', [TeacherController::class, 'store'])->name('teacher.store');
        Route::get('/teachers/{id}/show', [TeacherController::class, 'show'])->name('teacher.show');
    });
});
