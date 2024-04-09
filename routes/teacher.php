<?php

use Illuminate\Support\Facades\Route;
use Uc\Module\Course\Controller\CourseController;
use Uc\Module\Course\Controller\ChapterController;
use Uc\Module\Course\Controller\ProblemController;
use Uc\Module\Student\Controller\StudentController;
use Uc\Module\Feedback\Controller\FeedbackController;
use Uc\Module\Language\Controller\LanguageController;

Route::prefix('t')->group(function () {
    Route::middleware(['auth', 'teacher'])->group(function () {
        // students
        Route::get('/students', [StudentController::class, 'index'])->name('student.index');

        // course
        Route::get('/languages', [LanguageController::class, 'index'])->name('language.index');
        Route::get('/courses/{id}', [CourseController::class, 'show'])->name('course.show');

        // chapter
        Route::get('/courses/{id}/chapter-create', [ChapterController::class, 'create'])->name('chapter.create');
        Route::post('/chapter/store', [ChapterController::class, 'store'])->name('chapter.store');
        Route::get('/chapter/{id}', [ChapterController::class, 'show'])->name('chapter.show');
        Route::post('/chapter/{id}/update', [ChapterController::class, 'update'])->name('chapter.update');

        // chapter
        Route::get('/chapters/{id}/problem-create', [ProblemController::class, 'create'])->name('problem.create');
        Route::post('/problems/store', [ProblemController::class, 'store'])->name('problem.store');
        Route::get('/problems/{id}', [ProblemController::class, 'show'])->name('problem.show');

        // feedback
        Route::get('/feedbacks', [FeedbackController::class, 'index'])->name('feedback.index');
    });
});
