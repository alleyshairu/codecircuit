<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use Uc\Module\Core\Controller\HomeController;
use Uc\Module\Core\Controller\TeamController;

Route::get('/', HomeController::class)->name('home');
Route::get('/team', TeamController::class)->name('team');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/teacher.php';
