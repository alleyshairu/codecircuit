<?php

use Illuminate\Support\Facades\Route;
use Uc\Module\Site\Controller\HomeController;
use Uc\Module\Site\Controller\TeamController;
use Uc\Module\Site\Controller\StartController;
use Uc\Module\Site\Controller\PlaygroundController;
use Uc\Module\Site\Controller\StudentProfileController;
use Uc\Module\Site\Controller\StudentPreferenceController;

Route::get('/', HomeController::class)->name('home');
Route::get('/team', TeamController::class)->name('team');

Route::middleware(['auth', 'student'])->group(function () {
    Route::get('/start', StartController::class)->name('student.start');

    Route::get('/@/{id}/profile', [StudentProfileController::class, 'profile'])->name('student.profile');
    Route::get('/playground/{id}', [PlaygroundController::class, 'index'])->name('playground');

    Route::post('/preferences/level', [StudentPreferenceController::class, 'level'])->name('student.preference.level');
    Route::post('/preferences/languages', [StudentPreferenceController::class, 'languages'])->name('student.preference.languages');
});
