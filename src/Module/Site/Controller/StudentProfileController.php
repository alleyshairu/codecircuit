<?php

declare(strict_types=1);

namespace Uc\Module\Site\Controller;

class StudentProfileController extends SiteController
{
    public function profile(string $id)
    {
        $student = $this->studentQuery->get($id);
        if (null === $student) {
            return abort(404, 'Student not found');
        }

        return view('site.profile.profile', [
            'student' => $student,
        ]);
    }
}
