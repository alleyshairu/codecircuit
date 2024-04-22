<?php

declare(strict_types=1);

namespace Uc\Module\Site\Controller;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class PlaygroundController extends SiteController
{
    public function show(Request $request, string $id): View
    {
        $problem = $this->problemQuery->get($id);
        if (null === $problem) {
            abort(404, 'problem not found');
        }

        $chapter = $problem->chapter;
        $language = $chapter->language;

        return $this->view('site.playground.playground', [
            'problem' => $problem,
            'chapter' => $chapter,
            'language' => $language,
        ]);
    }
}
