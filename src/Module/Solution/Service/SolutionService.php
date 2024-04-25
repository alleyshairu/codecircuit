<?php

declare(strict_types=1);

namespace Uc\Module\Solution\Service;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
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
        $solution->output = json_encode($req->output, \JSON_PRETTY_PRINT);
        $solution->approved = false;
        $solution->save();

        if (isset($req->output['stdout']) && $req->output['stdout'] === $req->problem->output()) {
            $event = sprintf('Succesfully solved the problem %s.', $req->problem->title());
            $solution->approved = true;
            $solution->save();

            DB::table('student_points')
            ->insert([
                'id' => Str::orderedUuid()->toString(),
                'points_earned' => 10,
                'event_type' => 'problem_solved',
                'event' => $event,
                'student_id' => $solution->student_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return $solution;
    }
}
