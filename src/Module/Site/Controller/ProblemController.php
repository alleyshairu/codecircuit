<?php

declare(strict_types=1);

namespace Uc\Module\Site\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ProblemController extends SiteController
{
    public function problem(Request $request, string $id): JsonResponse
    {
        $problem = $this->problemQuery->get($id);
        if (null === $problem) {
            abort(404, 'problem not found');
        }

        $chapter = $problem->chapter;
        $language = $chapter->language;

        return $this->json([
            'problem' => $problem,
            'chapter' => $chapter,
            'language' => $language,
        ]);
    }
}
