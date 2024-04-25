<?php

namespace Uc\Module\Site\Controller;

use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Uc\Module\Core\WebController;
use Illuminate\Contracts\View\View;
use Uc\Module\Student\View\Student;
use Illuminate\Validation\Factory as Validation;
use Uc\Module\Solution\Request\NewSolutionRequest;

class SolutionController extends WebController
{
    public function show(string $id): View
    {
        $solution = $this->solutionQuery->get($id);
        if (null === $solution) {
            abort(404, 'solution not found');
        }

        $problem = $solution->problem;
        $chapter = $problem->chapter;
        $language = $chapter->language;
        $student = Student::fromUser($solution->student);

        return view('site.solution.show', [
            'student' => $student,
            'language' => $language,
            'chapter' => $chapter,
            'solution' => $solution,
            'problem' => $problem,
        ]);
    }

    public function store(Validation $validation, Request $request): JsonResponse
    {
        $validator = $validation->make($request->all(), [
            'code' => ['required'],
            'problem_id' => ['required'],
            'compile_output' => ['nullable'],
        ]);

        if ($validator->fails()) {
            return $this->jsonValidationErr($validator);
        }

        $data = $validator->validated();
        $problem = $this->problemQuery->get($data['problem_id']);
        if (null === $problem) {
            return $this->notFound('problem nto found');
        }

        /** @var User */
        $user = $request->user();

        $request = new NewSolutionRequest($problem, Student::fromUser($user), $data['code'], $data['compile_output'] ?? '');
        $solution = $this->solutionService->store($request);

        return $this->json([
            'solution_id' => $solution->id(),
            'code' => $solution->code(),
        ]);
    }
}
