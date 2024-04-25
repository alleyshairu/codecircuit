<?php

declare(strict_types=1);

namespace Uc\Module\Site\Controller;

use Illuminate\Contracts\View\View;

class StudentProfileController extends SiteController
{
    public function profile(string $id): View
    {
        $student = $this->studentQuery->get($id);
        if (null === $student) {
            return abort(404, 'Student not found');
        }

        $courses = $this->studentQuery->coursesEnrolled($student->id);
        $stats = $this->studentQuery->stats($student->id);
        $events = $this->studentQuery->recentEvents($student->id);
        $progress = $this->studentQuery->coursesprogress($student->id);

        return $this->view('site.profile.profile', [
            'student' => $student,
            'courses' => $courses,
            'progress' => $progress,
            'stats' => $stats,
            'events' => $events,
        ]);
    }
}
