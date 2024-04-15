<?php

use Illuminate\Support\Facades\Route;
use Uc\Module\Site\Controller\HomeController;
use Uc\Module\Site\Controller\TeamController;

Route::get('/', HomeController::class)->name('home');
Route::get('/team', TeamController::class)->name('team');

require __DIR__.'/auth.php';
require __DIR__.'/profile.php';
require __DIR__.'/site.php';
require __DIR__.'/portal.php';
