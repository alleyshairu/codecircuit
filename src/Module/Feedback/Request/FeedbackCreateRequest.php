<?php

declare(strict_types=1);

namespace Uc\Module\Feedback\Request;

use Uc\Module\Course\Model\Problem;
use Uc\Module\Student\View\Student;
use Illuminate\Validation\ValidationException;
use Uc\Module\Course\Query\ProblemQueryInterface;

class FeedbackCreateRequest
{
    public bool $interesting = false;

    public bool $knowledge = false;

    public string $feedback;

    public int $score;

    public Problem $problem;

    public Student $student;

    public function __construct(Problem $problem, Student $student, string $feedback, int $score)
    {
        $this->problem = $problem;
        $this->student = $student;
        $this->feedback = $feedback;
        $this->score = $score;
    }

    /**
     * @param array<string, string> $data
     */
    public static function fromArray(Student $student, array $data): self
    {
        if (!isset($data['problem_id']) || !isset($data['feedback']) || !isset($data['score'])) {
            throw ValidationException::withMessages(['missing_data' => ['required data missing']]);
        }

        $query = app(ProblemQueryInterface::class);
        $problem = $query->get($data['problem_id']);
        if (null === $problem) {
            throw ValidationException::withMessages(['problem_id' => ['invalid problem id provided']]);
        }

        $req = new self($problem, $student, $data['feedback'], (int) $data['score']);
        if (isset($data['interesting'])) {
            $req->interesting = true;
        }

        if (isset($data['knowledge'])) {
            $req->knowledge = true;
        }

        if (isset($data['instructions'])) {
            $req->knowledge = true;
        }

        return $req;
    }
}
