<?php

use Illuminate\Support\Facades\Route;
use Uc\Module\Site\Controller\HomeController;
use Uc\Module\Site\Controller\TeamController;
use Uc\Module\Site\Controller\StartController;
use Uc\Module\Site\Controller\ProblemController;
use Uc\Module\Site\Controller\RoadmapController;
use Uc\Module\Site\Controller\FeedbackController;
use Uc\Module\Site\Controller\SolutionController;
use Uc\Module\Site\Controller\PlaygroundController;
use Uc\Module\Site\Controller\LeaderboardController;
use Uc\Module\Site\Controller\ProcessCodeController;
use Uc\Module\Site\Controller\StudentProfileController;
use Uc\Module\Site\Controller\StudentPreferenceController;

Route::get('/', HomeController::class)->name('home');
Route::get('/team', TeamController::class)->name('team');

Route::get('/solutions/{id}', [SolutionController::class, 'show'])->name('solution.show');
Route::get('/leaderboard', [LeaderboardController::class, 'overall'])->name('leaderboard');

Route::middleware(['auth', 'student'])->group(function () {
    Route::get('/start', StartController::class)->name('student.start');

    Route::get('/process/{id}/status', [ProcessCodeController::class, 'status'])->name('process.status');

    Route::get('/problems/{id}', [ProblemController::class, 'problem'])->name('problem.json');
    Route::get('/problems/{id}/read', [ProblemController::class, 'read'])->name('problem');
    Route::post('/problems/{id}/process', [ProcessCodeController::class, 'process'])->name('problem.process');

    Route::post('/solutions', [SolutionController::class, 'store'])->name('solution.store');

    Route::get('/@/{id}/profile', [StudentProfileController::class, 'profile'])->name('student.profile');
    Route::get('/roadmap', RoadmapController::class)->name('roadmap');
    Route::get('/playground/{id}', [PlaygroundController::class, 'show'])->name('playground');

    Route::post('/preferences/level', [StudentPreferenceController::class, 'level'])->name('student.preference.level');
    Route::post('/preferences/languages', [StudentPreferenceController::class, 'languages'])->name('student.preference.languages');

    Route::post('/feedback/store', [FeedbackController::class, 'store'])->name('feedback.store');
});
