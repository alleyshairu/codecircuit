<?php

declare(strict_types=1);

namespace Uc\Module\Course\Service;

use Illuminate\Support\Str;
use Uc\Module\Course\Model\Problem;
use Uc\Module\Course\Request\ProblemStoreRequest;
use Uc\Module\Course\Request\ProblemUpdateRequest;

class ProblemService implements ProblemServiceInterface
{
    public function store(ProblemStoreRequest $req): Problem
    {
        $problem = new Problem();
        $problem->problem_id = Str::orderedUuid()->toString();
        $problem->chapter_id = $req->chapter->id();
        $problem->title = $req->title;
        $problem->description = $req->description;
        $problem->save();

        return $problem;
    }

    public function update(Problem $problem, ProblemUpdateRequest $req): void
    {
        $problem->title = $req->title;
        $problem->description = $req->description;
        $problem->save();
    }
}
