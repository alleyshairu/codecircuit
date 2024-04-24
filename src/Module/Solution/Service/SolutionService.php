<?php

declare(strict_types=1);

namespace Uc\Module\Solution\Service;

use Illuminate\Support\Str;
use Uc\Module\Solution\Model\Solution;
use Uc\Module\Solution\Request\NewSolutionRequest;
use Uc\Module\Solution\Query\SolutionQueryInterface;

class SolutionService implements SolutionServiceInterface
{
    public function store(NewSolutionRequest $req): Solution
    {
        /** @var SolutionQueryInterface */
        $query = app(SolutionQueryInterface::class);

        $solution = $query->byStudentAndProblem($req->student->id, $req->problem->id());
        if ($solution) {
            $solution->code = $req->code;
            $solution->output = $req->output;
            $solution->save();

            return $solution;
        }

        $solution = new Solution();
        $solution->solution_id = Str::orderedUuid()->toString();
        $solution->problem_id = $req->problem->id();
        $solution->student_id = $req->student->id;
        $solution->code = $req->code;
        $solution->output = $req->output;
        $solution->approved = false;
        $solution->save();

        return $solution;
    }
}
