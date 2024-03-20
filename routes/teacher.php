<?php

use Illuminate\Support\Facades\Route;
use Uc\Module\Core\TeacherMiddleware;
use Uc\Module\Course\Controller\CourseController;
use Uc\Module\Course\Controller\ChapterController;
use Uc\Module\Student\Controller\StudentController;
use Uc\Module\Language\Controller\LanguageController;

Route::middleware(['auth', TeacherMiddleware::class])->group(function () {
    Route::get('/languages', [LanguageController::class, 'index'])->name('language.index');

    Route::get('/students', [StudentController::class, 'index'])->name('student.index');

    Route::get('/courses/{id}', [CourseController::class, 'show'])->name('course.show');
    Route::get('/courses/{id}/chapter-create', [ChapterController::class, 'create'])->name('chapter.create');
});
