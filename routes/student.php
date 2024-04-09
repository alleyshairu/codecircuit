<?php

use Illuminate\Support\Facades\Route;
use Uc\Module\Site\Controller\StartController;
use Uc\Module\Site\Controller\StudentPreferenceController;

Route::middleware(['auth', 'student'])->group(function () {
    Route::get('/start', StartController::class)->name('student.start');

    Route::post('/preferences/level', [StudentPreferenceController::class, 'level'])->name('student.preference.level');
    Route::post('/preferences/languages', [StudentPreferenceController::class, 'languages'])->name('student.preference.languages');
});
