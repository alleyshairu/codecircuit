<?php

use Illuminate\Support\Facades\Route;
use Uc\Module\Site\Controller\StartController;

Route::middleware(['auth', 'student'])->group(function () {
    Route::get('/start', StartController::class)->name('student.start');
});
