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

        return $this->view('site.profile.profile', [
            'student' => $student,
        ]);
    }
}
