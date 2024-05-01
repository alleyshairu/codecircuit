<?php

namespace App\Listeners;

use App\Events\StudentLoggedIn;
use Uc\Module\Student\Service\StudentServiceInterface;

class TrackDailyActivity
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     */
    public function handle(StudentLoggedIn $event): void
    {
        /**
         * @var StudentServiceInterface
         */
        $studentService = app(StudentServiceInterface::class);
        $studentService->trackDailyActivity($event->student);
    }
}
